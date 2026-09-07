<?php

namespace App\Http\Controllers;

use App\Models\AjeerPermit;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AjeerPermitController extends Controller
{
    public function index(Request $request)
    {
        $this->ensureTableExists();

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
        $this->ensureTableExists();

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
        $this->ensureTableExists();

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

    private function ensureTableExists(): void
    {
        if (Schema::hasTable('ajeer_permits')) {
            return;
        }

        Schema::create('ajeer_permits', function (Blueprint $table) {
            $table->id();
            $table->string('qr_number')->nullable();
            $table->string('worker_name');
            $table->string('iqama_number');
            $table->string('occupation')->nullable();
            $table->string('nationality')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('provider_reg_no')->nullable();
            $table->string('beneficiary_name')->nullable();
            $table->string('beneficiary_reg_no')->nullable();
            $table->text('contract_description')->nullable();
            $table->date('permit_start_date')->nullable();
            $table->date('permit_end_date')->nullable();
            $table->string('work_location', 500)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }
}
