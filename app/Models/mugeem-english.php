<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuqeemEnglishModel  extends Model
{
    use HasFactory;

    protected $table = "muqeem-english";
    protected $fillable = [
        'reportDate', 'operatorId', 'location',
        'iqamaNumber', 'versionNumber', 'gender', 'name', 'translatedName',
        'birthDate', 'birthCountry', 'maritalStatus', 'religion', 'occupation', 'status',
        'entryDate', 'entryLocation',
        'passportNumber', 'nationality', 'passportIssueDate', 'passportExpiryDate', 'passportIssueLocation',
        'iqamaIssueDate', 'iqamaExpiryDate', 'iqamaIssueLocation',
        'employerNumber', 'employerName'
    ];
}
