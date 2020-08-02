<style>
    table, td {
  border: 1px solid black;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Bezoekers horecazaak: {{$client->cateringName}} - {{$datum}}</h1>
            <br>
            <br>
            <table>
                <thead>
                  <tr>
                    <th scope="col">Voornaam</th>
                    <th scope="col">Achternaam</th>
                    <th scope="col">Tel nr.</th>
                    <th scope="col">Email adres</th>
                    <th scope="col">Tafel nummer</th>
                    <th scope="col">Datum bezoek</th>
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
                    <td>{{$visitor->created_at}}</td>
                    @if ($visitor->stayPeriod)
                    <td>{{$visitor->stayPeriod}}</td>
                    @else
                    <td><small>Niet van toepassing</small></td>
                    @endif
                  </tr>
                @endforeach
                </tbody>
              </table>
              <br>
              <br>
              <p>Naam horeca zaak: <b>{{$client->cateringName}}</b></p>
              <p>Adres: <b>{{$client->address}}</b></p>
              <p>Tel. Nr.: <b>{{$client->phoneNumber}}</b></p>
              <p>E-mail: <b>{{$client->email}}</b></p>
              <p>Contact persoon: <b>{{$client->lastName}} {{$client->firstName}}</b></p>
        </div>
    </div>
</div>