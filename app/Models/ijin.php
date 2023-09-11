<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ijin extends Model
{
    use HasFactory;
    protected $fillable =[
        'keterangan',
        'tanggal_izin_awal',
        'tanggal_izin_akhir',
        'user_id',
        'status'
    ];
}
