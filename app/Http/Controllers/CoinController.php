<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Record;
use App\Traits\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CoinController extends Controller
{
    use FileHandler;
    
    public function addCoinRecord()
    {
        $assets = Asset::where('status', 'active')->get();
        $user = Auth::user();
        
        return view('dashboard.forms.add-coin-record', [
            'user' => $user,
            'assets' => $assets
        ]);
    } 
    
    public function addCoinEmerging()
    {
        $assets = Asset::where('status', 'active')->get();
        $user = Auth::user();
        
        return view('dashboard.forms.add-emerging-coin', [
            'user' => $user,
            'assets' => $assets
        ]);
    }
    
    public function addCoinMonth()
    {
        $assets = Asset::where('status', 'active')->get();
        $user = Auth::user();
        
        return view('dashboard.forms.add-month-coin', [
            'user' => $user,
            'assets' => $assets
        ]);
    }

    public function saveCoinRecord(Request $request)
    {
      
        $imgPath = $this->saveImage($request->file('coin_img'), 'images/', 'public');
        
        $record = new Record();
//        $record->price = $request->get('price');
        $record->trade = $request->get('trade');
        $record->buy_price = $request->get('buy_price');
        $record->rec_id = $request->get('rec_id');
        $record->currency_id = $request->get('currency_id');
        $record->take_of_it = $request->get('take_of_it');
        $record->stop_loss = $request->get('stop_loss');
        $record->status = $request->get('status');
        $record->explanatory_text = $request->get('explanatory_text');
        $record->coin_img = $imgPath;
        $record->save(); 
        
        return redirect('my-account');
    }
    
    
    public function saveCoinEmerging(Request $request)
    {
      
        $imgPath = $this->saveImage($request->file('coin_img'), 'images/', 'public');
        
        $record = new Record();
        $record->buy_price = $request->get('buy_price');
        $record->trade = $request->get('trade');
        $record->rec_id = $request->get('rec_id');
        $record->currency_id = $request->get('currency_id');
        $record->status = $request->get('status');
        $record->explanatory_text = $request->get('explanatory_text');
        $record->coin_img = $imgPath;
        $record->emerging_coin = 1;
        $record->dated = $request->get('date');
        $record->save();
        
        return redirect('emerging-coin');
    }
    
    
    public function saveCoinMonth(Request $request)
    {
      
        $imgPath = $this->saveImage($request->file('coin_img'), 'images/', 'public');
        
        $record = new Record();
        $record->buy_price = $request->get('buy_price');
        $record->trade = $request->get('trade');
        $record->rec_id = $request->get('rec_id');
        $record->currency_id = $request->get('currency_id');
        $record->explanatory_text = $request->get('explanatory_text');
        $record->coin_img = $imgPath;
        $record->coin_of_the_month = 1;
        $record->dated = $request->get('date');
        $record->save();
        
        return redirect('month-coin');
    }

    public function showFormEditMonthCoin(Request $request) {
        $record = (new Record())->getById($request->get('id'));

        return view('dashboard.forms.edit-month-coin',[
            'record' => $record,
            'user' => Auth::user(),
            "assets" => Asset::all()
        ]);
    }

    public function editMonthCoin(Request $request) {
        try {
            $id = $request->get('id');
            $data = $request->except(
                [
                    'id', '_token', 'submit', 'date'
                ]
            );
            $data['dated'] = $request->date;

            if ($request->has('coin_img')) {
                $filePath = $this->saveImage($request->file('coin_img'), 'images/', 'public');
                $data['coin_img'] = $filePath;
            }
            if (isset($data['coin_of_the_month'])) {
                $data['coin_of_the_month'] = $data['coin_of_the_month'] ? '1' : '0';
            }
            if (isset($data['emerging_coin'])) {
                $data['emerging_coin'] = $data['emerging_coin']  ? '1' : '0';
            }

            Record::where('id', "=", $id)->update($data);
        } catch (\Throwable $t) {
            Log::channel('errors')->alert("Something wrong", [$t]);
            return redirect()->back()->with(['error'=>1]);
        }

        return redirect()->back()->with(['success'=>1]);
    }
    
    public function showFormEditEmergingCoin(Request $request) {
        $record = (new Record())->getById($request->get('id'));

        return view('dashboard.forms.edit-emerging-coin',[
            'record' => $record,
            'user' => Auth::user(),
            "assets" => Asset::all()
        ]);
    }

    public function editEmergingCoin(Request $request) {
        try {
            $id = $request->get('id');
            $data = $request->except(
                [
                    'id', '_token', 'submit', 'date'
                ]
            );

            $data['dated'] = $request->date;
            if ($request->has('coin_img')) {
                $filePath = $this->saveImage($request->file('coin_img'), 'images/', 'public');
                $data['coin_img'] = $filePath;
            }
            if (isset($data['coin_of_the_month'])) {
                $data['coin_of_the_month'] = $data['coin_of_the_month'] ? '1' : '0';
            }
            if (isset($data['emerging_coin'])) {
                $data['emerging_coin'] = $data['emerging_coin']  ? '1' : '0';
            }

            Record::where('id', "=", $id)->update($data);
        } catch (\Throwable $t) {
            Log::channel('errors')->alert("Something wrong", [$t]);
            return redirect()->back()->with(['error'=>1]);
        }

        return redirect()->back()->with(['success'=>1]);
    }
    
}
