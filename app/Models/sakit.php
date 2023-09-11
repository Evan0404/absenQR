<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sakit extends Model
{
    use HasFactory;
    protected $fillable =[
        'keterangan',
        'tanggal_sakit_awal',
        'tanggal_sakit_akhir',
        'user_id',
        'surat_dokter',
        'status'
    ];
}
