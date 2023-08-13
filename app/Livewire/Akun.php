<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Akun extends Component
{
    public $nama;
    public $email;
    public $password;
    public $jam_masuk;
    public $jam_pulang;
    public $pp;

    public function render()
    {
        $data=[
            'akun' => User::latest()->get(),
            'no' => 1
        ];
        return view('livewire.akun', $data)->extends('components.layouts.app')->section('content');
    }

    public function add()
    {
        User::create([
            'name' =>$this->nama,
            'email'=>$this->email,
            'password'=>Hash::make($this->password),
            'jam_masuk'=>$this->jam_masuk,
            'jam_pulang'=>$this->jam_pulang,
            'level'=> "nonadmin"
        ]);
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
    }

    public function kosong()
    {
        $this->nama='';
        $this->email='';
        $this->jam_masuk='';
        $this->jam_pulang='';
        $this->password ='';
    }

    public function showforUpdate($id)
    {
        $get = User::where('id', $id)->first();

        $this->nama=$get['name'];
        $this->email=$get['email'];
        $this->password="";
        $this->jam_masuk=$get['jam_masuk'];
        $this->jam_pulang=$get['jam_pulang'];
    }

    public function update($id)
    {
        if($this->password == ''){
            User::where('id', $id)->update([
                'name' =>$this->nama,
                'email'=>$this->email,
                'jam_masuk'=>$this->jam_masuk,
                'jam_pulang'=>$this->jam_pulang,
                'level'=> "nonadmin"
            ]);
        }else{
            User::where('id', $id)->update([
                'name' =>$this->nama,
                'email'=>$this->email,
                'password'=>Hash::make($this->password),
                'jam_masuk'=>$this->jam_masuk,
                'jam_pulang'=>$this->jam_pulang,
                'level'=> "nonadmin"
            ]);
        }

        $this->nama='';
        $this->email='';
        $this->jam_masuk='';
        $this->jam_pulang='';
        $this->password ='';
    }
}
