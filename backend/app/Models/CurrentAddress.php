<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentAddress extends Model
{
    use HasFactory;

    protected $table = 'current_address';
    
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'cur_house_number',
        'cur_street',
        'cur_barangay',
        'cur_city',
        'cur_province',
        'cur_region',
        'cur_region',
        'cur_country',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
