<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * App\Models\Record
 *
 * @property int $id
 * @property mixed $coin_of_the_month
 * @property mixed|null $emerging_coin
 * @property int $rec_id
 * @property string $price
 * @property string $trade
 * @property string $buy_price
 * @property string $take_of_it
 * @property string $stop_loss
 * @property string $status
 * @property string|null $file
 * @property string $explanatory_text
 * @property string $percentage
 * @property string $dated
 * @property string $currency_id
 * @property string $coin_img
 * @property-read \App\Models\Asset|null $asset
 * @method static \Illuminate\Database\Eloquent\Builder|Record newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Record newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Record query()
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereBuyPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereCoinImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereCoinOfTheMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereDated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereEmergingCoin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereExplanatoryText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record wherePercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereRecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereStopLoss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereTakeOfIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Record whereTrade($value)
 * @mixin \Eloquent
 */
class Record extends Model
{
    use HasFactory;

    protected $table      = 'records';
    public    $timestamps = false;
    public    $dates      = ['dated'];

    public function getValueByName($type)
    {
        return $this->where('name', $type)->get()->value;
    }

    public function asset()
    {
        return $this->hasOne('App\Models\Asset', 'id', 'currency_id');
    }

    public function getById($id)
    {
        $record = DB::table('records')->leftJoin(
            'assets', function ($join) {
            $join->on('records.currency_id', '=', 'assets.id');
        }
        )->select(DB::raw("records.*,  assets.asset_name, assets.asset_code, assets.status, month(records.dated) as month, records.status as coin_status"))
            ->whereRaw("records.id = ?", [$id])
            ->first();
        
        return $record;
    }
}
