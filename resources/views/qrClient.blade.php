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
            <h4 style="margin-top: 50px;">QR code</h4>
            <p>Download hier uw gepersonaliseerde QR code om uit te printen. Klaar voor gebruik door uw klanten.</p>
            <a class="btn btn-primary" download href="/storage/qr/qrcode_{{$client->id}}.svg" title="ImageName">
                Download QR code
            </a>
            <br>
            <br>
            <h4>Unieke link</h4>
            <p>Hieronder is uw unieke link naar het formulier voor uw klanten, de QR code hierboven verwijst uw klanten door naar dezelfde link.</p>
            <p><b>http://127.0.0.1:8000/contacttracing/{{$client->id}}</b></p>
        </div>
    </div>
</div>
</body>
@endsection