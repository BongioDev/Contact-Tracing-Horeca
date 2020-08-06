<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Visitor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Orbitale\Component\ImageMagick\Command;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\RegisterMail;

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


    public function getQR(){
        
        $command = new Command();
        $client = User::where('id', auth()->user()->id)->first();

        $response = $command
            // The command will search for the "logo.png" file. If it does not exist, it will throw an exception.
            // If it does, it will create a new command with this source image.
            ->convert('/storage/qr/qrcode_'.$client->id.'.svg')

            // The "output()" method will append "logo.gif" at the end of the command-line instruction as a filename.
            // This way, we can continue writing our command without appending "logo.gif" ourselves.
            ->output('/storage/qr/qrcode_'.$client->id.'.png')

            // At this time, the command shall look like this :
            // $ "{ImageMagickPath}convert" "logo.png" "logo.gif"

            // Then we run the command by using "exec()" to get the CommandResponse
            ->run();

        // Check if the command failed and get the error if needed
        if ($response->hasFailed()) {
            throw new Exception('An error occurred:'.$response->getError());
        } else {
            // If it has not failed, then we simply send it to the buffer
            header('Content-type: image/png');
            echo file_get_contents('/storage/qr/qrcode_'.$client->id.'.png');
        }



        // $qr = File::get('/storage/qr/qrcode_'.$id.'.svg');

        $pdf = \PDF::loadView('layouts.qr', compact('client'));

        return $pdf->download('QRcode_'.$client->cateringName.'.pdf');
    }


    public function uploadLogo(Request $request){
        // validate
        $this->validate($request, [
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);       

        // logo handling
        if($request->hasFile('logo')){
            $fileWithExtension = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $logoToStore = $fileName.'_'.time().'_'.$extension;
            $uploadLogo = $request->file('logo')->storeAs('public/logos', $logoToStore);
        }
        
        $client = User::where('id', auth()->user()->id)->first();
        $client->logo = $logoToStore;
        $client->save();

       return redirect('/contacttracing/client/dashboard/logo')->with('success','Logo succesvol geupload!');
    }


    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Uw huidige wachtwoord komt niet overeen met het wachtwoord dat u heeft opgegeven. Probeer het alstublieft opnieuw.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Nieuw wachtwoord kan niet hetzelfde zijn als uw huidige wachtwoord. Kies een ander wachtwoord.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Uw wachtwoord is succesvol veranderd!");

    }

    // register and contact

    public function contactMail(Request $request)
    {
       $name = $request->input('name');
       $email = $request->input('email');
       $message=  $request->input('message');

       Mail::to('aleko.bongiovanni@hotmail.com')->send(new ContactMail($name, $email, $message));

       return redirect('/')->with('success', 'Uw bericht is verstuurd!');
    }

    public function register(Request $request)
    {
       $name = $request->input('name');
       $firstName = $request->input('firstName');
       $cateringName = $request->input('cateringName');
       $adres = $request->input('streetAndNr');
       $city = $request->input('city');
       $email = $request->input('email');
       $tel = $request->input('tel');

       Mail::to('aleko.bongiovanni@hotmail.com')->send(new RegisterMail($name, $email, $firstName, $cateringName, $adres, $city, $tel));

       return redirect('/')->with('success', 'Uw aanvraag is goed bij ons binnen gekomen! U kan binnen 24u een mail verwachten met uw inlog gegevens.');
    }
}
