@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 style="margin-bottom: 70px" class="text-center">Dashboard Admin</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="/cthorecaadmin" class="list-group-item list-group-item-action">Home</a>
                <a href="/addClient" class="list-group-item list-group-item-action">Nieuwe klant aanmaken</a>
                <a href="/getClient" class="list-group-item list-group-item-action">Alle klanten ophalen</a>
              </div>
        </div>
        <div class="col-md-9">
            <h4>Klant details</h4>
            {{-- card --}}
              <div class="card">
                <h4 class="card-header"><b>{{$client->cateringName}}</b></h4>
                <div class="card-body">
                  <p class="card-text">Eigenaar: <b>{{$client->lastName}} {{$client->firstName}}</b></p>
                  <p class="card-text">Adres: <b>{{$client->address}}</b></p>
                  <p class="card-text">Tel. Nr.: <b>{{$client->phoneNumber}}</b></p>
                  <p class="card-text">E-mail: <b>{{$client->email}}</b></p>
                  <p class="card-text">Betaald: <b>{{$client->paid}}</b></p>
                  <p class="card-text">Abonnement type: <b>{{$client->subscriptionType}}</b></p>
                  <p class="card-text">Datum betaald: <b>{{$client->datePaid}}</b></p>                  
                  <p class="card-text">Logo: <b>{{$client->logo}}</b></p>                  
                  <p class="card-text">Unieke link: <b>http://127.0.0.1:8000/contacttracing/{{$client->id}}</b></p>                  
                  
                  <a class="btn btn-primary" download href="/storage/qr/qrcode_{{$client->id}}.svg" title="ImageName">
                    print qr code
                  </a>

                  {{-- <img style="float: right;" src="/storage/qr/qrcode_{{$client->id}}.svg" alt="klik generate"> --}}
                  
                  <a href="/generateQRcode/{{$client->id}}" class="btn btn-primary">Genereer QR code</a>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection