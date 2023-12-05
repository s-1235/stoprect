<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\UserSubscription
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $subscription_id
 * @property string $plan_id
 * @property \Illuminate\Support\Carbon $created_on
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $expired_on
 * @property string|null $subscription_type
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription whereCreatedOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription whereExpiredOn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription whereSubscriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription whereSubscriptionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserSubscription whereUserId($value)
 * @method static has(string $string)
 * @method static where()
 * @method updateOrCreate()
 * @mixin \Eloquent
 */
class UserSubscription extends Model
{
    use HasFactory;
    
    const CREATED_AT                = 'created_on';
    const UPDATED_AT                = 'updated_at';
    const COINGATE_SUBSCRIPTION     = 'coingate';
    const PAYPAL_SUBSCRIPTION       = 'paypal';
    
    protected $table = 'user_subscriptions';
    
    protected $fillable = ['plan_id', 'subscription_id'];


    public function saveSubscription($email, $planId, $billPeriod, $userSubscriptionId, $subscriptionType)
    {
        $this->email = $email;
        $this->plan_id = $planId;
        $this->subscription_id = $userSubscriptionId;
        $this->subscription_type = $subscriptionType;
        $this->bill_period = $billPeriod;
        return $this->save();
    } 
    
    public function updateSubscription($userId)
    {
        $this->user_id = $userId;
        return $this->save();
    }

    /**
     * @param $subscriptionId
     *
     * @return false| UserSubscription
     */
    public function getSubscriptionById($subscriptionId)
    {
        if ($subscription = $this->where('subscription_id', $subscriptionId)->first()) {
            return $subscription;
        }
        
        return false; 
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
