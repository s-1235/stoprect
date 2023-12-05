<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $name
 * @property string|null $value
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 * @mixin \Eloquent
 */

class Setting extends Model
{
    use HasFactory;
    
    protected   $table = 'settings_service';
    public      $timestamps=false;

    public function getValueByName($name)
    {
        if($name === 'display_years') {
            return Carbon::now()->subDays(config('constants.display_days'))->format('Y');
        }
        
        return self::where('name', $name)->first()->value;
    }
    
    public function getValueTwoByName($name)
    {
        Log::alert("name plan". $name);
        return self::where('name', $name)->first()->value_2;
    }
    
    public static function getBraintreePlanIdByPlanType($planName)
    {
        return self::where('name', $planName)
            ->where('type', 'braintree_plans')->first()->value;
    }
    
    public static function getCoingatePlanIdByPlanType($planName)
    {
        return self::where('name', $planName)
            ->where('type', 'coingate_plans')->first()->value;
    }

    /**
     * Get premium or basic type of subscription
     * Adding sufix to name of gateway
     * @param $planId
     * @param $gatewayName
     *
     * @return string
     */
    public static function getPlanTypeByPlanId($planId, $gatewayName)
    {
        $planType = '';
        try {
            $name = self::where('value', $planId)
                ->where('type', $gatewayName.'_plans')->first()->name;

            $planType = 'basic';
            if (strpos($name, 'premium') !== false) {
                $planType = 'premium';
            }
        } catch (\Throwable $t) {
            Log::channel('errors')->alert('dont find plan type- '.$planId, [$t]);
        }
        return $planType;
    }
    
}
