<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Visitor;

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
            'firstName' => 'required',
            'lastName' => 'required',
            'telnr' => 'required',
            'email' => 'required',
            'tableNr' => 'required',
            'stay' => 'nullable',
        ]);

        $visitor = new Visitor;
        $visitor->user_id = $client_id;
        $visitor->firstName = $request->input('firstName');
        $visitor->lastName = $request->input('lastName');
        $visitor->email = $request->input('email');
        $visitor->phoneNumber = $request->input('telnr');
        $visitor->tableNumber = $request->input('tableNr');
        $visitor->stayPeriod = $request->input('stay');
        $visitor->save();
        
        return back()->with('client', $client)->with('success', 'Formulier verstuurd, geniet van je bezoek!');
    }

    public function clientDashboard(){

        $client = User::where('id', auth()->user()->id)->first();

        return view('clientDashboard')->with('client', $client);
    }

    public function getData(){

        $client = User::where('id', auth()->user()->id)->first();

        return view('getData')->with('client', $client);
    }

    public function postData(Request $request){

        $datum = $request->input('datum');
        $client = User::where('id', auth()->user()->id)->first();
        $visitors = Visitor::where('user_id', auth()->user()->id)
        ->where('created_at', 'LIKE', $datum . '%')->get();

        return view('showdata')->with('client', $client)->with('visitors', $visitors)->with('datum', $datum);
    }

    public function downloadData($datum){

        $client = User::where('id', auth()->user()->id)->first();
        $visitors = Visitor::where('user_id', auth()->user()->id)
        ->where('created_at', 'LIKE', $datum . '%')->get();
        $pdf = \PDF::loadView('layouts.pdf', compact('visitors', 'client', 'datum'));

        return $pdf->download('bezoekers_'.$client->cateringName.'_'.$datum.'.pdf');
    }

    public function help(){

        $client = User::where('id', auth()->user()->id)->first();

      return view('help')->with('client', $client);
    }

}
