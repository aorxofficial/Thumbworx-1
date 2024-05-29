<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'driver';
    
    protected $guarded = [];

    protected $fillable = [
        'license',
        'nbi_clearance',
        'lto_driving_history',
        'contact_person',
        'contact_person_relationship',
        'contact_person_phone_number',
        'contact_person_email',
        'contact_person_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
