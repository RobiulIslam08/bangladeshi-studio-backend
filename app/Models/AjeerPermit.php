<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AjeerPermit extends Model
{
    protected $table = 'ajeer_permits';

    protected $fillable = [
        'qr_number',
        'worker_name',
        'iqama_number',
        'occupation',
        'nationality',
        'provider_name',
        'provider_reg_no',
        'beneficiary_name',
        'beneficiary_reg_no',
        'contract_description',
        'permit_start_date',
        'permit_end_date',
        'work_location',
        'user_id',
    ];
}
