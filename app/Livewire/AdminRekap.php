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
    public $masuk;
    public $pulang;

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

        if($this->tglawal != '' and $this->tglakhir != ''){
            $detail = [
                'show' => absen::where('user_id', $this->user_id)->whereDate('created_at', '>=', $this->tglawal)->whereDate('created_at', '<=', $this->tglakhir)->orderBy('created_at', 'desc')->get(),
                'datadiri' => user::where('id', $this->user_id)->first()
            ];
        }else{
            $detail = [
                'show' => absen::where('user_id', $this->user_id)->orderBy('created_at', 'desc')->get(),
                'datadiri' => user::where('id', $this->user_id)->first()
            ];
        }

        if($this->user_id != 0){
            $getjam = user::where('id', $this->user_id)->first();
            $this->masuk_tepat_waktu = absen::where('user_id', '=', $this->user_id)->where('absen_masuk', '<=', $getjam['jam_masuk'])->count();
            $this->masuk_terlambat = absen::where('user_id', '=', $this->user_id)->where('absen_masuk', '>', $getjam['jam_masuk'])->count();
            $this->pulang_tepat_waktu = absen::where('user_id', '=', $this->user_id)->where('absen_pulang', '>=', $getjam['jam_pulang'])->count();
            $this->pulang_duluan= absen::where('user_id', '=', $this->user_id)->where('absen_pulang', '<', $getjam['jam_pulang'])->count();
        }

        return view('livewire.admin-rekap', $data, $detail)->extends('components.layouts.app')->section('content');
    }

    public function changeid($id)
    {
        $this->user_id = $id;

    }

    public function delete($id_absen)
    {
        absen::where('id_absen', $id_absen)->delete();
    }

    public function showforUpdate($id)
    {
        $get1 = absen::where('id_absen', $id)->first();
        $this->masuk = $get1['absen_masuk'];
        $this->pulang = $get1['absen_pulang'];
    }

    public function kosong()
    {
        $this->masuk ='';
        $this->pulang ='';
    }

    public function update($id)
    {
        absen::where('id_absen', $id)->update([
            'absen_masuk' => $this->masuk,
            'absen_pulang' => $this->pulang
        ]);
    }
}
