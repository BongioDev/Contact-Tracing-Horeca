<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

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
            'price' => 'required',
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
            $fileToStore = $fileName.'_'.time().'_'.$extension;
            $uploadLogo = $request->file('logo')->storeAs('public/logos', $fileToStore);
        } else {
            $logoToStore = 'noimage.jpg';
        }

        $user = new User;
        $user->admin = '0';
        $user->firstName = $request->input('surName');
        $user->lastName = $request->input('surName');
        $user->cateringName = $request->input('lastName');
        $user->address = $request->input('address');
        $user->phoneNumber = $request->input('telnr');
        $user->email  = $request->input('email');
        $user->password  = Hash::make($request->input('password'));
        $user->paid  = $request->input('paid');
        $user->subscriptionType  = $request->input('abbo');
        $user->datePaid  = $request->input('datePaid');
        $user->logo  = $fileToStore;
        $user->save();

        return redirect('/addClient');
    }
}
