<div>
    <h2>Absensi</h2>
    <br>
    <center>
        <div class="container ">
        </div>
        <div class="card container shadow-lg p-3" style="max-width: 650px;">
            <div wire:ignore>
                <video id="preview" class="w-100 h-100"></video>
            </div>
            <form method="POST">
                <input type="text" wire:model.live='id' id="id" class="form-control">
            </form>
            {{ $id }}
        </div>
    </center>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script data-navigate-once wire:ignore type="text/javascript">
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
            if (c != '') {
                Livewire.dispatch('setid', c);
                Livewire.find('id').set('id', c);
            }
            // let $wire = {
            //     id: c,
            // }
        });
    </script>
</div>
