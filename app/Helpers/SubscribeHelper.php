<?php


namespace App\Helpers;


use App\Models\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

trait SubscribeHelper
{
    /**
     * @param $subscribeId
     * @param $paymentGatewayType
     * return name basic or premium plan
     * @return mixed|string
     */
    public function getPlanTypeName($subscribeId, $paymentGatewayType)
    {
        Log::alert("sub id",[ $subscribeId]);
        return Setting::getPlanTypeByPlanId($subscribeId, $paymentGatewayType);
    }

    /**
     * @return double
     */
    public function calculateAmountLeft($priceOldSubscription, $priceNewSubscription, $daysLeft, $billPeriod) 
    {
        Log::alert("day left", [$daysLeft]);
        Log::alert("price sub day", [$priceNewSubscription]);
        if ($billPeriod === 'monthly') {
            $priceNewPerDay = $priceNewSubscription / $daysLeft;
            $priceOldPerDay = $priceOldSubscription / $daysLeft;
        } 
        
        if ($billPeriod === 'yearly') {
            $priceNewPerDay = $priceNewSubscription / $daysLeft;
            $priceOldPerDay = $priceOldSubscription / $daysLeft;
        }
        Log::alert("price day", [$priceNewPerDay]);
        $amountNew = $priceNewPerDay * $daysLeft;
        $amountOld = $priceOldPerDay * $daysLeft;
        $amountNewSumm = $amountNew - $amountOld;
        if ($amountNewSumm < 0) {
            return 0;
        }
        Log::alert('amount new summ', [$amountNewSumm]);
        
        return $amountNewSumm;
    }


    public function getAmountPayUpgrade($priceOldSubscription, $endDate, $priceNewSubscription, $billPeriod)
    {
        $daysLeft = $this->calculateLeftDays($endDate);
        $amountLeft = $this->calculateAmountLeft($priceOldSubscription, $priceNewSubscription,
            $daysLeft,
            $billPeriod
        );
        
        return $amountLeft;
    }
    /**
     * format y-m-d
     * @param \DateTime $currentDate
     * format y-m-d
     * @param $endDate \DateTime
     */
    public function calculateLeftDays( $endDate, $currentDate=null)
    {
        $dayNumber = Carbon::parse($currentDate)->diffInDays($endDate);
        if ($dayNumber < 0) {
            return 0;
        }
        return $dayNumber;
    }


    public function defineSelectedSubscriptionName($selected_plan)
    {
        $plans = config('constants.plans_name');
        
        if (strpos($selected_plan, 'bronze')!== false) {
            $selected_plans[] = $plans[config('constants.plans_id.bronze_monthsub')];
            $selected_plans[] = $plans[config('constants.plans_id.bronze_yearsub')];
        } if (strpos($selected_plan, 'silver')!== false) {
            $selected_plans[] = $plans[config('constants.plans_id.silver_monthsub')];
            $selected_plans[] = $plans[config('constants.plans_id.silver_yearsub')];
        } if (strpos($selected_plan, 'premium')!== false) {
            $selected_plans[] = $plans[config('constants.plans_id.premium_monthsub')];
            $selected_plans[] = $plans[config('constants.plans_id.premium_yearsub')];
        }
        
        return $selected_plans;
    }

    public function defineSelectedSubcriptionType($selectedPlan)
    {
       if (strpos($selectedPlan, 'basic') !== false) {
            return 'basic';  
       }
       
       return 'premium';
    }

    public function searchActiveSubscription()
    {
        
    }

    /**
     * @param         $userSubscription
     * @param Request $request
     *
     */
    protected function linkSubscriptionToUser($userSubscription, $email)
    {
        $user = User::where('email', $email)->first();
        Log::alert('user', [$user]);
        $user->plan_type = $this->getPlanTypeName($userSubscription->plan_id, $userSubscription->subscription_type);
        $user->save();
        $userSubscription->updateSubscription($user->id);
    }
}