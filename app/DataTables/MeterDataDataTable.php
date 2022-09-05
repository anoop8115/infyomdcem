<?php

namespace App\DataTables;

use App\Models\MeterData;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class MeterDataDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'meter_datas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\MeterData $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(MeterData $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // search sort false

            'device_id'=>['title'=>'Device ID','orderable' => true, 'searchable' => true, ],
            'sap_id' => ['title'=>'SAP ID','orderable' => true, 'searchable' => true,'width'=>'150px', ],
            'updated_at'=>['title'=>'Updated At','orderable' => true, 'searchable' => false, ],
            'cf1'=>['title'=>'VOLTAGE1','orderable' => false, 'searchable' => false, ],
            'cf2'=>['title'=>'CURRENT1','orderable' => false, 'searchable' => false, ],
            'cf3'=>['title'=>'KW1','orderable' => false, 'searchable' => false, ],
            'cf4'=>['title'=>'KWH1','orderable' => false, 'searchable' => false, ],   
            'cf5'=>['title'=>'VOLTAGE2','orderable' => false, 'searchable' => false, ],
            'cf6'=>['title'=>'CURRENT2','orderable' => false, 'searchable' => false, ],
            'cf7'=>['title'=>'KW2','orderable' => false, 'searchable' => false, ],
            'cf8'=>['title'=>'KWH2','orderable' => false, 'searchable' => false, ],
            'cf9'=>['title'=>'VOLTAGE3','orderable' => false, 'searchable' => false, ],
            'cf10'=>['title'=>'CURRENT3','orderable' => false, 'searchable' => false, ],
            'cf11'=>['title'=>'KW3','orderable' => false, 'searchable' => false, ],
            'cf12'=>['title'=>'KWH3','orderable' => false, 'searchable' => false, ],
            'cf13'=>['title'=>'VOLTAGE4','orderable' => false, 'searchable' => false, ],
            'cf14'=>['title'=>'CURRENT4','orderable' => false, 'searchable' => false, ],
            'cf15'=>['title'=>'KW4','orderable' => false, 'searchable' => false, ],
            'cf16'=>['title'=>'KWH4','orderable' => false, 'searchable' => false, ],
          


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'meter_datas_datatable_' . time();
    }
}
