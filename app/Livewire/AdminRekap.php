<?php

namespace App\Livewire;

use Livewire\Component;

class AdminRekap extends Component
{
    public function render()
    {
        return view('livewire.admin-rekap')->extends('components.layouts.app')->section('content');
    }
}
