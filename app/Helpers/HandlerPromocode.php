<?php


namespace App\Helpers;


use App\Models\Promocode;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class HandlerPromocode
{
    

    public function handle($promocodeModel, $request)
    {
        return $this->getDiscount(
            $promocodeModel,
            $request->promocode_name,
            $request->selected_plan,
        );
    }

    private function isValidDatePromocode($date)
    {
        return $date->greaterThan((Carbon::now()));
    }

    public function getDiscountAmountById($promocodes, $promocodeId)
    {
        foreach ($promocodes as $promocode) {
            if ($promocode->id == $promocodeId) {
                return $promocode->amount;
            }
        }
        
        return false;
    }

    /**
     * @param           $promocodeName
     * @param           $type
     * @param Promocode $promocode
     *
     * @return mixed
     */
    public function getPromocodeByName($promocodeName, $type, Promocode $promocode)
    {
        return $promocode::where('name', $promocodeName)->where('type', $type)->first();
    }

    /**
     * @param $promocodeModel
     * @param $promocodeName
     * 
     * Get discount or return response with error
     * 
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    private function getDiscount($promocodeModel, $promocodeName, $selectedPlan)
    {
        [$planType, $periodType] = $this->getPlanTypeAndPeriod($selectedPlan);
        Log::alert("promocoda date", [$planType, $periodType, $promocodeName]);
        if ($promocodeRecord = $promocodeModel->where('name', $promocodeName)
            ->where('plan_type', $planType)
            ->where('period_type', $periodType)
            ->first()) {
            $date = Carbon::parse($promocodeRecord->date_expired)->setTimezone('UTC');
            if ($this->isValidDatePromocode($date) && $promocodeRecord->amount_left) {
                return $promocodeRecord->discount;
            } 
            
            Log::channel('errors')->alert("is not valid date or amount promocode", [$promocodeRecord]);
            return response("Sorry it's promocode not valid", 403);
        }
        return response("Sorry we cannot find this promocode", 404);
    }

    private function getPlanTypeAndPeriod($selectedPlan)
    {
        $data = explode('_', $selectedPlan);
        return [$data[0], rtrim($data[1], 'sub')];
    }
}