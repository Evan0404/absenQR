<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\absen;

class AdminAbsen extends Component
{
    public $id;

    protected $listeners =['setid'];
    public function render()
    {
        return view('livewire.admin-absen')->extends('components.layouts.app')->section('content');
        $this -> emit(event: 'setid');
    }
    public function setid($id)
    {
        $this->id = $id;
    }
}
