<?php

namespace App\Http\Controllers;

use App\Models\Analytic;
use App\Models\Asset;
use App\Models\Record;
use App\Models\Setting;
use App\Traits\FileHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AnalyticController extends Controller
{
    use FileHandler;

    private $displayYears;

    public function index()
    {
        $this->displayYears = (new Setting())->getValueByName('display_years');
        $user = Auth::user();
        $analytics = Analytic::select('*',
            DB::raw("DATE_FORMAT(created_at,'%M') as month")
        )
            ->whereRaw("year(created_at) >= ?", [$this->displayYears])
            ->latest('id')->get();

        return view('dashboard.analytics', [
            "user"      => $user,
            "analytics" => $analytics->groupBy('month')
        ]);
    }




    public function getLastSectionUri($link)
    {
        $link = rtrim($link, '"');
        $linkArr = explode('/', $link);

        if (is_array($linkArr)) {
            return last($linkArr);
        }
        return '';
    }

    public function addAnalytics()
    {
        $assets = Asset::where('status', 'active')->get();
        $user = Auth::user();

        return view('dashboard.forms.add-analytics', [
            'user' => $user,
            'assets' => $assets
        ]);
    }

    public function saveAnalytics(Request $request)
    {

        $filePath = '';
        $mediaType = '';
        if ($request->get('youtube_link')) {
            $link = $request->get('youtube_link');
            if (strpos($link, 'watch') !== false) {
                $linkArr = explode('=', $link);
                $filePath = $linkArr[1];
            } else {
                $filePath = $this->getLastSectionUri($link);
            }
            $mediaType = 'youtube';
        }
        if ($request->has('data')) {
            $filePath = $this->saveImage($request->file('data'), 'analytics/', 'public');
            $mediaType = 'image';
        }
        $record = new Analytic();
        $record->title = $request->get('title');
        $record->text = $request->get('notes');
        $record->author = $request->get('author');
        $record->media_path = $filePath;
        $record->media_type = $mediaType;
        $record->share_link = Str::random(40);
        $record->save();

        return redirect('analytics');
    }


    public function getArticle(Request $request)
    {


        $article = Analytic::find($request->id);
        $user = Auth::user();

        return view('dashboard.analytics-article',[
           'user' => $user,
           'article' => $article
        ]);
    }


    public function getShareArticle(Request $request)
    {
        $article = Analytic::where( 'share_link',$request->id)->firstOrFail();
        $user = Auth::user();

        return view('dashboard.share-analytics-article',[
           'user' => $user,
           'article' => $article
        ]);
    }

    public function delete(Request $request)
    {
        $analytic = Analytic::find($request->get('id'));
        $analytic->delete();

        return 'ok';
    }

}
