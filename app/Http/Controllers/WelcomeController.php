<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\BraintreeClient;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
  
    
    public function index()
    {
        $prices = Setting::where('type','braintree_plans')->get();
        
        return view('welcome', [
            "prices" => $prices,
            "user" => Auth::user(),
            ]);    
    }

    public function old(){
        $prices = Setting::where('type','braintree_plans')->get();
        return  view('welcome-old',[
            "prices" => $prices,
            "user" => Auth::user(),
            ]);
    }

    public function about(){
        return view('about' );
    }


    public function privacyPolicy()
    {
        return view('privacy-policy', [
            "user" => Auth::user(),
        ]);
    }
}
