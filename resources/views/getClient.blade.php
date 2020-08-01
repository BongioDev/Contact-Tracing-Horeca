@extends('layouts.app')

@section('content')
@php
    use Carbon\Carbon;
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 style="margin-bottom: 70px" class="text-center">Dashboard Admin</h1>
        </div>
    </div>
    <div class="row">
        {{-- menu --}}
        <div class="col-md-3">
            <div class="list-group">
                <a href="/cthorecaadmin" class="list-group-item list-group-item-action">Home</a>
                <a href="/addClient" class="list-group-item list-group-item-action">Nieuwe klant aanmaken</a>
                <a href="/getClient" class="list-group-item list-group-item-action">Alle klanten ophalen</a>
            </div>
        </div>
        {{-- klanten ophalen table --}}
        <div class="col-md-9">
            <h4>Klanten ophalen</h4>

            {{-- zoeken op naam --}}
            <form action="/getClient" method="POST">
                @csrf
                <div class="form-group">
                    <input style="width: 30%;" name="naam" type="text" class="form-control" placeholder="Zoek op naam zaak of achternaam">
                </div>
            {{-- zoeken op datum aankoop --}}
                <div class="form-group">
                    Sorteer op datum
                    <select name="date">
                      <option> - </option>
                      <option value="old">Datum betaald oud</option>
                      <option value="new">Datum betaald nieuw</option>
                    </select>                
                </div>
                <button type="submit" class="btn btn-primary">Zoek</button>
            </form>
         
            <br>
            
            <table class="table table-hover table-dark">
                <thead>
                  <tr>
                    <th scope="col">Naam zaak</th>
                    <th scope="col">Achternaam</th>
                    <th scope="col">Type abbo</th>
                    <th scope="col">Datum betaald</th>
                    <th scope="col">Knoppen</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                    @if ($client->admin == 0)  
                    <tr>
                        <td>{{$client->cateringName}}</td>
                        <td>{{$client->lastName}}</td>
                        <td>{{$client->subscriptionType}}</td>
                        <td>
                            @if ($client->subscriptionType == 1 && date('Y-m-d H:i:s', strtotime("+1 months", strtotime($client->datePaid))) <= Carbon::now())
                            <span style="background-color:#d4504c;">{{$client->datePaid}}</span>
                            @elseif ($client->subscriptionType == 2 && date('Y-m-d H:i:s', strtotime("+3 months", strtotime($client->datePaid))) <= Carbon::now())
                            <span style="background-color:#d4504c;">{{$client->datePaid}}</span>
                            @elseif ($client->subscriptionType == 3 && date('Y-m-d H:i:s', strtotime("+6 months", strtotime($client->datePaid))) <= Carbon::now())
                            <span style="background-color:#d4504c;">{{$client->datePaid}}</span>
                            @else
                            {{-- resterende dagen --}}
                                @if ($client->subscriptionType == 1)
                                    {{$client->datePaid}} - resterende dagen: 
                                    @php 
                                        $aangekocht = strtotime($client->datePaid);
                                        $geldig = strtotime(date('Y-m-d H:i:s', strtotime("+1 months", strtotime($client->datePaid))));
                                        $vandaag = strtotime(Carbon::now());
                                        $days_between = ceil(abs(($geldig - $aangekocht) - ($vandaag - $aangekocht)) / 86400);
                                        if($days_between <= 7){
                                            echo '<span style="background-color: #d4504c;">'.$days_between.'</span>';
                                        } else {
                                            echo $days_between;
                                        };
                                    @endphp
                                    
                                @elseif ($client->subscriptionType == 2)
                                    {{$client->datePaid}} - resterende dagen: 
                                    @php 
                                        $aangekocht = strtotime($client->datePaid);
                                        $geldig = strtotime(date('Y-m-d H:i:s', strtotime("+3 months", strtotime($client->datePaid))));
                                        $vandaag = strtotime(Carbon::now());
                                        $days_between = ceil(abs(($geldig - $aangekocht) - ($vandaag - $aangekocht)) / 86400);
                                        if($days_between <= 7){
                                            echo '<span style="background-color: #d4504c;">'.$days_between.'</span>';
                                        } else {
                                            echo $days_between;
                                        };
                                    @endphp
                                    
                                @elseif ($client->subscriptionType == 3)
                                    {{$client->datePaid}} - resterende dagen: 
                                    @php 
                                        $aangekocht = strtotime($client->datePaid);
                                        $geldig = strtotime(date('Y-m-d H:i:s', strtotime("+6 months", strtotime($client->datePaid))));
                                        $vandaag = strtotime(Carbon::now());
                                        $days_between = ceil(abs(($geldig - $aangekocht) - ($vandaag - $aangekocht)) / 86400);
                                        if($days_between <= 7){
                                            echo '<span style="background-color: #d4504c;">'.$days_between.'</span>';
                                        } else {
                                            echo $days_between;
                                        };
                                    @endphp
                                    
                                @endif
                            

                            @endif
                        </td>
                        <td>
                            <a href="/clientDetail/{{$client->id}}" type="button" class="btn btn-success btn-sm">Details</a>
                        </td>
                      </tr>
                      @endif
                    @endforeach
                </tbody>
              </table>
              
        </div>
    </div>
</div>
@endsection