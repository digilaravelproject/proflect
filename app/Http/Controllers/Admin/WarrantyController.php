<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewWarrantyRequestNotification;
use App\Mail\WarrantyRequestReceived;

class WarrantyController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only([
            'name',
            'email',
            'phone',
            'car_model',
            'job_description',
            'unique_number',
        ]);

        $warranties = Warranty::query();

        foreach ($filters as $field => $value) {
            if ($value !== null && $value !== '') {
                $warranties->where($field, 'like', "%{$value}%");
            }
        }

        $warranties = $warranties
            ->orderByDesc('warranty_date')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.warranties.index', [
            'warranties' => $warranties,
            'filters' => $filters,
        ]);
    }

    public function create()
    {
        return view('admin.warranties.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'car_model' => ['required', 'string', 'max:255'],
            'job_description' => ['required', 'string', 'max:2000'],
            'unique_number' => ['required', 'digits:5', 'unique:warranties,unique_number'],
        ], [
            'unique_number.unique' => 'A warranty with that number has already been submitted. If you think this is an error, please contact us.',
        ]);

        $todays_datetime = now();
        $data['warranty_date'] = $todays_datetime;
        $data['expiry_date'] = $todays_datetime->copy()->addYears(5);

        $warranty = Warranty::create($data);

        try {
            Mail::to($warranty->email)
                ->send(new WarrantyRequestReceived($warranty));

            Log::info('Warranty confirmation email sent to customer', [
                'email' => $warranty->email,
                'warranty_id' => $warranty->id,
                'unique_number' => $warranty->unique_number,
            ]);
        } catch (\Exception $e) {
            Log::error('Customer email sending failed', [
                'email' => $warranty->email,
                'error' => $e->getMessage(),
                'warranty_id' => $warranty->id,
            ]);
        }

        try {
            Mail::to('info@proflect.com.au')
                ->send(new NewWarrantyRequestNotification($warranty));

            Log::info('Admin notification email sent', [
                'admin_email' => 'info@proflect.com.au',
                'warranty_id' => $warranty->id,
            ]);
        } catch (\Exception $e) {
            Log::error('Admin email sending failed', [
                'admin_email' => 'info@proflect.com.au',
                'error' => $e->getMessage(),
                'warranty_id' => $warranty->id,
            ]);
        }

        return redirect()->route('admin.warranties.index')
            ->with('success', "Warranty #{$warranty->unique_number} created successfully.");
    }

    public function show(Warranty $warranty)
    {
        return view('admin.warranties.show', [
            'warranty' => $warranty,
        ]);
    }

    public function destroy(Warranty $warranty)
    {
        $warranty->delete();

        return redirect()->route('admin.warranties.index')->with('success', 'Warranty deleted successfully.');
    }
}
