<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ijin;

class UserIjin extends Component
{
    public $form =0;
    public $tglmulai;
    public $tglsampai;
    public $ket;
    public function render()
    {
        return view('livewire.user-ijin')->extends('components.layouts.app2')->section('content');
    }

    public function changeform($num)
    {
        $this->form=$num;
    }

    public function createijin()
    {
        ijin::create([
            'keterangan' => $this->ket,
            'tanggal_izin_awal' => $this->tglmulai,
            'tanggal_izin_akhir' => $this->tglsampai,
            'user_id' => auth()->user()->id,
            'status' => "Diajukan"
        ]);
    }
}
