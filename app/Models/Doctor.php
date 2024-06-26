<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';
    protected $fillable = [
        'user_id',
        'name',
        'specialization',
        'phone',
        'available_times',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
