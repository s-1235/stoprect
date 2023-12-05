<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
 
class RegistrationController extends Controller
{

    public function registrationForm()
    {
        return view('enter-form');
    }
    
}
