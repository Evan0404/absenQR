<div>
    <h2>Absensi</h2>
    <br>
    <center>
        <div class="container ">
        </div>
        <div class="card container shadow-lg p-3" style="max-width: 650px;">
            <video id="preview" class="w-100 h-100"></video>
            <form method="POST">
                <input type="text" wire:model.live='name' class="form-control">
            </form>
            {{-- {{ $name }} --}}
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
    </script>
</div>
