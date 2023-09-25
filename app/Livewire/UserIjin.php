<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ijin;
use App\Models\cuti;
use App\Models\sakit;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;


class UserIjin extends Component
{
    use WithFileUploads;

    public $form =0;
    public $foto;
    public $fotoLama;
    public $jenisModal;
    public $tglmulai;
    public $tglsampai;
    public $ket;
    public $idPerizinan;

    public function render()
    {
        $data=[
            'ijin' => ijin::where('user_id', auth()->user()->id)->orderBy('id_ijin','desc')->get(),
            'sakit' => sakit::where('user_id', auth()->user()->id)->orderBy('id_sakit','desc')->get(),
            'cuti' => cuti::where('user_id', auth()->user()->id)->orderBy('id_cuti','desc')->get()
        ];
        return view('livewire.user-ijin', $data)->extends('components.layouts.app2')->section('content');
    }

    public function changeform($num)
    {
        $this->form=$num;
        $this->ket ='';
        $this->foto ='';
        $this->fotoLama ='';
        $this->tglmulai ='';
        $this->tglsampai ='';
        $this->jenisModal ='';
        $this->idPerizinan  = '';
    }

    public function createIjin()
    {
        ijin::create([
            'keterangan' => $this->ket,
            'tanggal_izin_awal' => $this->tglmulai,
            'tanggal_izin_akhir' => $this->tglsampai,
            'user_id' => auth()->user()->id,
            'status' => 'Diajukan'
        ]);
        $this->ket ='';
        $this->tglmulai ='';
        $this->tglsampai ='';
        $this->form=0;
    }

    public function createCuti()
    {
        cuti::create([
            'keterangan' => $this->ket,
            'tanggal_cuti_awal' => $this->tglmulai,
            'tanggal_cuti_akhir' => $this->tglsampai,
            'user_id' => auth()->user()->id,
            'status' => 'Diajukan'
        ]);
        $this->ket ='';
        $this->tglmulai ='';
        $this->tglsampai ='';
        $this->form=0;
    }

    public function createSakit()
    {
        $fotoName = $this->foto->store('suratDokter', 'public');
        sakit::create([
            'keterangan' => $this->ket,
            'tanggal_sakit_awal' => $this->tglmulai,
            'tanggal_sakit_akhir' => $this->tglsampai,
            'user_id' => auth()->user()->id,
            'surat_dokter' => $fotoName,
            'status' => 'Diajukan'
        ]);
        $this->foto='';
        $this->ket ='';
        $this->tglmulai ='';
        $this->tglsampai ='';
        $this->form=0;
    }

    // Menampilkan Modal Untuk Detail dan Edit
    public function changeModal($type, $id)
    {
        if($type == 'izin'){
            $dataModal = ijin::where('id_ijin', $id)->first();
            $this->ket = $dataModal['keterangan'];
            $this->tglmulai =$dataModal['tanggal_izin_awal'];
            $this->tglsampai =$dataModal['tanggal_izin_akhir'];
            $this->jenisModal = $type;
            $this->idPerizinan = $dataModal['id_ijin'];

        }elseif($type == 'cuti'){
            $dataModal = cuti::where('id_cuti', $id)->first();
            $this->ket = $dataModal['keterangan'];
            $this->tglmulai =$dataModal['tanggal_cuti_awal'];
            $this->tglsampai =$dataModal['tanggal_cuti_akhir'];
            $this->jenisModal = $type;
            $this->idPerizinan = $dataModal['id_cuti'];

        }elseif($type == 'sakit'){
            $dataModal = sakit::where('id_sakit', $id)->first();
            $this->ket = $dataModal['keterangan'];
            $this->tglmulai =$dataModal['tanggal_sakit_awal'];
            $this->tglsampai =$dataModal['tanggal_sakit_akhir'];
            $this->fotoLama =$dataModal['surat_dokter'];
            $this->jenisModal = $type;
            $this->idPerizinan = $dataModal['id_sakit'];
        }
    }

    public function Update()
    {
        if($this->jenisModal == 'izin'){
            ijin::where('id_ijin', $this->idPerizinan)->update([
                'keterangan' => $this->ket,
                'tanggal_izin_awal' => $this->tglmulai,
                'tanggal_izin_akhir' => $this->tglsampai,
            ]);
        }elseif($this->jenisModal == 'cuti'){
            cuti::where('id_cuti', $this->idPerizinan)->update([
                'keterangan' => $this->ket,
                'tanggal_cuti_awal' => $this->tglmulai,
                'tanggal_cuti_akhir' => $this->tglsampai,
            ]);
        }elseif($this->jenisModal == 'sakit'){
            if ($this->foto == '') {
                sakit::where('id_sakit', $this->idPerizinan)->update([
                    'keterangan' => $this->ket,
                    'tanggal_sakit_awal' => $this->tglmulai,
                    'tanggal_sakit_akhir' => $this->tglsampai,
                ]);
            }else{
                unlink(public_path('storage/'.$this->fotoLama));
                $fotoName = $this->foto->store('suratDokter', 'public');
                sakit::where('id_sakit', $this->idPerizinan)->update([
                    'keterangan' => $this->ket,
                    'tanggal_sakit_awal' => $this->tglmulai,
                    'tanggal_sakit_akhir' => $this->tglsampai,
                    'surat_dokter' => $fotoName
                ]);
            }
        }
        $this->form=0;
        $this->ket ='';
        $this->foto ='';
        $this->fotoLama ='';
        $this->tglmulai ='';
        $this->tglsampai ='';
        $this->jenisModal ='';
        $this->idPerizinan  = '';
    }
}
