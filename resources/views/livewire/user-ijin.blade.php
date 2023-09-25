 <div>
     {{-- The best athlete wants his opponent at his best. --}}
     <h1 class="mb-0">Perizinan</h1>
     @if ($form == 1)
         <button wire:click="changeform('0')" class="btn btn-sm btn-success mt-0 mb-3"><i
                 class="bi bi-arrow-left-circle"></i> Back</button>
         <center>
             <div class="card shadow-lg p-2" style="max-width: 600px;">
                 <h3>Izin (Luar Cuti)</h3>
                 <br>
                 <form>
                     <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label"
                             style="float: left; margin-left: 2px;"><b>Nama</b></label>
                         <input type="text" class="form-control" disabled readonly id="exampleInputEmail1"
                             value="{{ Auth::user()->name }}" aria-describedby="emailHelp">
                         {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label" style="float: left; margin-left: 2px;"><b>Tanggal
                                 Ijin</b></label>
                         <input type="date" wire:model="tglmulai" class="form-control">
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label" style="float: left; margin-left: 2px;"><b>Sampai
                                 Tanggal</b></label>
                         <input type="date" wire:model="tglsampai" class="form-control">
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label"
                             style="float: left; margin-left: 2px;"><b>Keterangan</b></label>
                         {{-- <input type="date" class="form-control"> --}}
                         <textarea name="" wire:model="ket" class="form-control"></textarea>
                     </div>
                     <button type="button" class="btn btn-primary w-100" wire:click="createIjin()">Ajukan</button>
                 </form>
             </div>
         </center>
         {{-- Form Ijin Luar Cuti --}}
     @elseif ($form == 2)
         <button wire:click="changeform('0')" class="btn btn-sm btn-success mt-0 mb-3"><i
                 class="bi bi-arrow-left-circle"></i> Back</button>
         <center>
             <div class="card shadow-lg p-2" style="max-width: 600px;">
                 <h3>Cuti</h3>
                 <br>
                 <form>
                     <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label"
                             style="float: left; margin-left: 2px;"><b>Nama</b></label>
                         <input type="text" class="form-control" disabled readonly id="exampleInputEmail1"
                             value="{{ Auth::user()->name }}" aria-describedby="emailHelp">
                         {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label" style="float: left; margin-left: 2px;"><b>Tanggal
                                 Cuti</b></label>
                         <input type="date" wire:model="tglmulai" class="form-control">
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label" style="float: left; margin-left: 2px;"><b>Sampai
                                 Tanggal</b></label>
                         <input type="date" wire:model="tglsampai" class="form-control">
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label"
                             style="float: left; margin-left: 2px;"><b>Keterangan</b></label>
                         {{-- <input type="date" class="form-control"> --}}
                         <textarea name="" wire:model="ket" class="form-control"></textarea>
                     </div>
                     <button type="button" class="btn btn-primary w-100" wire:click="createCuti()">Ajukan</button>
                 </form>
             </div>
         </center>
         {{-- Form Ijin Cuti --}}
     @elseif ($form == 3)
         <button wire:click="changeform('0')" class="btn btn-sm btn-success mt-0 mb-3"><i
                 class="bi bi-arrow-left-circle"></i> Back</button>
         <center>
             <div class="card shadow-lg p-2" style="max-width: 600px;">
                 <h3>Sakit</h3>
                 <br>
                 <form>
                     <div class="mb-3">
                         <label for="exampleInputEmail1" class="form-label"
                             style="float: left; margin-left: 2px;"><b>Nama</b></label>
                         <input type="text" class="form-control" disabled readonly id="exampleInputEmail1"
                             value="{{ Auth::user()->name }}" aria-describedby="emailHelp">
                         {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label" style="float: left; margin-left: 2px;"><b>Tanggal
                                 Ijin</b></label>
                         <input type="date" wire:model="tglmulai" class="form-control">
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label" style="float: left; margin-left: 2px;"><b>Sampai
                                 Tanggal</b></label>
                         <input type="date" wire:model="tglsampai" class="form-control">
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label" style="float: left; margin-left: 2px;"><b>Surat
                                 Dokter</b></label>
                         <input type="file" wire:model="foto" class="form-control">
                     </div>
                     <div class="mb-3">
                         <label for="" class="form-label"
                             style="float: left; margin-left: 2px;"><b>Keterangan</b></label>
                         {{-- <input type="date" class="form-control"> --}}
                         <textarea name="" wire:model="ket" class="form-control"></textarea>
                     </div>
                     <button type="button" class="btn btn-primary w-100" wire:click="createSakit()">Ajukan</button>
                 </form>
             </div>
         </center>
         {{-- Form Ijin Sakit --}}
     @else
         {{-- <div class="row mt-2">
             <div class="col-md-6">
                 <div class="card shadow-lg mb-2">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-4 d-flex align-items-center justify-content-center">
                                 <center>
                                     <h1 style="font-size: 3em;" class="text-danger"><i class="bi bi-envelope-paper"></i>
                                     </h1>
                                 </center>
                             </div>
                             <div class="col-8">
                                 <h3>Ijin (Luar Cuti)</h3>
                                 <h4>100</h4>
                             </div>
                         </div>
                     </div>
                     <div class="card-footer bg-danger p-1">

                     </div>
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="card shadow-lg mb-2">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-4 d-flex align-items-center justify-content-center">
                                 <center>
                                     <h1 style="font-size: 3em;" class="text-warning"><i
                                             class="bi bi-receipt-cutoff"></i></h1>
                                 </center>
                             </div>
                             <div class="col-8">
                                 <h3>Cuti (1 Bulan 1x)</h3>
                                 <h4>100</h4>
                             </div>
                         </div>
                     </div>
                     <div class="card-footer bg-warning p-1">

                     </div>
                 </div>
             </div>
             <div class="col-md-12">
                 <div class="card shadow-lg mb-2">
                     <div class="card-body">
                         <div class="row">
                             <div class="col-4 d-flex align-items-center justify-content-center">
                                 <center>
                                     <h1 class="text-dark"><i class="bi bi-receipt-cutoff"></i></h1>
                                 </center>
                             </div>
                             <div class="col-8">
                                 <h3>Cuti (1 Bulan 1x)</h3>
                                 <h4>100</h4>
                             </div>
                         </div>
                     </div>
                     <div class="card-footer bg-dark p-1">

                     </div>
                 </div>
             </div>
         </div> --}}
     @endif
     <br>
     <div class="row">
         <div class="col-md-4">
             <div class="card shadow-lg mb-2" wire:click="changeform('1')">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-4 d-flex align-items-center justify-content-center">
                             <center>
                                 <h1 style="" class="text-danger"><i class="bi bi-envelope-paper"></i>
                                 </h1>
                             </center>
                         </div>
                         <div class="col-8">
                             <h3>Ijin (Luar Cuti)</h3>
                             <h4>100</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer bg-danger p-1">

                 </div>
             </div>
             <div class="card shadow-lg mb-2" wire:click="changeform('2')">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-4 d-flex align-items-center justify-content-center">
                             <center>
                                 <h1 style="font-size: 3em;" class="text-warning"><i
                                         class="bi bi-receipt-cutoff"></i>
                                 </h1>
                             </center>
                         </div>
                         <div class="col-8">
                             <h3>Cuti (1 Bulan 1x)</h3>
                             <h4>100</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer bg-warning p-1">

                 </div>
             </div>
             <div class="card shadow-lg mb-2" wire:click="changeform('3')">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-4 d-flex align-items-center justify-content-center">
                             <center>
                                 <h1 class="text-dark"><i class="bi bi-thermometer-high"></i></h1>
                             </center>
                         </div>
                         <div class="col-8">
                             <h3>Ijin Sakit</h3>
                             <h4>100</h4>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer bg-dark p-1">

                 </div>
             </div>
         </div>
         <div class="col-md-8">
             <div class="card shadow-lg p-2">
                 <div class="table-responsive">
                     <table class="table table-striped">
                         <thead>
                             <tr>
                                 <th>Mulai</th>
                                 <th>Hingga</th>
                                 <th>Pengajuan</th>
                                 <th>Type</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($ijin as $data)
                                 <tr>
                                     <td>{{ $data->tanggal_izin_awal }}</td>
                                     <td>{{ $data->tanggal_izin_akhir }}</td>
                                     <td>{{ $data->status }}</td>
                                     <td>Izin (Luar Cuti)</td>
                                     <td>
                                         <div class="btn-group" role="group" aria-label="Basic example">
                                             <button type="button" data-bs-toggle="modal" data-bs-target="#shw"
                                                 wire:click="changeModal('izin', {{ $data->id_ijin }})"
                                                 class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                                             @if ($data->status == 'Diajukan')
                                                 <button type="button" data-bs-toggle="modal" data-bs-target="#edt"
                                                     wire:click="changeModal('izin', {{ $data->id_ijin }})"
                                                     class="btn btn-sm btn-success"><i
                                                         class="bi bi-pencil"></i></button>
                                             @endif
                                             <button type="button" class="btn btn-sm btn-danger"><i
                                                     class="bi bi-trash"></i></button>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                             @foreach ($cuti as $data)
                                 <tr>
                                     <td>{{ $data->tanggal_cuti_awal }}</td>
                                     <td>{{ $data->tanggal_cuti_akhir }}</td>
                                     <td>{{ $data->status }}</td>
                                     <td>Cuti</td>
                                     <td>
                                         <div class="btn-group" role="group" aria-label="Basic example">
                                             <button type="button" data-bs-toggle="modal" data-bs-target="#shw"
                                                 wire:click="changeModal('cuti', {{ $data->id_cuti }})"
                                                 class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                                             @if ($data->status == 'Diajukan')
                                                 <button type="button" data-bs-toggle="modal" data-bs-target="#edt"
                                                     wire:click="changeModal('cuti', {{ $data->id_cuti }})"
                                                     class="btn btn-sm btn-success"><i
                                                         class="bi bi-pencil"></i></button>
                                             @endif
                                             <button type="button" class="btn btn-sm btn-danger"><i
                                                     class="bi bi-trash"></i></button>
                                         </div>
                                     </td>
                                 </tr>
                             @endforeach
                             @foreach ($sakit as $data)
                                 <tr>
                                     <td>{{ $data->tanggal_sakit_awal }}</td>
                                     <td>{{ $data->tanggal_sakit_akhir }}</td>
                                     <td>{{ $data->status }}</td>
                                     <td>Sakit</td>
                                     <td>
                                         <div class="btn-group" role="group" aria-label="Basic example">
                                             <button type="button" data-bs-toggle="modal"
                                                 data-bs-target="#shwSakit{{ $data->id_sakit }}"
                                                 wire:click="changeModal('sakit', {{ $data->id_sakit }})"
                                                 class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                                             @if ($data->status == 'Diajukan')
                                                 <button type="button" data-bs-toggle="modal"
                                                     data-bs-target="#edtSakit{{ $data->id_sakit }}"
                                                     wire:click="changeModal('sakit', {{ $data->id_sakit }})"
                                                     class="btn btn-sm btn-success"><i
                                                         class="bi bi-pencil"></i></button>
                                             @endif
                                             <button type="button" class="btn btn-sm btn-danger"><i
                                                     class="bi bi-trash"></i></button>
                                         </div>
                                     </td>
                                 </tr>
                                 {{-- Modal Show Sakit (Soal e ada foto e) --}}
                                 <div class="modal fade" wire:ignore id="shwSakit{{ $data->id_sakit }}"
                                     data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                     <div class="modal-dialog modal-lg">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail
                                                     Perizinan Sakit</h1>
                                                 <button type="button" class="btn-close"
                                                     wire:click="changeform('0')"" data-bs-dismiss="modal"
                                                     aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                 <form>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <img class="w-100"
                                                                 src="{{ asset('storage') }}/{{ $data->surat_dokter }}"
                                                                 alt="">
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="mb-3">
                                                                 <label for="exampleInputEmail1" class="form-label"
                                                                     style="float: left; margin-left: 2px;"><b>Nama</b></label>
                                                                 <input disabled type="text" class="form-control"
                                                                     disabled readonly id="exampleInputEmail1"
                                                                     value="{{ Auth::user()->name }}"
                                                                     aria-describedby="emailHelp">
                                                                 {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="" class="form-label"
                                                                     style="float: left; margin-left: 2px;"><b>Tanggal
                                                                         Izin</b></label>
                                                                 <input disabled type="date" wire:model="tglmulai"
                                                                     class="form-control">
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="" class="form-label"
                                                                     style="float: left; margin-left: 2px;"><b>Sampai
                                                                         Tanggal</b></label>
                                                                 <input disabled type="date" wire:model="tglsampai"
                                                                     class="form-control">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="mb-3">
                                                         <label for="" class="form-label"
                                                             style="float: left; margin-left: 2px;"><b>Keterangan</b></label>
                                                         {{-- <input type="date" class="form-control"> --}}
                                                         <textarea disabled name="" wire:model="ket" class="form-control"></textarea>
                                                     </div>
                                                     {{-- <button type="button" class="btn btn-primary w-100"
                                                        wire:click="createCuti()">Ajukan</button> --}}
                                                 </form>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary"
                                                     wire:click="changeform('0')""
                                                     data-bs-dismiss="modal">Close</button>
                                                 {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 {{-- Modal Edit Sakit (Soal e ada foto e) --}}
                                 <div class="modal fade" wire:ignore id="edtSakit{{ $data->id_sakit }}"
                                     data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                     <div class="modal-dialog modal-lg">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit
                                                     Perizinan Sakit</h1>
                                                 <button type="button" class="btn-close"
                                                     wire:click="changeform('0')"" data-bs-dismiss="modal"
                                                     aria-label="Close"></button>
                                             </div>
                                             <div class="modal-body">
                                                 <form>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <img class="w-100"
                                                                 src="{{ asset('storage') }}/{{ $data->surat_dokter }}"
                                                                 alt="">
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="mb-3">
                                                                 <label for="exampleInputEmail1" class="form-label"
                                                                     style="float: left; margin-left: 2px;"><b>Nama</b></label>
                                                                 <input disabled type="text" class="form-control"
                                                                     disabled readonly id="exampleInputEmail1"
                                                                     value="{{ Auth::user()->name }}"
                                                                     aria-describedby="emailHelp">
                                                                 {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="" class="form-label"
                                                                     style="float: left; margin-left: 2px;"><b>Tanggal
                                                                         Izin</b></label>
                                                                 <input type="date" wire:model="tglmulai"
                                                                     class="form-control">
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="" class="form-label"
                                                                     style="float: left; margin-left: 2px;"><b>Sampai
                                                                         Tanggal</b></label>
                                                                 <input type="date" wire:model="tglsampai"
                                                                     class="form-control">
                                                             </div>
                                                             <div class="mb-3">
                                                                 <label for="" class="form-label"
                                                                     style="float: left; margin-left: 2px;"><b>Foto</b></label>
                                                                 <input type="file" wire:model="foto"
                                                                     class="form-control">
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="mb-3">
                                                         <label for="" class="form-label"
                                                             style="float: left; margin-left: 2px;"><b>Keterangan</b></label>
                                                         {{-- <input type="date" class="form-control"> --}}
                                                         <textarea name="" wire:model="ket" class="form-control"></textarea>
                                                     </div>
                                                     {{-- <button type="button" class="btn btn-primary w-100"
                                                        wire:click="createCuti()">Ajukan</button> --}}
                                                 </form>
                                             </div>
                                             <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary"
                                                     wire:click="changeform('0')""
                                                     data-bs-dismiss="modal">Close</button>
                                                 <button data-bs-dismiss="modal" type="button" wire:click="Update()"
                                                     class="btn btn-primary">Update</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
     <!-- Modal Show Ijin & Cuti -->
     <div class="modal fade" wire:ignore id="shw" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Perizinan</h1>
                     <button type="button" class="btn-close" wire:click="changeform('0')"" data-bs-dismiss="modal"
                         aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form>
                         <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label"
                                 style="float: left; margin-left: 2px;"><b>Nama</b></label>
                             <input disabled type="text" class="form-control" disabled readonly
                                 id="exampleInputEmail1" value="{{ Auth::user()->name }}"
                                 aria-describedby="emailHelp">
                             {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                         </div>
                         <div class="mb-3">
                             <label for="" class="form-label"
                                 style="float: left; margin-left: 2px;"><b>Tanggal
                                     Izin</b></label>
                             <input disabled type="date" wire:model="tglmulai" class="form-control">
                         </div>
                         <div class="mb-3">
                             <label for="" class="form-label"
                                 style="float: left; margin-left: 2px;"><b>Sampai
                                     Tanggal</b></label>
                             <input disabled type="date" wire:model="tglsampai" class="form-control">
                         </div>
                         <div class="mb-3">
                             <label for="" class="form-label"
                                 style="float: left; margin-left: 2px;"><b>Keterangan</b></label>
                             {{-- <input type="date" class="form-control"> --}}
                             <textarea disabled name="" wire:model="ket" class="form-control"></textarea>
                         </div>
                         {{-- <button type="button" class="btn btn-primary w-100"
                             wire:click="createCuti()">Ajukan</button> --}}
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" wire:click="changeform('0')""
                         data-bs-dismiss="modal">Close</button>
                     {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
                 </div>
             </div>
         </div>
     </div>



     <!-- Modal Edit -->
     <div class="modal fade" wire:ignore id="edt" data-bs-backdrop="static" data-bs-keyboard="false"
         tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Perizinan</h1>
                     <button type="button" class="btn-close" wire:click="changeform('0')"" data-bs-dismiss="modal"
                         aria-label="Close"></button>
                 </div>
                 <div class="modal-body">
                     <form>
                         <div class="mb-3">
                             <label for="exampleInputEmail1" class="form-label"
                                 style="float: left; margin-left: 2px;"><b>Nama</b></label>
                             <input type="text" class="form-control" disabled readonly id="exampleInputEmail1"
                                 value="{{ Auth::user()->name }}" aria-describedby="emailHelp">
                             {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                         </div>
                         <div class="mb-3">
                             <label for="" class="form-label"
                                 style="float: left; margin-left: 2px;"><b>Tanggal
                                     Izin</b></label>
                             <input type="date" wire:model="tglmulai" class="form-control">
                         </div>
                         <div class="mb-3">
                             <label for="" class="form-label"
                                 style="float: left; margin-left: 2px;"><b>Sampai
                                     Tanggal</b></label>
                             <input type="date" wire:model="tglsampai" class="form-control">
                         </div>
                         <div class="mb-3">
                             <label for="" class="form-label"
                                 style="float: left; margin-left: 2px;"><b>Keterangan</b></label>
                             {{-- <input type="date" class="form-control"> --}}
                             <textarea name="" wire:model="ket" class="form-control"></textarea>
                         </div>
                         {{-- <button type="button" class="btn btn-primary w-100"
                             wire:click="createCuti()">Ajukan</button> --}}
                     </form>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" wire:click="changeform('0')""
                         data-bs-dismiss="modal">Close</button>
                     <button type="button" data-bs-dismiss="modal" wire:click="Update()"
                         class="btn btn-primary">Understood</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
