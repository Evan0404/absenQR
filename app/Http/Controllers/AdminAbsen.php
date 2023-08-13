<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\absen;
use App\models\User;
use Carbon\Carbon;

class AdminAbsen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'masuk' => absen::rightJoin('users', 'absens.user_id', '=', 'users.id')->whereDate('absens.created_at', date('Y-m-d'))->orderBy('absens.created_at', 'desc')->get()
        ];
        return view('livewire.adminabsen', $data)->extends('components.layouts.app')->section('content');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $cekabsen = absen::where('user_id', $request->id)->whereDate('created_at', Carbon::parse(date('Y-m-d H:i:s')))->count();
        if($cekabsen > 0 ){
            return redirect()->route('absen')->with('message',"sudah");
        }else{
            $getUser = User::where('id', $request->id)->first();
            absen::create([
                'user_id' => $request->id,
                'jam_masuk' => $getUser->jam_masuk,
                'absen_masuk' => Carbon::parse(date('Y-m-d H:i:s')),
                'jam_pulang' => $getUser->jam_pulang
            ]);
            return redirect()->route('absen')->with('messagesuc',"berhasil");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
