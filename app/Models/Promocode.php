<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Record
 *
 * @property int $id
 *@method static where(string $string, $promocodeName)
 */
class Promocode extends Model
{
    use HasFactory;

    public function markUsed()
    {
        $this->amount_left -= 1;
        $this->save();
    }

    public function defineTypePromocode($request)
    {
        if ($request->braintree_promocode_id) {
            return config('constants.braintree');
        }
        return config('constants.coingate');
    }

}
