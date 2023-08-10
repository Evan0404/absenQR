<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\absen;

class AdminAbsen extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.admin-absen')->extends('components.layouts.app')->section('content');
    }
}
