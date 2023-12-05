<?php

use App\Models\Asset;
use App\Models\UserSubscription;
use App\Services\Coingate\SubscriptionDetailsData;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('home');
Route::get('/#prices', 'WelcomeController@index')->name('home-prices');
Route::get('privacy-policy', 'WelcomeController@privacyPolicy');
Route::get('/home', 'WelcomeController@index')->name('home');
Route::get('/about', 'WelcomeController@about')->name('about');
Route::get('/old', 'WelcomeController@old')->name('old');
Route::middleware(['throttle:global'])->group(function () {
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
    Route::post('registration', [\App\Http\Controllers\Auth\RegistrationController::class, 'registration'])->name('registration');
    Route::post('forgot-password', [\App\Http\Controllers\Auth\RegistrationController::class, 'forgotPassword'])->name('forgot-password');
});

Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->name('login-form');
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::get('registration', [\App\Http\Controllers\Auth\RegistrationController::class,'registrationForm'])->name('registration-form');


//tabs
Route::middleware(['check-subscription'])->group(function () {
// first tab
    Route::get('my-account', [\App\Http\Controllers\AccountController::class, 'index'])->name('my-account');
    Route::get('edit-record', [\App\Http\Controllers\RecordController::class, 'editForm'])->name('edit-record');
    Route::get('delete-record', [\App\Http\Controllers\AccountController::class, 'delete'])->name('delete-record');
    Route::post('edit-record-save', [\App\Http\Controllers\RecordController::class, 'edit'])->name('edit-record-save');
// emerging coin tab
    Route::get('emerging-coin', [\App\Http\Controllers\AccountController::class, 'emergingCoin'])->name('emerging-coin');
    Route::get('form-edit-emerging-coin', [\App\Http\Controllers\CoinController::class, 'showFormEditEmergingCoin'])->name('form-edit-emerging-coin');
    Route::post('edit-emerging-coin', [\App\Http\Controllers\CoinController::class, 'editEmergingCoin'])->name('edit-emerging-coin');
    Route::get('form-edit-month-coin', [\App\Http\Controllers\CoinController::class, 'showFormEditMonthCoin'])->name('form-edit-month-coin');
    Route::post('edit-month-coin', [\App\Http\Controllers\CoinController::class, 'editMonthCoin'])->name('edit-month-coin');
//month of coin tab
    Route::get('month-coin', [\App\Http\Controllers\AccountController::class, 'monthCoin'])->name('month-coin');
    Route::get('show-coins', [\App\Http\Controllers\AssetController::class, 'show'])->name('show-coins');
//analytics tab
    Route::get('analytics', [\App\Http\Controllers\AnalyticController::class, 'index'])->name('analytics');
    Route::get('analytic-article', [\App\Http\Controllers\AnalyticController::class, 'getArticle'])->name('analytic-article');
    Route::post('analytics', [\App\Http\Controllers\AnalyticController::class, 'save'])->name('save-analytic');
});
// share link
    Route::get('share-analytic-article', [\App\Http\Controllers\AnalyticController::class, 'getShareArticle'])->name('share-analytic-article');


