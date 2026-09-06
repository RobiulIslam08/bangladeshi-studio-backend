<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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

    public function down(): void
    {
        Schema::dropIfExists('ajeer_permits');
    }
};
