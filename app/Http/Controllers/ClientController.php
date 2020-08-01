<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientController extends Controller
{
    public function getClientForm($client_id){

        $client = User::where('id', $client_id)->first();

        return view('clientForm')->with('client', $client);
    }

    public function generateQRcode($client_id){

        $client = User::where('id', $client_id)->first();
        
        \QrCode::size(500)->generate('http://127.0.0.1:8000/contacttracing/'. $client->id. '', '../public/storage/qr/qrcode_' .$client->id. '.svg');
        
        return view('clientDetail')->with('client', $client);
    }
}
