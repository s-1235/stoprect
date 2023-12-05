<?php

namespace App\Http\Controllers;

use App\Models\Analytic;
use App\Models\Asset;
use App\Models\Record;
use App\Models\Setting;
use App\Traits\FileHandler;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    use FileHandler;
    
    public $settingsService;
    /**
     * @var \App\User
     */
    private $user;
    private $displayYears;
    private $displayRecords;

    public function __construct()
    {
        $this->settingsService = new Setting();
        $this->displayYears = $this->settingsService->getValueByName('display_years');
        $this->displayRecords = $this->settingsService->getValueByName('display_records');

    }

    public function index()
    {
        $this->user = Auth::user();
        $data = $this->getDataAssets();
        
        if (! $data) {
            Auth::logout();
            return redirect('/');
        }
        
        return view('dashboard.account-panel', [
            "user" => $this->user,
            "data" => $data->groupBy('month'),
        ]);    
    }

    public function emergingCoin()
    {
        
        $this->user = Auth::user();
        $records = Record::select('*',
            DB::raw("DATE_FORMAT(dated,'%M') as month"),
            DB::raw("DATE_FORMAT(dated,'%M %d') as datestr")
        )
            ->where('emerging_coin',1)
            ->whereRaw("year(dated) >= ?", [$this->displayYears])
            ->orderBy('dated', 'desc')
            ->limit($this->displayRecords)
            ->has('asset')->get();
        if (!$this->user) {
            return redirect()->to('home');
        }
        return view('dashboard.emerging-coin', [
            "user"          => $this->user,
            "coinsEmerging"    => $records->groupBy('month'),
        ]);
    }  
    
    public function monthCoin()
    {
        $this->user = Auth::user();
        $records = Record::select('*',
            DB::raw("DATE_FORMAT(dated,'%M') as month"),
            DB::raw("DATE_FORMAT(dated,'%M %d') as datestr")
        )
            ->where('coin_of_the_month',1)
            ->whereRaw("year(dated) >= ?", [$this->displayYears])
            ->orderBy('dated', 'desc')
            ->limit($this->displayRecords)
            ->has('asset')->get();
    
        return view('dashboard.month-coin', [
            "user"          => $this->user,
            "coinsMonth"    => $records->groupBy('month'),
        ]);
        
    }

    /**
     * @return mixed
     */
    protected function getDataAssets()
    {
        $data = '';
        
        if (isset($this->user) && $this->user->isBasicPlan()) {
            $data = DB::table('records')->leftJoin(
                'assets', function ($join) {
                $join->on('records.currency_id', '=', 'assets.id');
            }
            )->select(DB::raw("records.*, assets.asset_name,assets.asset_code, assets.status, assets.coin_img, month(records.dated) as month, records.status as coin_status"))
                ->where('coin_of_the_month', 0)
                ->where('emerging_coin', 0)
                ->whereRaw("year(records.dated) >= ?", [$this->displayYears])
                ->orderBy('month')
                ->limit($this->displayRecords)
                ->get();
        }

        if (isset($this->user) && ($this->user->isPremiumPlan() || $this->user->isAdmin())) {
            $data = DB::table('records')->leftJoin(
                'assets', function ($join) {
                $join->on('records.currency_id', '=', 'assets.id');
            }
            )->select(DB::raw("records.*, assets.asset_name,assets.asset_code, assets.status, assets.coin_img, month(records.dated) as month, records.status as coin_status"))
                ->where('coin_of_the_month', 0)
                ->where('emerging_coin', 0)
                ->whereRaw("year(records.dated) >= ?", [$this->displayYears])
                ->orderBy('month')
                ->limit($this->displayRecords)
                ->get();
        }
        
        return $data;
    }

    public function delete(Request $request)
    {
        $promocode = Record::find($request->get('id'));
        $promocode->delete();

        return redirect()->back();
    }
}
