@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 style="margin-bottom: 70px" class="text-center">Dashboard Admin</h1>
        </div>
    </div>
    <div class="row">
        {{-- menu --}}
        <div class="col-md-3">
            <div style="margin-bottom:35px" class="list-group">
                <a href="/cthorecaadmin" class="list-group-item list-group-item-action">Home</a>
                <a href="/addClient" class="list-group-item list-group-item-action">Nieuwe klant aanmaken</a>
                <a href="#" class="list-group-item list-group-item-action">Alle klanten ophalen</a>
            </div>
        </div>
        {{-- form --}}
        <div class="col-md-9">
            <h4>Voer hier nieuwe klanten gegevens in:</h4>
            <form action="/addClient" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label>Voornaam</label>
                  <input required name="surName" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Achternaam</label>
                  <input required name="lastName" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Naam zaak</label>
                  <input required name="cateringName" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label>Adres</label>
                  <input required name="address" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label >Telefoon nr.</label>
                  <input required name="telnr" type="number" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input required name="email" type="email" class="form-control">
                </div>
                <div class="form-group">
                  <label >Wachtwoord</label>
                  <input required name="password" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="paid">Betaald?</label>
                    <select name="paid">
                      <option value="1">Ja</option>
                      <option value="0">Neen</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="paid">Type abbonoment</label>
                    <select name="abbo">
                      <option value="1">1 maand</option>
                      <option value="2">3 maanden</option>
                      <option value="3">6 maanden</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="paid">Datum betaald</label>
                    <input type="date" name="datePaid">
                </div>
                <div class="form-group">
                    <label>Logo</label>
                    <input type="file" name="logo">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
</div>
@endsection