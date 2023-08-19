<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\absen;
use App\Models\user;

class UserDashboar extends Component
{
    public $src;
    public $masuk_tepat_waktu;
    public $masuk_terlambat;
    public $pulang_tepat_waktu;
    public $pulang_duluan;
    public function render()
    {
        if($this->src != ''){
            $data =[
                'absen' => absen::select('absens.*','users.id','users.jam_masuk','users.jam_pulang')->join('users', 'absens.user_id', '=', 'users.id')->where('user_id', auth()->user()->id)->whereDate('absens.created_at', $this->src)->orderBy('absens.created_at', 'desc')->get()
            ];
        }else{
            $data =[
                'absen' => absen::select('absens.*','users.id','users.jam_masuk','users.jam_pulang')->join('users', 'absens.user_id', '=', 'users.id')->where('user_id', auth()->user()->id)->orderBy('absens.created_at', 'desc')->get()
            ];
        }
        $getjam = user::where('id', auth()->user()->id)->first();
        $this->masuk_tepat_waktu = absen::where('user_id', '=', auth()->user()->id)->where('absen_masuk', '<=', $getjam['jam_masuk'])->count();
        $this->masuk_terlambat = absen::where('user_id', '=', auth()->user()->id)->where('absen_masuk', '>', $getjam['jam_masuk'])->count();
        $this->pulang_tepat_waktu = absen::where('user_id', '=', auth()->user()->id)->where('absen_pulang', '>=', $getjam['jam_pulang'])->count();
        $this->pulang_duluan= absen::where('user_id', '=', auth()->user()->id)->where('absen_pulang', '<', $getjam['jam_pulang'])->count();
        return view('livewire.user-dashboar', $data)->extends('components.layouts.app2')->section('content');
    }
}
