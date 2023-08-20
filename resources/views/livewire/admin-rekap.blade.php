<div>
    {{-- The Master doesn't talk, he acts. --}}
    @if ($user_id != 0)
        <h3>Rekap Absen <b>{{ $datadiri['name'] }}</b></h3>
        <button class="btn btn-sm btn-primary" wire:click="changeid(0)">Back</button>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <h5 class="mb-1">Tanggal Awal :</h5>
                <input type="date" wire:model.live="tglawal" class="form-control">
            </div>
            <div class="col-md-5">
                <h5 class="mb-1">Tanggal Akhir :</h5>
                <input type="date" wire:model.live="tglakhir" class="form-control">
            </div>
            <div class="col-md-2">
                <br>
                <button class="btn btn-success" type="button"><i class="bi bi-search"></i></button>
            </div>
        </div>
        <br>
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
        <div class="table-responsive card shadow-lg">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Jam masuk</th>
                        <th>Absen masuk</th>
                        <th>Jam pulang</th>
                        <th>Absen pulang</th>
                        {{-- <th>Status</th> --}}
                        <th>Act</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($show as $item)
                        <tr>
                            <th>{{ $item['created_at']->format('d M Y') }}</th>
                            <th>{{ $item['jam_masuk'] }} WIB</th>
                            @if ($item['absen_masuk'] > $item['jam_masuk'])
                                <th class="text-danger">{{ $item['absen_masuk'] }} WIB</th>
                            @else
                                <th>{{ $item['absen_masuk'] }} WIB</th>
                            @endif
                            <th>{{ $item['jam_pulang'] }} WIB</th>
                            @if ($item['absen_pulang'] < $item['jam_pulang'])
                                <th class="text-danger">{{ $item['absen_pulang'] }} WIB</th>
                            @else
                                <th>{{ $item['absen_pulang'] }} WIB</th>
                            @endif
                            <th>
                                <button class="btn btn-sm btn-success"
                                    wire:click="showforUpdate({{ $item->id_absen }})" class="btn btn-success btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#update{{ $item->id_absen }}"><i
                                        class="bi bi-pen"></i></button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#del{{ $item->id_absen }}"><i class="bi bi-trash"></i></button>
                            </th>
                            <!-- Modal Update-->
                            <div class="modal fade" wire:ignore id="update{{ $item->id_absen }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Update
                                                {{ $item->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Absen Masuk</label>
                                                    <input type="time" wire:model="masuk" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Absen pulang</label>
                                                    <input type="time" wire:model="pulang" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" wire:click="kosong"
                                                class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" wire:click="update({{ $item->id_absen }})"
                                                data-bs-dismiss="modal" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Delete-->
                            <div class="modal fade" wire:ignore id="del{{ $item->id_absen }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalCenterTitle">Delete Absen
                                                {{ $item['created_at']->format('d M Y') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    Data yang dihapus tidak dapat dikembalikan, Apakah
                                                    anda
                                                    yakin <br>
                                                    ingin menghapus data ini ?
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" data-bs-dismiss="modal" class="btn btn-danger"
                                                wire:click="delete({{ $item->id_absen }})">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h3>Rekap Absen Per Hari dan Bulan </h3>
        <div class="row">
            <div class="col-9">
                <input type="text" wire:model.live="src" class="form-control mb-2" placeholder="Cari Nama">
            </div>
            <div class="col-3">
                <button class="btn btn-success"><i class="bi bi-search"></i></button>
            </div>
        </div>
        <div class="table-responsive card shadow-lg">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Pulang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rekap as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->jam_masuk }}</td>
                            <td>{{ $item->jam_pulang }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" type="button"
                                    wire:click="changeid({{ $item->id }})" data-bs-toggle="modal"
                                    data-bs-target="#see"><i class="bi bi-eye"></i></button>
                                {{-- <button class="btn btn-sm btn-danger" type="button"
                                    wire:click="changeid({{ $item->id }})"><i class="bi bi-trash"></i></button> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
