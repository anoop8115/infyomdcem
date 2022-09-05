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
class SystemAlarm extends Model
{

    public $table = 'devicealarm';

    // const CREATED_AT = 'created_at';

    public $timestamps = false;

    public $fillable = [
        'device_id',
        'channel',
        'description',
        'status',
        'config',
       
      
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
         'device_id' => 'integer',
        'channel' => 'string',
        'description'=> 'string',
        'status'=> 'string',
        'config'=> 'string',
       
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'device_id' => 'nullable|max:255',
        'channel' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'status' => 'nullable|string|max:255',
        'config' => 'nullable|string|max:255',
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
