<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request){
        return view('front.register');
    }
    public function postRegister(Request $request){
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:clients',
            'phone'=> 'required|unique:clients',
            'password'=> 'required|confirmed',

        ]);
        $password = $request->password;
        $request->merge(['password'=>bcrypt($password)]);
        $client = Client::create($request->all());
        $client->save();
        return view('front.home');
    }
    public function login(Request $request){
        return view('front.login');
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:clients,email',
            'password' => 'required'
        ]);
        $email = $request->email;
        $client = Client::Where('email', $email)->first();
        if ($client) {
            if (Hash::check($request->password, $client->password)) {
                auth('client-web')->login($client);
                return redirect()->route('home');
            } else {
                return back()->withErrors('wrong password');
            }
        }
    }
    public function logOut(Request $request)
    {
        $request->session()->invalidate();
        return redirect('/client/login');
    }
}
