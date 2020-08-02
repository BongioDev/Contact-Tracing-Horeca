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
                <a href="/contacttracing/client/dashboard" class="list-group-item list-group-item-action">QR code</a>
                <a href="/contacttracing/client/dashboard" class="list-group-item list-group-item-action">Logo uploaden</a>
                <a href="/contacttracing/client/dashboard" class="list-group-item list-group-item-action">Help</a>
              </div>
        </div>
        <div class="col-md-9">
            <h4 style="margin-top: 50px;">Klanten ophalen</h4>
            <br>
            <form action="/contacttracing/client/dashboard/getdata" method="POST">
                @csrf
                Kies datum:
                <input type="date" name="datum">
                <br>
                <br>
                <input type="submit" value="Haal op" class="btn btn-outline-primary">
            </form>
        </div>
    </div>
</div>

</body>
@endsection