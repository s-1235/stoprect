<?php

namespace App\Http\Controllers;

use App\Helpers\HandlerPromocode;
use App\Helpers\MessageHelper;
use App\Models\Promocode;
use App\Services\BraintreeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PromocodeController extends Controller
{
    use MessageHelper;
    
    
    public function index()
    {
        $promocodes = Promocode::orderBy('created_at', 'DESC')->get();
        $user = Auth::user();
        // add userPlanName to user
        return view('dashboard.promocodes',[
            'user' => $user,
            'promocodes' => $promocodes,
        ]);
    }

    public function handlePromocode(Request $request, HandlerPromocode $handlerPromocode)
    {
        return $handlerPromocode->handle(new Promocode(), $request);
    }

 

    public function add()
    {
        $clientBraintree = new BraintreeClient();
        $promocodes = $clientBraintree->client->discount()->all();
        
        return view('dashboard.forms.add-promocode',
        ['braintree_promocode' => $promocodes]
        );
    }

    public function save(Request $request)
    {
        $user = Auth::user();
        $clientBraintree = new BraintreeClient();
        $discounts = $clientBraintree->client->discount()->all();
        $record = new Promocode();
        $record->name = $request->promocode_name;
        $record->discount = (new HandlerPromocode( ))->getDiscountAmountById($discounts, $request->braintree_promocode_id);
        $record->discount_id = $request->braintree_promocode_id;
        $record->amount = $request->promocode_amount;
        $record->amount_left = $request->promocode_amount;
        $record->period_type = $request->period_type;
        $record->plan_type = $request->plan_type;
        $record->date_expired = $request->promocode_date;
        $record->type = $record->defineTypePromocode($request) ;
        $status = $record->save();

        return view('dashboard.forms.add-promocode', [
            "user" => $user,
            "msg" => $status,
            'braintree_promocode' => $discounts
        ]);
    }


    public function delete(Request $request)
    {
        $promocode = Promocode::find($request->get('id'));
        $promocode->delete();

        return redirect()->back();
    }

}
