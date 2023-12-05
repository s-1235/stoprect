<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Record;
use App\Models\Setting;
use App\Services\BraintreeClient;
use App\Services\CoingateClient;
use App\Traits\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class SettingsController extends Controller
{
    use FileHandler;
    
    public function index()
    {
        $user = Auth::user();
        $settings = Setting::all();
      
        return view('dashboard.settings', [
            'user' => $user,
            'settings' => $settings,
            'coingate_plans' => $settings->sortBy('name')->where('type', 'coingate_plans'),
            'braintree_plans' => $settings->sortBy('name')->where('type', 'braintree_plans')
        ]);
    }

    public function save(Request $request)
    {
       
        if ($request->get('submit') === 'view-settings') {
            $request->validate([
                "display_records" => "required|numeric|max:100",
//                "display_years"=>'required|numeric',
            ]);
            
            $rec = Setting::where('name', 'display_records')
                ->first();
            $rec->value = $request->get('display_records');
            $rec->save();
            
            $rec = Setting::where('name', 'display_years')
                ->first();
            $rec->value = $request->get('display_years');
            $rec->save();
           
        }
        
        if($request->get('submit') === 'gateway-settings') {
            $request->validate(
                [
                    "bronze_yearsub-coingate_plans"     => "required",
                    "silver_yearsub-coingate_plans"     => "required",
                    "premium_yearsub-coingate_plans"   => 'required',
                    "bronze_monthsub-coingate_plans"    => 'required',
                    "silver_monthsub-coingate_plans"    => 'required',
                    "premium_monthsub-coingate_plans"  => 'required',
                    
                    "bronze_yearsub-braintree_plans"    => "required",
                    "silver_yearsub-braintree_plans"    => "required",
                    "premium_yearsub-braintree_plans"   => 'required',
                    "bronze_monthsub-braintree_plans"   => 'required',
                    "silver_monthsub-braintree_plans"   => 'required',
                    "premium_monthsub-braintree_plans"  => 'required',
                ]
            );
            $plans = $request->except(['_token', 'submit']);
            $braintreeClient = new BraintreeClient();
            $coingateClient = new CoingateClient();
           foreach ($plans as $key => $planId) {
               Log::alert("update payments settinga", [$key]);
               $arr = explode('-', $key);
               $nameId = $arr[0];
               $typeId = $arr[1];
               
               $planRecord = Setting::where('name', $nameId)
                   ->where('type', $typeId)->first();
               if ($planRecord) {
                   if (strpos($planRecord->type, 'braintree') !== false) {
                       $price = $braintreeClient->getPriceByPlanId($planId);
                       Log::alert("get price $key", [$price]);
                       if (! $price) {
                           return redirect()->route('settings')->withErrors(['Dont find this plan id, check please is valid plan id for Braintree'])->with('status', '0');
                       }
                   }  
                   
                   if (strpos($planRecord->type, 'coingate') !== false) {
                       $price = $coingateClient->getPriceByPlanId($planId);
                       if (! $price) {
                           return redirect()->route('settings')->withErrors(['Dont find this plan id, check please is valid details id for Coingate'])->with('status', '0');
                       }
                   }
              
                   $planRecord->value = $planId;
                   $planRecord->value_2 = (float)$price;
                   $planRecord->save();
               }
           }
            
        }
        
 
        return redirect()->route('settings')->with('status', '1');

    }
    
}
