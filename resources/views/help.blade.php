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
            <h4 style="margin-top: 50px;">Hulp nodig?</h4>
        <p>Contacteer ons op het nummer <a href="tel:+32488303222">+32488303222</a> of stuur een mailtje naar <a href="mailto:hello@hello.com?subject=Hulp contact tracing app." target="_blank">buh@contact.be</a> en we helpen u zo snel mogelijk verder!</p>
        </div>
    </div>
</div>

</body>
@endsection