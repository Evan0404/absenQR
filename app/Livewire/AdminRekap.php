<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\absen;
use App\Models\User;

class AdminRekap extends Component
{
    public $src;
    public $user_id =0;
    public $tglawal;
    public $tglakhir;

    public $masuk_tepat_waktu;
    public $masuk_terlambat;
    public $pulang_tepat_waktu;
    public $pulang_duluan;

    public function render()
    {
        if($this->src != ''){
            $data = [
                'no' => 1,
                'rekap' => User::where('name', 'like', '%'.$this->src.'%')->orderBy('name', 'desc')->get()
            ];
        }else{
            $data = [
                'no' => 1,
                'rekap' => User::orderBy('name', 'desc')->get()
            ];
        }

        $detail = [
            'show' => absen::where('user_id', $this->user_id)->orderBy('created_at', 'desc')->get(),
            'datadiri' => user::where('id', $this->user_id)->first()
        ];
        $this->masuk_tepat_waktu=absen::where('user_id', '=', $this->user_id)->where('jam_masuk','>=','absen_masuk')->count();
        $this->masuk_terlambat=absen::where('user_id', '=', $this->user_id)->where('jam_masuk','<','absen_masuk')->count();
        return view('livewire.admin-rekap', $data, $detail)->extends('components.layouts.app')->section('content');
    }

    public function changeid($id)
    {
        $this->user_id = $id;

    }
}
