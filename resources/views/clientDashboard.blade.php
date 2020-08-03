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
        <div style="margin-top: 50px;" class="col-md-9">
            
        </div>
    </div>
</div>

</body>
@endsection