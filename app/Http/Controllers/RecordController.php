<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Record;
use App\Traits\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RecordController extends Controller
{
    use FileHandler;
    
    public function editForm(Request $request)
    {

        $record = (new Record())->getById($request->get('id'));
     
        return view('dashboard.forms.edit-record', [
                "user" => Auth::user(),
                "record" => $record,
                "assets" => Asset::all()
        ]);    
    }
    
    public function edit(Request $request)
    {   
        try {
            $id = $request->get('id');
            $data = $request->except(
                [
                    'id', '_token', 'submit'
                ]
            );


            if ($request->has('coin_img')) {
                $filePath = $this->saveImage($request->file('coin_img'), 'images/', 'public');
                $data['coin_img'] = $filePath;
            }
            if (isset($data['emerging_coin'])) {
                $data['emerging_coin'] = $data['emerging_coin'] ? '1' : '0';
            }
            if (isset($data['coin_of_the_month'])) {
                $data['coin_of_the_month'] = $data['coin_of_the_month'] ? '1' : '0';
            }

            Record::where('id', "=", $id)->update($data);
        } catch (\Throwable $t) {
            Log::channel('errors')->alert("Something wrong");
            return redirect()->back()->with(['error'=>1]);
        }
        
        return redirect()->back()->with(['success'=>1]);
    }
    
    

}
