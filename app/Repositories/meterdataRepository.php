<?php

namespace App\Repositories;

use App\Models\MeterData;
use App\Repositories\BaseRepository;

/**
 * Class MeterDataRepository
 * @package App\Repositories
 * @version June 21, 2022, 7:39 am UTC
*/

class MeterDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return MeterData::class;
    }
}
