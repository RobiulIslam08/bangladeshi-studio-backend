<?php

namespace App\Http\Controllers;

use App\Models\AjeerPermit;
use Illuminate\Http\Request;

class AjeerPermitController extends Controller
{
    public function index(Request $request)
    {
        $permits = AjeerPermit::query()
            ->latest('id')
            ->paginate((int) $request->get('per_page', 20));

        return response()->json([
            'status' => 'success',
            'data'   => $permits,
        ]);
    }

    public function show($id)
    {
        $permit = AjeerPermit::find($id);

        if (!$permit) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Ajeer permit record not found.',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $permit,
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        foreach (['permit_start_date', 'permit_end_date', 'user_id'] as $field) {
            if (array_key_exists($field, $input) && $input[$field] === '') {
                $input[$field] = null;
            }
        }

        $validated = validator($input, [
            'qr_number'            => 'nullable|string|max:255',
            'worker_name'          => 'required|string|max:255',
            'iqama_number'         => 'required|string|max:255',
            'occupation'           => 'nullable|string|max:255',
            'nationality'          => 'nullable|string|max:255',
            'provider_name'        => 'nullable|string|max:255',
            'provider_reg_no'      => 'nullable|string|max:255',
            'beneficiary_name'     => 'nullable|string|max:255',
            'beneficiary_reg_no'   => 'nullable|string|max:255',
            'contract_description' => 'nullable|string',
            'permit_start_date'    => 'nullable|date',
            'permit_end_date'      => 'nullable|date',
            'work_location'        => 'nullable|string|max:500',
            'user_id'              => 'nullable|integer',
        ])->validate();

        $permit = AjeerPermit::create($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'Ajeer permit saved successfully.',
            'id'      => $permit->id,
            'data'    => $permit,
        ], 201);
    }
}
