<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        
        return view('adminDashboard');
    }

    public function addClientView() {
        
        return view('addClient');
    }

    public function addClientPost(Request $request) {
        
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

        // logo handling
        if($request->hasFile('logo')){
            $fileWithExtension = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($fileWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $logoToStore = $fileName.'_'.time().'_'.$extension;
            $uploadLogo = $request->file('logo')->storeAs('public/logos', $logoToStore);
        } else {
            $logoToStore = 'noimage.jpg';
        }

        $user = new User;
        $user->admin = '0';
        $user->firstName = $request->input('surName');
        $user->lastName = $request->input('lastName');
        $user->cateringName = $request->input('cateringName');
        $user->address = $request->input('address');
        $user->phoneNumber = $request->input('telnr');
        $user->email  = $request->input('email');
        $user->password  = Hash::make($request->input('password'));
        $user->paid  = $request->input('paid');
        $user->subscriptionType  = $request->input('abbo');
        $user->datePaid  = $request->input('datePaid');
        $user->logo  = $logoToStore;
        $user->save();

        return redirect('/addClient')->with('success', 'Klant aangemaakt!');
    }

    public function getClientView() {
        
        $clients = User::all();
        
        return view('getClient')->with('clients', $clients);
    }

    public function getClientQuery(Request $request) {
        
        $clientOrCateringName = $request->input('naam');
        $date = $request->input('date');
        
        $clients = DB::table('users')
        ->where('cateringName', 'LIKE', "%{$clientOrCateringName}%")
        ->orWhere('lastName', 'LIKE', "%{$clientOrCateringName}%")->get();
        
        if($request->input('date')){
            if($request->input('date') == 'old'){
                $clients = DB::table('users')->orderBy('datePaid', 'ASC')->get();
            } else if($request->input('date') == 'new'){
                $clients = DB::table('users')->orderBy('datePaid', 'DESC')->get();
            }
        }
        
        return view('getClient')->with('clients', $clients);
    }

    public function getClientDetail($client_id) {
        
        $client = User::where('id', $client_id)->first();
        
        return view('clientDetail')->with('client', $client);
    }

}
