<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Record;
use App\Traits\FileHandler;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AssetController extends Controller
{
    use FileHandler;

    public function index()
    {
        $user = Auth::user();

        return view('dashboard.forms.add-coin', [
            "user" => $user,
            "msg" => 1
            ]);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'coin_img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();
        $image = $request->file('coin_img');
        $filename = time().'.'.$image->extension();

        $img = Image::make($image->path());
        $img
            ->resize(64, 64, function ($constraint) {
            $constraint->aspectRatio();
        })
            ->save(  Storage::disk('public')->path($filename));


        $record = new Asset();
        $record->asset_name = $request->get('asset_name');
        $record->asset_code = $request->get('asset_code');
        $record->status = $request->get('status');
        $record->coin_img = Storage::disk('public')->url($filename);
        $status = $record->save();

        return view('dashboard.forms.add-coin', [
            "user" => $user,
            "msg" => $status
        ]);
    }





    public function show()
    {
        $user = Auth::user();
        $assets = Asset::all();

        return view('dashboard.assets', [
            "user" => $user,
            "assets" => $assets
            ]);
    }

    public function delete(Request $request)
    {
        $promocode = Asset::find($request->get('id'));
        $promocode->delete();

        return redirect()->back();
    }

    public function showFormEdit(Request $request) {
//        dd($request->all());
        $record = Asset::find($request->get('id'));

        return view('dashboard.forms.edit-asset',[
            'record' => $record,
            'user' => Auth::user(),
            "assets" => Asset::all()
        ]);
    }

    public function edit(Request $request) {
        try {
            $id = $request->get('id');
            $data = $request->except(
                [
                    '_token', 'submit', 'date'
                ]
            );
            if ($request->file('coin_img')) {
                $imgPath = $this->saveImage($request->file('coin_img'), 'images/', 'public');
                $data['coin_img'] = $imgPath;
            }
            Asset::where('id', "=", $id)->update($data);
        } catch (\Throwable $t) {
            Log::channel('errors')->alert("Something wrong", [$t]);
            return redirect()->back()->with(['error'=>1]);
        }

        return redirect()->back()->with(['success'=>1]);
    }


}
