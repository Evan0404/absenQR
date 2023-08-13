@extends('components.layouts.app')
@section('content')
    <div>
        <h2>Absensi</h2>
        <br>
        <center>
            <div class="container ">
            </div>
            <div class="card container shadow-lg p-2" style="max-width: 450px;">
                @if (session('message'))
                    <div class="alert alert-danger" role="alert">Anda Sudah Absen</div>
                @elseif (session('messagesuc'))
                    <div class="alert alert-success" role="alert">Anda Berhasil Absen</div>
                @endif
                <div wire:ignore>
                    <video id="preview" class="w-100 h-100"></video>
                </div>
                <form method="POST" id="form" action="{{ route('createAbsen') }}">
                    @csrf
                    <input hidden type="text" name="id" id="idd" class="form-control">
                    <input hidden type="date" name="date" value="{{ date('Y-m-d') }}" class="form-control">
                    <input hidden type="time" name="date" value="{{ date('H:i:s') }}" class="form-control">
                    {{-- <input type="date" name="tanggal" class="form-control"> --}}
                </form>
            </div>
            <br>
            <div class="card shadow-lg">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Waktu Masuk</th>
                                    <th>Waktu Absen</th>
                                    <th>Nama Lengkap</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($masuk as $item)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $item->jam_masuk }}</strong>
                                        </td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $item->absen_masuk }}</strong>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        @if ($item->jam_masuk < $item->absen_masuk)
                                            <td><span class="badge bg-label-danger me-1">Telat Goblok</span></td>
                                        @else
                                            <td><span class="badge bg-label-success me-1">Tepat Waktu</span></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </center>
        <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
        <script type="text/javascript">
            let scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            scanner.addListener('scan', function(content) {
                console.log(content);
            });
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });

            scanner.addListener('scan', function(c) {
                document.getElementById('idd').value = c;
                document.getElementById('form').submit();
            });
        </script>
    </div>
@endsection
