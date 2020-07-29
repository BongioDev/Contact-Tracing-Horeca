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
                <a href="#" class="list-group-item list-group-item-action">Alle klanten ophalen</a>
              </div>
        </div>
    </div>
</div>
@endsection