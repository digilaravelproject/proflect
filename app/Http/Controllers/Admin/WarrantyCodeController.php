<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WarrantyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarrantyCodeController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->only(['code', 'owner_name', 'owner_email', 'status']);

        $codes = WarrantyCode::query();

        foreach ($filters as $field => $value) {
            if ($value !== null && $value !== '') {
                $codes->where($field, 'like', "%{$value}%");
            }
        }

        $codes = $codes->orderByDesc('created_at')->paginate(15)->withQueryString();

        return view('admin.warranty_codes.index', [
            'codes' => $codes,
            'filters' => $filters,
        ]);
    }

    public function create()
    {
        return view('admin.warranty_codes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'from_code' => ['required', 'digits:5'],
            'to_code' => ['required', 'digits:5'],
        ]);

        $from = (int) $data['from_code'];
        $to = (int) $data['to_code'];

        if ($from > $to) {
            return back()->withErrors(['to_code' => 'The to value must be greater than or equal to the from value.'])->withInput();
        }

        $fromCode = str_pad($from, 5, '0', STR_PAD_LEFT);
        $toCode = str_pad($to, 5, '0', STR_PAD_LEFT);

        if (WarrantyCode::whereBetween('code', [$fromCode, $toCode])->exists()) {
            return back()->withErrors(['from_code' => 'One or more codes in this range already exist.'])->withInput();
        }

        $created = 0;

        DB::transaction(function () use ($from, $to, &$created) {
            for ($value = $from; $value <= $to; $value++) {
                WarrantyCode::create([
                    'code' => str_pad($value, 5, '0', STR_PAD_LEFT),
                    'status' => 'available',
                ]);
                $created++;
            }
        });

        return redirect()->route('admin.code_generation.index')
            ->with('success', "$created code(s) uploaded successfully.");
    }
}
