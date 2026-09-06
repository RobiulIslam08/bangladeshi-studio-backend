<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documentModel extends Model
{
    use HasFactory;

    protected $table = 'document'; // Change to your actual table name

    protected $fillable = ['iqamaNumber', 'documentTitle', 'documentFile']; // Add your actual column names
}

