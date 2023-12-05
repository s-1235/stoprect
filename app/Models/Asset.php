<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Asset
 *
 * @property int $id
 * @property string|null $asset_name
 * @property string|null $asset_code
 * @property string $status
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAssetCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereAssetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asset whereStatus($value)
 * @mixin \Eloquent
 */
class Asset extends Model
{
    use HasFactory;
    
    protected $table = 'assets';
    public $timestamps = false;



}
