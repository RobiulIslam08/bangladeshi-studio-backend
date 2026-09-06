<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // For login support
use Illuminate\Notifications\Notifiable;

class Custom_userModel extends Authenticatable
{
    use HasFactory, Notifiable;

    // Table name
    protected $table = 'custom_user';

    // Primary key (optional if it's 'id')
    protected $primaryKey = 'id';

    // Fillable fields for mass assignment
    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'email',
        'balance',
        'password',
        'title',
        'acount_satatus',
    ];

    // Hidden fields (for security, e.g., when returning JSON)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Casts (for data type handling)
    protected $casts = [
        'balance' => 'decimal:2',
        'email_verified_at' => 'datetime',
    ];
}
