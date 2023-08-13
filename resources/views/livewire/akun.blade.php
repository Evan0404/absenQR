<div>
    <h3>Pengaturan akun</h3>
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <!-- Button trigger modal -->
            <button wire:click="kosong" type="button" class="btn btn-primary btn-sm mb-3" style="max-width: 100px;"
                data-bs-toggle="modal" data-bs-target="#basicModal">
                [+] Tambah
            </button>
            <!-- Modal -->
            <div class="modal fade" wire:ignore id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Tambah Akun</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Name</label>
                                    <input type="text" wire:model="nama" id="nameBasic" class="form-control"
                                        placeholder="Enter Name" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Email</label>
                                    <input type="email" wire:model="email" id="nameBasic" class="form-control"
                                        placeholder="example@gmail.com" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Password (Uniqe Code)</label>
                                    <input type="password" wire:model="password" id="nameBasic" class="form-control"
                                        placeholder="Enter Password" />
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="emailBasic" class="form-label">Jam Masuk</label>
                                    <input type="time" wire:model="jam_masuk" id="emailBasic" class="form-control" />
                                </div>
                                <div class="col mb-3">
                                    <label for="dobBasic" class="form-label">Jam Pulang</label>
                                    <input type="time" wire:model="jam_pulang" id="dobBasic" class="form-control" />
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Foto Profil</label>
                                    <input type="file" wire:model="pp" id="nameBasic" class="form-control"
                                        placeholder="Enter Password" />
                                </div>
                            </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="add">Save
                                changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card p-3">
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Jam masuk - pulang</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($akun as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <strong class="text-capitalize">{{ $item->name }}</strong>
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->jam_masuk }} - {{ $item->jam_pulang }} WIB</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#see{{ $item->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <!-- Modal See-->
                                    <div class="modal fade" wire:ignore id="see{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel1">Lihat
                                                        {{ $item->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="visible-print text-center">
                                                        <div class="w-100 bg-primary">
                                                            <h6 style="color: white;"><b>{{ $item->name }}</b></h6>
                                                        </div>
                                                        {!! QrCode::size(100)->generate($item->id) !!}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" wire:click="showforUpdate({{ $item->id }})"
                                        class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#update{{ $item->id }}"> <i
                                            class="bi bi-pencil-square"></i>
                                    </button>
                                    <!-- Modal Update-->
                                    <div class="modal fade" wire:ignore id="update{{ $item->id }}"
                                        tabindex="-1" aria-hidden="true">
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
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label">Name</label>
                                                            <input type="text" wire:model="nama" id="nameBasic"
                                                                class="form-control" placeholder="Enter Name" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label">Email</label>
                                                            <input type="email" wire:model="email" id="nameBasic"
                                                                class="form-control"
                                                                placeholder="example@gmail.com" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label">Password
                                                                (Jika Tidak ingin diganti, Biarkan Kosong)
                                                            </label>
                                                            <input type="password" wire:model="password"
                                                                id="nameBasic" class="form-control"
                                                                placeholder="Enter New Password" />
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-3">
                                                            <label for="emailBasic" class="form-label">Jam
                                                                Masuk</label>
                                                            <input type="time" wire:model="jam_masuk"
                                                                id="emailBasic" class="form-control" />
                                                        </div>
                                                        <div class="col mb-3">
                                                            <label for="dobBasic" class="form-label">Jam
                                                                Pulang</label>
                                                            <input type="time" wire:model="jam_pulang"
                                                                id="dobBasic" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" wire:click="kosong"
                                                        class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button type="button" wire:click="update({{ $item->id }})"
                                                        data-bs-dismiss="modal"
                                                        class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#del{{ $item->id }}">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                    <!-- Modal Delete-->
                                    <div class="modal fade" wire:ignore id="del{{ $item->id }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Delete Data
                                                        {{ $item->name }}</h5>
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
                                                    <button type="button" data-bs-dismiss="modal"
                                                        class="btn btn-danger"
                                                        wire:click="delete({{ $item->id }})">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
