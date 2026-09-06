<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class MuqeemUserModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'muqeemUser';

    protected $fillable = [
        'Name',
        'email',
        'phone',
        'password',
        'image',
        'joindate',
        'limit',
        'status',
    ];
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'joindate' => 'date',
    ];
    public $timestamps = false;
}
