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
class SystemInfo extends Model
{

    public $table = 'deviceinfo';

    const CREATED_AT = 'created_at';

    public $timestamps = false;

    public $fillable = [
        'device_id',
        'board',
        'mac_address',
        'firmware',
        'system_date',
        'system_time',
        'total_power_outage',
        'sap_id'
      
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
         'device_id' => 'integer',
        'board' => 'string',
        'mac_address'=> 'string',
        'firmware'=> 'string',
        'system_date'=> 'string',
        'system_time'=> 'string',
        'total_power_outage' => 'string',
        'sap_id' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'device_id' => 'nullable|max:255',
        'board' => 'nullable|string|max:255',
        'mac_address' => 'nullable|string|max:255',
        'firmware' => 'nullable|string|max:255',
        'system_date' => 'nullable|string|max:255',
        'system_time' => 'nullable|string|max:255',
        'total_power_outage' => 'nullable|string|max:255',
        'sap_id' => 'nullable|string|max:255',
     
    ];

    // public function createdAt() : Attribute{
    //     return new Attribute(
    //         get: fn ($value) => Carbon::parse($value)->format('d/m/Y H:i:s'),
    //         set: fn ($value) => Carbon::now()
    //     );
    // }

    // public function getTableColumns() {
    //     return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    // }

}
