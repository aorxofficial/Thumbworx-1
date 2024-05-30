<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermanentAddress extends Model
{
    use HasFactory;

    protected $table = 'permanent_address';
    
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'per_house_number',
        'per_street',
        'per_barangay',
        'per_city',
        'per_province',
        'per_region',
        'per_region',
        'per_country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
