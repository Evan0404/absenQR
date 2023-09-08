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
                     <button class="btn btn-primary w-100" wire:click="createijin()">Ajukan</button>
                 </form>
             </div>
         </center>
         {{-- Form Ijin Luar Cuti --}}
     @elseif ($form == 2)
         <button wire:click="changeform('0')" class="btn btn-sm btn-success mt-0 mb-3"><i
                 class="bi bi-arrow-left-circle"></i> Back</button>
         {{-- Form Ijin Cuti --}}
     @elseif ($form == 3)
         <button wire:click="changeform('0')" class="btn btn-sm btn-success mt-0 mb-3"><i
                 class="bi bi-arrow-left-circle"></i> Back</button>
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
                                 <h1 style="font-size: 3em;" class="text-warning"><i class="bi bi-receipt-cutoff"></i>
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
                             <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
