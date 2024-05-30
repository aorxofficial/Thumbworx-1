<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'email_verified_at',
        'remember_token',
        // 'full_name',
        // 'relationship',
        // 'rel_phone_number',
        // 'rel_email',
        // 'address',
        // 'license',
        // 'nbi_clearance',
        // 'lto_driving_history',
        'account_status',
        'token',
        'token_expires_at',
        'is_restore',
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

    public function currentAddress()
    {
      return $this->hasOne(CurrentAddress::class);
    }

    public function permanentAddress()
    {
      return $this->hasOne(PermanentAddress::class);
    }

    public function driver()
    {
      return $this->hasOne(Driver::class);
    }
    public function client()
    {
      return $this->hasOne(Client::class);
    }

    public function getJWTIdentifier()
    {
      return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
      return [
        'user' => [
            'id' => $this->id,
            'email'=> $this->email,
            'user_type' => $this->user_type,
        ]
    ];
    }
}
