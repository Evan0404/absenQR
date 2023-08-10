<?php

namespace App\Livewire;

use Livewire\Component;

class AdminDashboar extends Component
{
    public function render()
    {
        return view('livewire.admin-dashboar')->extends('components.layouts.app')->section('content');
    }
}
