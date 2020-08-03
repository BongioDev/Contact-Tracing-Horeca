@extends('layouts.app2')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Dashboard</h1>
        </div>
        <div class="col-md-3">
            <div style="margin-top: 50px;" class="list-group">
                <a href="/contacttracing/client/dashboard/getdata" class="list-group-item list-group-item-action">Klanten ophalen</a>
                <a href="/contacttracing/client/dashboard/QR" class="list-group-item list-group-item-action">QR code + unieke link</a>
                <a href="/contacttracing/client/dashboard/logo" class="list-group-item list-group-item-action">Logo uploaden</a>
                <a href="/contacttracing/client/dashboard/changepass" class="list-group-item list-group-item-action">Verander wachtwoord</a>
                <a href="/contacttracing/client/dashboard/help" class="list-group-item list-group-item-action">Help</a>
              </div>
        </div>
        <div class="col-md-9">
            <h4 style="margin-top: 50px;">Logo uploaden of veranderen</h4>
            <p>Upload of verander hier uw logo die uw klanten zien bij het invullen van het formulier.</p>
            <p>Huidig logo: </p><img style="max-width: 200px" src="/storage/logos/{{$client->logo}}" alt="">
            <br>
            <form action="/contacttracing/client/dashboard/logo" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="logo" type="file">
                <br>
                <small>(Max 2MB)</small>
                <br>
                <button type="submit" class="btn btn-primary">Upload logo</button>
            </form>
        </div>
    </div>
</div>

</body>
@endsection