<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxTableModel extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'trx_table';

    // Primary key (optional, default = id)
    protected $primaryKey = 'id';

    // Allow mass assignment
    protected $fillable = [
        'user_id',
        'amount',
        'payment_type',
        'name',
    ];

    // Timestamps handled automatically
    public $timestamps = true;

    /*
    |--------------------------------------------------------------------------
    | Optional Relationship Example
    | Each transaction belongs to a user
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
