<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Analytic
 *
 * @property int $id
 * @property string $media_path
 * @property string $text
 * @property string $media_type
 * @property string $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereMediaPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereMediaType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Analytic whereText($value)
 * @mixin \Eloquent
 */
class Analytic extends Model
{
    use HasFactory;
    
    protected $table = 'analytics';
    public $timestamps = false;



}
