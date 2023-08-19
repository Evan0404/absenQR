<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <h3>Dashboard of You</h3>
    <center>
        {{-- {!! QrCode::size(100)->generate(Auth::user()->id) !!} --}}
    </center>
    <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-2">
        <div class="col">
            <div class="card shadow-lg">
                <div class="row p-2">
                    <div class="col-4 d-flex align-items-center">
                        <h2 class="mx-auto my-auto"><i class="text-success bi bi-calendar2-check"></i></h2>
                    </div>
                    <div class="col-8">
                        <label for="" class="mb-0">Masuk Tepat Waktu</label>
                        <h2 class="mt-0">{{ $masuk_tepat_waktu }}</h2>
                    </div>
                </div>
                <div class="card-bottom p-1 bg-success"></div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-lg">
                <div class="row p-2">
                    <div class="col-4 d-flex align-items-center">
                        <h2 class="mx-auto my-auto"><i class="text-danger bi bi-calendar2-x"></i></h2>
                    </div>
                    <div class="col-8">
                        <label for="" class="mb-0">Masuk Terlambat</label>
                        <h2 class="mt-0">{{ $masuk_terlambat }}</h2>
                    </div>
                </div>
                <div class="card-footer p-1 bg-danger"></div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-lg">
                <div class="row p-2">
                    <div class="col-4 d-flex align-items-center">
                        <h2 class="mx-auto my-auto"><i class="bi bi-calendar2-plus text-primary"></i></h2>
                    </div>
                    <div class="col-8">
                        <label for="" class="mb-0">Pulang Tepat Waktu</label>
                        <h2 class="mt-0">{{ $pulang_tepat_waktu }}</h2>
                    </div>
                </div>
                <div class="card-footer p-1 bg-primary"></div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow-lg">
                <div class="row p-2">
                    <div class="col-4 d-flex align-items-center">
                        <h2 class="mx-auto my-auto"><i class="bi bi-calendar2-minus text-dark"></i></h2>
                    </div>
                    <div class="col-8">
                        <label for="" class="mb-0">Pulang Duluan</label>
                        <h2 class="mt-0">{{ $pulang_duluan }}</h2>
                    </div>
                </div>
                <div class="card-footer p-1 bg-dark"></div>
            </div>
        </div>
    </div>
    <br>
    <div class="card shadow mb-2 p-2">
        <div class="row">
            <div class="col-9">
                <input type="date" wire:model.live="src" placeholder="Cari" class="form-control">
            </div>
            <div class="col-3">
                <button class="btn btn-success"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </div>
    <div class="card p-2 shadow-lg">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Absen Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Absen Pulang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absen as $item)
                        <tr>
                            <td>{{ $item['created_at']->format('d M Y') }}</td>
                            <td>{{ $item['jam_masuk'] }}</td>
                            <td>{{ $item['absen_masuk'] }}</td>
                            <td>{{ $item['jam_pulang'] }}</td>
                            <td>{{ $item['absen_pulang'] }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
