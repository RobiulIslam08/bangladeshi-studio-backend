<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SDPNModel extends Model
{
    use HasFactory;
    protected $table = '2025_01_15_223740_sdpn_storage_table';

    protected $fillable = [
        'image',
        'iqama_no',
        'passport_no',
        'phone',
        'sdpn_no',
    ];
}
