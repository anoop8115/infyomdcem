<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model as Model;

/**
 * Class RoData
 * @package App\Models
 * @version January 23, 2022, 7:08 am UTC
 *
 * @property string $cf1
 * @property string $cf2
 * @property string $cf3
 * @property string $cf4
 * @property string $cf5
 * @property string $cf6
 * @property string $cf7
 */
class RoData extends Model
{

    public $table = 'ro_data';

    const CREATED_AT = 'created_at';

    public $timestamps = false;

    public $fillable = [
        'device_id',
        'cf1',
        'cf2',
        'cf3',
        'cf4',
        'cf5',
        'cf6',
        'cf7',
        'cf8',
        'cf9',
        'cf10',
        'cf11',
        'cf12',
        'cf13',
        'cf14',
        'cf15',
        'cf16',
        'cf17',
        'cf18',
        'cf19',
        'cf20',
        'cf21',
        'cf22',
        'cf23',
        'cf24',
        'cf25',
        'cf26',
        'cf27',
        'cf28',
        'cf29',
        'cf30',
        'cf31',
        'cf32',
        'cf33',
        'cf34',
        'cf35',
        'cf36',
        'cf37',
        'cf38',
        'cf39',
        'cf40',
        'cf41',
        'cf42',
        'cf43',
        'cf44',
        'cf45',
        'cf46',
        'cf47',
        'cf48',
        'cf49',
        'cf50',
        'cf51',
        'cf52',
        'cf53',
        'cf54',
        'cf55',
        'cf56',
        'cf57',
        'cf58',
        'cf59',
        'cf60',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cf1' => 'string',
        'cf2' => 'string',
        'cf3' => 'string',
        'cf4' => 'string',
        'cf5' => 'string',
        'cf6' => 'string',
        'cf7' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'device_id' => 'nullable|max:255',
        'cf1' => 'nullable|string|max:255',
        'cf2' => 'nullable|string|max:255',
        'cf3' => 'nullable|string|max:255',
        'cf4' => 'nullable|string|max:255',
        'cf5' => 'nullable|string|max:255',
        'cf6' => 'nullable|string|max:255',
        'cf7' => 'nullable|string|max:255'
    ];

    public function createdAt() : Attribute{
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y H:i:s'),
            set: fn ($value) => Carbon::now()
        );
    }
    public function deviceinfo(){
         return $this->belongsTo(SystemInfo::class,'device_id','device_id');
    }
    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

}
