<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\user;

class UserAbsen extends Component
{
    public function render()
    {
        $data = [
            'data' => user::where('id', auth()->user()->id)->first()
        ];
        return view('livewire.user-absen', $data)->extends('components.layouts.app2')->section('content');
    }
}
