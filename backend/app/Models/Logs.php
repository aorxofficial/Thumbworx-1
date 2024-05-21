<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    protected $table = 'logs'; // table name in database or MySql

    protected $primaryKey = 'logs_id'; //The primary key

    protected $fillable = [
        'user_id',
        'admin_id',
        'action',
    ];

        public function admin()
        {
            return $this->belongsTo(Admin::class);
        }

        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
}
