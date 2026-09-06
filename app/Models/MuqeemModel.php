<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuqeemModel extends Model
{
    use HasFactory;

    protected $table = 'muqeem'; 

    protected $fillable = [
        'personImg',
        'detailsImg',
        'name',
        'iqamaNumber'
    ];
}
