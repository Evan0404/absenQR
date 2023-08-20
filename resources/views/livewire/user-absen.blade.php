<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <h3>Your Profile</h3>
    <center>
        <div class="card shadow-lg p-2" style="max-width: 340px;">
            <center>
                {!! QrCode::size(100)->generate(Auth::user()->id) !!}
            </center>
            <br>
            <h4>{{ $data['name'] }}</h4>
            <h6 class="text-muted">{{ $data['email'] }}</h6>
        </div>
    </center>
</div>
