<?php

namespace App;

use App\Models\UserSubscription;
use Illuminate\Notifications\Notifiable;

/**
 * @method static where(string $string, $email)
 * @property mixed plan_type
 * @property mixed user_type
 */
class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    public const COINGATE  = 'coingate';
    public const BRAINTREE = 'braintree';
    public const PERIOD_MONTHLY = 'monthly';
    public const PERIOD_YEARLY = 'yearly';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var mixed
     */
    private $premiumPlan    = 'premium';
    private $basicPlan      = 'basic';
    private $adminStatus    = 'ADM';
    
//  relations
    public function subscription(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(UserSubscription::class, 'user_id', 'id');
    }

    public function isPremiumPlan(): bool
    {
        return $this->plan_type === $this->premiumPlan;
    }
    
    public function isAdmin(): bool
    {
        return $this->user_type === $this->adminStatus;
    }
    
    public function isBasicPlan(): bool
    {
        return $this->plan_type === $this->basicPlan;
    }

    public function isCoingateSubMonth(): bool
    {
        return $this->subscription->subscription_type === self::COINGATE 
            && $this->subscription->bill_period === self::PERIOD_MONTHLY;
    } 
    
    public function isCoingateSubYear(): bool
    {
        return $this->subscription->subscription_type === self::COINGATE 
            && $this->subscription->bill_period === self::PERIOD_YEARLY;
    }
    
    public function isBraintreeSubMonth(): bool
    {
        return $this->subscription->subscription_type === self::BRAINTREE
            && $this->subscription->bill_period === self::PERIOD_MONTHLY;
    }


    public function isBraintreeSubYear(): bool
    {
        return $this->subscription->subscription_type === self::BRAINTREE
            && $this->subscription->bill_period === self::PERIOD_YEARLY;
    }


    /**
     * @param $status 'active' | 'deactive'
     */
    public function setStatusUserSubscription($status)
    {
        $this->status = $status;
        $this->save();
    }
}
