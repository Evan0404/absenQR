<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'jam_masuk',
        'absen_masuk',
        'jam_pulang',
        'absen_pulang',
        'ijin_id',
        'cuti_id',
        'sakit_id'
    ];
}
