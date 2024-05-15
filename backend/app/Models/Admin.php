<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

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

}