// dashboard links
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
    Route::get('promocodes', [\App\Http\Controllers\PromocodeController::class, 'index'])->name('promocodes');
    Route::get('delete-promocode', [\App\Http\Controllers\PromocodeController::class, 'delete'])->name('delete-promocode');
    Route::get('delete-asset', [\App\Http\Controllers\AssetController::class, 'delete'])->name('delete-asset');
    Route::post('edit-asset', [\App\Http\Controllers\AssetController::class, 'edit'])->name('edit-asset');
    Route::get('form-edit-asset', [\App\Http\Controllers\AssetController::class, 'showFormEdit'])->name('show-form-edit');
    Route::get('add-promocode', [\App\Http\Controllers\PromocodeController::class, 'add'])->name('add-promocode');
    Route::post('add-promocode', [\App\Http\Controllers\PromocodeController::class, 'save'])->name('save-promocode');
    Route::post('send-promocode', [\App\Http\Controllers\PromocodeController::class, 'handlePromocode'])->name('send-promocode');
    Route::post('settings', [\App\Http\Controllers\SettingsController::class, 'save'])->name('settings-save');
    Route::get('delete-user', [\App\Http\Controllers\UserController::class, 'delete'])->name('delete-user');
    Route::get('edit-user', [\App\Http\Controllers\UserController::class, 'editForm'])->name('edit-user-form');
    Route::post('edit-user-save', [\App\Http\Controllers\UserController::class, 'edit'])->name('edit-user-save');
    Route::get('subscriptions', [\App\Http\Controllers\SubscriptionController::class, 'index'])->name('subscriptions');
    Route::get('expired-subscription', [\App\Http\Controllers\SubscriptionController::class, 'expiredSubscription'])->name('expired-subscription');
    Route::get('forgot-password', [\App\Http\Controllers\UserController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('send-forgot-password-link', [\App\Http\Controllers\UserController::class, 'sendForgotPasswordLink'])->name('send-forgot-password-link');
    Route::get('setup-new-password-form', [\App\Http\Controllers\UserController::class,'setupPasswordForm'])->name('setup-password-form')->middleware('restore-password');
    Route::post('setup-new-password', [\App\Http\Controllers\UserController::class,'setupNewPassword'])->name('setup-new-password');


    Route::post('pay-subscription', [\App\Http\Controllers\SubscriptionController::class, 'paySubscription'])->name('pay-subscription');
    Route::post('pay-expired-subscription', [\App\Http\Controllers\SubscriptionController::class, 'payExpiredSubscribe'])->name('pay-expired-subscription');
    Route::post('register-subsbcriber', [\App\Http\Controllers\SubscriptionController::class, 'registerSubscriber'])->name('register-subsbcriber');
    Route::get( 'register-subsbcriber', [\App\Http\Controllers\SubscriptionController::class, 'registerSubscriber'])->name('register-subsbcriber');
    Route::post('coingate-pay-upgrade', [\App\Http\Controllers\SubscriptionController::class, 'coingateUpgradeSubscribe'])->name('coingate-pay-upgrade');
    Route::post('braintree-pay-upgrade', [\App\Http\Controllers\SubscriptionController::class, 'braintreeUpgradeSubscribe'])->name('braintree-pay-upgrade');
    Route::post('success-pay', [\App\Http\Controllers\SubscriptionController::class, 'successPay'])->name('successPay');
    Route::get('payment-history', [\App\Http\Controllers\PaymentHistoryController::class, 'index'])->name('payment-history');
    Route::get('pay-braintree', [\App\Http\Controllers\PaymentController::class, 'index'])->name('pay-braintree');
    Route::post('pay-braintree', [\App\Http\Controllers\PaymentController::class, 'payBraintree'])->name('handle-pay-braintree');
    Route::get('get-user-braintree', [\App\Http\Controllers\PaymentController::class, 'getUser'])->name('get-user-braintree');


    Route::get('add-coin-record', [\App\Http\Controllers\CoinController::class, 'addCoinRecord'])->name('add-coin-record');
    Route::post('add-coin-record', [\App\Http\Controllers\CoinController::class, 'saveCoinRecord'])->name('save-coin-record');
    Route::get('add-coin-month', [\App\Http\Controllers\CoinController::class, 'addCoinMonth'])->name('add-coin-month');
    Route::post('add-coin-month', [\App\Http\Controllers\CoinController::class, 'saveCoinMonth'])->name('save-coin-month');
    Route::get('add-coin-emerging', [\App\Http\Controllers\CoinController::class, 'addCoinEmerging'])->name('add-coin-emerging');
    Route::post('add-coin-emerging', [\App\Http\Controllers\CoinController::class, 'saveCoinEmerging'])->name('save-coin-emerging');
    Route::get('add-asset', [\App\Http\Controllers\AssetController::class, 'index'])->name('add-asset');
    Route::post('add-asset', [\App\Http\Controllers\AssetController::class, 'save'])->name('add-asset');
    Route::get('add-analytics', [\App\Http\Controllers\AnalyticController::class, 'addAnalytics'])->name('add-analytics');
    Route::post('add-analytics', [\App\Http\Controllers\AnalyticController::class, 'saveAnalytics'])->name('save-analytics');
    Route::post('delete-analytic', [\App\Http\Controllers\AnalyticController::class, 'delete'])->name('delete-analytic');
//});

Route::post('api-webhook', 'WebhookController@hookPayment')->name('webhook');
Route::post('webhook', 'WebhookController@hook')->name('hook');


Route::get('test', function (){
    dd(config('constants.help-text.add-coin'));
});

//

Route::group(['prefix' => 'admin', 'middleware'=>['throttle:global']], function () {
    Voyager::routes();
});
