<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;

    protected $table = 'visa_table';  // Your custom table name

    protected $fillable = [
        'header_datetime',
        'profile_photo',

        'visa_no',
        'duration_of_stay',

        'valid_from',
        'valid_until',

        'f_name',
        'l_name',

        'visa_type',
        'birth_date',

        'passport_no',
        'ref_no',
        'application_no',

        'occupation',
        'employer_name',
        'visafooterTitle',
    ];

    protected $dates = [
        'birth_date',
    ];
}
