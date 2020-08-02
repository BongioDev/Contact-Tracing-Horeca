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
        
        \QrCode::size(350)->generate('http://127.0.0.1:8000/contacttracing/'. $client->id. '', '../public/storage/qr/qrcode_' .$client->id. '.svg');
        
        return view('clientDetail')->with('client', $client);
    }

    public function postClientForm(Request $request, $client_id){

        $client = User::where('id', $client_id)->first();

        // validate
        $this->validate($request, [
            'surName' => 'required',
            'lastName' => 'required',
            'cateringName' => 'required',
            'address' => 'required',
            'logo' => 'image|nullable|max:2048',
            'telnr' => 'required',
            'email' => 'required',
            'password' => 'required',
            'paid' => 'required',
            'abbo' => 'required',
            'datePaid' => 'required',
            'abbo' => 'required',
        ]);
        
        return view('clientDetail')->with('client', $client);
    }
}
