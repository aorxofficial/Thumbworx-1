<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'admin'; //Database Table
    protected $primaryKey = 'admin_id'; //The primary key
    protected $fillable = [

        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'gender',
        'marital_status',
        'email',
        'password',
      

    ];

    protected $hidden = [
        'password',
        // 'password' => 'hashed', (Try lagyan neto)
    
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();   
    }

    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id' => $this->admin_id,
                'email' => $this->email,
                'user_type' => "admin",
            ]
        ];
    }

}
