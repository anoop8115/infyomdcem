<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MeterData
 * @package App\Models
 * @version June 21, 2022, 7:39 am UTC
 *
 * @property integer $device_id
 * @property integer $cf1
 * @property integer $cf2
 * @property integer $cf3
 * @property integer $cf4
 * @property integer $cf5
 * @property integer $cf6
 * @property integer $cf7
 * @property integer $cf8
 * @property integer $cf9
 * @property integer $cf10
 * @property integer $cf11
 * @property integer $cf12
 * @property integer $cf13
 * @property integer $cf14
 * @property integer $cf15
 * @property integer $cf16
 */
class MeterData extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ro_data';
    

    protected $dates = ['deleted_at'];



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
        'cf16'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'device_id' => 'integer',
        'cf1' => 'integer',
        'cf2' => 'integer',
        'cf3' => 'integer',
        'cf4' => 'integer',
        'cf5' => 'integer',
        'cf6' => 'integer',
        'cf7' => 'integer',
        'cf8' => 'integer',
        'cf9' => 'integer',
        'cf10' => 'integer',
        'cf11' => 'integer',
        'cf12' => 'integer',
        'cf13' => 'integer',
        'cf14' => 'integer',
        'cf15' => 'integer',
        'cf16' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'device_id' => 'required',
        'cf1' => 'required',
        'cf2' => 'required',
        'cf3' => 'required',
        'cf4' => 'required',
        'cf5' => 'required',
        'cf6' => 'required',
        'cf7' => 'required',
        'cf8' => 'required',
        'cf9' => 'required',
        'cf10' => 'required',
        'cf11' => 'required',
        'cf12' => 'required',
        'cf13' => 'required',
        'cf14' => 'required',
        'cf15' => 'required',
        'cf16' => 'required'
    ];

    
}
