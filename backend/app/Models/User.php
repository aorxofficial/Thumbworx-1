<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users'; //Database Table
    protected $primaryKey = 'id'; //The primary key
    protected $fillable = [

        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'gender',
        'marital_status',
        'age',
        'user_type',
        'email',
        'phone_number1',
        'phone_number2',
        'password',
        //   'email_verified_at',
        // 'password',
        //  'remember_token',
        'per_house_number',
        'per_street',
        'per_barangay',
        'per_city',
        'per_province',
        'per_region',
        'per_country',
        'per_zip_code',
        'cur_house_number',
        'cur_street',
        'cur_barangay',
        'cur_city',
        'cur_province',
        'cur_region',
        'cur_country',
        'cur_zip_code',
        'full_name',
        'relationship',
        'rel_phone_number',
        'rel_email',
        'address',
        'license',
        'nbi_clearance',
        'lto_driving_history',
        'account_status',
        'token',
        'token_expires_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'password' => 'hashed', (Try lagyan neto)
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
      return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
      return [];
    }
}
