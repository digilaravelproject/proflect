<?php

namespace App\Http\Controllers;

use App\Mail\NewWarrantyRequestNotification;
use App\Mail\WarrantyOtpCode;
use App\Mail\WarrantyRequestReceived;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class WarrantyController extends Controller
{
    public function create()
    {
        $latestNumber = Warranty::orderByDesc('unique_number')->value('unique_number');
        $nextNumber = $latestNumber ? ((int) $latestNumber + 1) : 10001;
        if ($nextNumber > 99999) {
            abort(500, 'Warranty number limit reached. Please contact support.');
        }

        return view('warranty', [
            'nextWarrantyNumber' => str_pad($nextNumber, 5, '0', STR_PAD_LEFT),
        ]);
    }

    public function showSendOtpForm()
    {
        // Clear any existing verified view session flags when starting a new check flow.
        session()->forget('warranty_view');

        return view('check-warranty');
    }

    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'unique_number' => ['required', 'digits:5'],
        ]);

        $warranty = Warranty::where('email', $data['email'])
            ->where('unique_number', $data['unique_number'])
            ->first();

        if (! $warranty) {
            return back()->withErrors(['unique_number' => 'No warranty found matching that email and card number.'])->withInput();
        }

        $otp = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

        $warranty->otp_code = $otp;
        $warranty->otp_expires_at = now()->addMinutes(10);
        $warranty->otp_verified_at = null;
        $warranty->save();

        Mail::to($warranty->email)->send(new WarrantyOtpCode($otp, $warranty->unique_number));

        return redirect()->route('warranty.check.verify', ['warranty' => $warranty->id])->with('otp_sent', true);
    }

    public function showVerifyOtpForm(Warranty $warranty)
    {
        if (! $warranty->otp_code || ! $warranty->otp_expires_at) {
            return redirect()->route('warranty.check')
                ->withErrors(['otp' => 'No active verification code. Please request a new code.']);
        }

        return view('check-warranty-verify', [
            'warranty' => $warranty,
        ]);
    }

    public function verifyOtp(Request $request, Warranty $warranty)
    {
        $data = $request->validate([
            'otp' => ['required', 'digits:4'],
        ]);

        if (! $warranty->otp_code || ! $warranty->otp_expires_at) {
            return redirect()->route('warranty.check')
                ->withErrors(['otp' => 'No active verification code. Please request a new code.']);
        }

        if (now()->greaterThan($warranty->otp_expires_at)) {
            $warranty->otp_code = null;
            $warranty->otp_expires_at = null;
            $warranty->save();

            return redirect()->route('warranty.check')
                ->withErrors(['otp' => 'Your verification code has expired. Please request a new one.']);
        }

        if ($warranty->otp_code !== $data['otp']) {
            return back()->withErrors(['otp' => 'The code you entered is incorrect. Please try again.']);
        }

        $warranty->otp_verified_at = now();
        $warranty->otp_code = null;
        $warranty->otp_expires_at = null;
        $warranty->save();

        // Allow this user/session to view the warranty card once verified.
        session()->put("warranty_view.{$warranty->id}", true);

        return redirect()->route('warranty.check.card', ['warranty' => $warranty->id]);
    }

    public function showCard(Warranty $warranty)
    {
        if (! $warranty->otp_verified_at || ! session("warranty_view.{$warranty->id}")) {
            return redirect()->route('warranty.check')
                ->withErrors(['otp' => 'Please verify your warranty before viewing the card.']);
        }

        return view('check-warranty-card', [
            'warranty' => $warranty,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'car_model' => ['required', 'string', 'max:255'],
            'job_description' => ['required', 'string', 'max:2000'],
            'accept_terms' => ['accepted'],
        ], [
            'accept_terms.accepted' => 'You must agree to the terms and conditions to submit.',
        ]);

        $todays_datetime = now();

        $warranty = DB::transaction(function () use ($data, $todays_datetime) {
            $latestNumber = Warranty::lockForUpdate()->orderByDesc('unique_number')->value('unique_number');
            $nextNumber = $latestNumber ? ((int) $latestNumber + 1) : 10001;

            if ($nextNumber > 99999) {
                throw new \RuntimeException('Warranty number limit reached.');
            }

            $data['unique_number'] = str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

            $data['warranty_date'] = $todays_datetime;
            $data['expiry_date'] = $todays_datetime->copy()->addYears(5);

            return Warranty::create($data);
        });

        /*
        |--------------------------------------------------------------------------
        | Send Customer Email
        |--------------------------------------------------------------------------
        */
        try {

            Mail::to($warranty->email)
                ->send(new WarrantyRequestReceived($warranty));

            Log::info('Warranty confirmation email sent to customer', [
                'email' => $warranty->email,
                'warranty_id' => $warranty->id,
                'unique_number' => $warranty->unique_number
            ]);

        } catch (\Exception $e) {

            Log::error('Customer email sending failed', [
                'email' => $warranty->email,
                'error' => $e->getMessage(),
                'warranty_id' => $warranty->id
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Send Admin Email
        |--------------------------------------------------------------------------
        */
        try {

            Mail::to('info@proflect.com.au')
                ->send(new NewWarrantyRequestNotification($warranty));

            Log::info('Admin notification email sent', [
                'admin_email' => 'info@proflect.com.au',
                'warranty_id' => $warranty->id
            ]);

        } catch (\Exception $e) {

            Log::error('Admin email sending failed', [
                'admin_email' => 'info@proflect.com.au',
                'error' => $e->getMessage(),
                'warranty_id' => $warranty->id
            ]);
        }

        $submittedAt =  $todays_datetime->format('d/m/Y H:i');

        return back()->with('success', "Your warranty request (#{$warranty->unique_number}) was submitted on {$submittedAt}. We will contact you soon.");
    }

    public function generateQR()
    {
        $qr = QrCode::size(300)->generate('https://whitesmoke-louse-860631.hostingersite.com');

        return view('qr_code', compact('qr'));
    }
}