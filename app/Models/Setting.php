<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Setting
 * @package App\Models
 * @version June 22, 2022, 1:36 pm UTC
 *
 * @property string $app_name
 * @property string $color
 * @property string $heading
 * @property string $logo
 */
class Setting extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'settings';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'app_name',
        'color',
        'heading',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'app_name' => 'string',
        'color' => 'string',
        'heading' => 'string',
        'logo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'app_name' => 'required',
        'color' => 'required',
        'heading' => 'required',
        'logo' => 'required'
    ];

    
}
