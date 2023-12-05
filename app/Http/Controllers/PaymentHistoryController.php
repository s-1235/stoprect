<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Record;
use App\Models\Setting;
use App\Models\UserSubscription;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        $subscription = UserSubscription::where('user_id', Auth::user()->id)->with('user')->first();
        
        return view('dashboard.payment-history', [
            'user' => Auth::user(),
            'subscription' => $subscription
        ]);
    }
}
