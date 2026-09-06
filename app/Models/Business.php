<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'muqeem_business';

    protected $fillable = [
        // passport & visa
        'passport_number','passport_issuance_place','passport_issuance_date','passport_expiry_date',
        'passport_status','visa_expiry_date','visa_issuance_place','date_last_exit',

        // insurance
        'health_insurance','health_insurance_expiry',

        // vehicles
        'number_of_vehicles','traffic_violations_number','number_of_licenses',

        // hajj
        'hajj_eligibility','last_year_hajj',

        // sponsor
        'sponsor_id_number','sponsor_name',

        // family
        'number_of_family_members','family_members_inside','family_members_outside',

        // personal
        'arabic_name','name_english','sl_id',

        // iqama
        'iqama_number','id_version','iqama_status','iqama_exp_date',
        'iqama_issue_date','iqama_occupation','iqama_marital_status','nationality',

        // other
        'blood_type','place_of_birth','date_of_birth','iqama_issue_place',
        'gender','inside_kingdom','religion','finger_print','sponsor_transfer','customerImage','muqeemCreateDate',
    ];
}
