<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuti extends Model
{
    use HasFactory;
    protected $fillable =[
        'keterangan',
        'tanggal_cuti_awal',
        'tanggal_cuti_akhir',
        'user_id',
        'status'
    ];
}
