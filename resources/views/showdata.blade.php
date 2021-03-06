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
          @if (count($visitors) > 0)
          <table style="margin-top: 50px;" class="table table-sm table-responsive-lg table-dark">
            <thead>
              <tr>
                <th scope="col">Voornaam</th>
                <th scope="col">Achternaam</th>
                <th scope="col">Tel nr.</th>
                <th scope="col">Email adres</th>
                <th scope="col">Tafel nummer</th>
                <th scope="col">Verblijf periode (aantal dagen)</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($visitors as $visitor)
            <tr>
                <td>{{$visitor->firstName}}</td>
                <td>{{$visitor->lastName}}</td>
                <td>{{$visitor->phoneNumber}}</td>
                <td>{{$visitor->email}}</td>
                <td>{{$visitor->tableNumber}}</td>
                @if ($visitor->stayPeriod)
                <td>{{$visitor->stayPeriod}}</td>
                @else
                <td><small>Niet van toepassing</small></td>
                @endif
              </tr>
            @endforeach
            </tbody>
          </table>

          <form action="/contacttracing/client/dashboard/getdata/download/{{$datum}}">
            @csrf
          <div style="text-align: center;">
            <button type="submit" class="btn btn-primary">Download</button>
          </form>
          @else
              <p style="margin-top: 50px;">Geen klanten gevonden op deze dag.</p>
          @endif
          <a href="{{ url()->previous() }}" class="btn btn-primary">Terug</a>
          </div>
        </div>
    </div>
</div>

  @endsection