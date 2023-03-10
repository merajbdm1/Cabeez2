<?php

namespace App\DataTables;

use App\Models\admin\Driver;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;



class DriverDataTable extends DataTable
{
 
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        ->addColumn('action','view-driver.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
       // $model = Driver::where('status','active');
        // if(auth()->user()->hasRole('fleet')) {
        //     $model->where('fleet_id', auth()->user()->id);
        // }
        //return $this->applyScopes($model);
    }

    /**
     * Get columns.
     *
     * @return array
     */
  
    public function html()
    {
      return $this->builder()
                   ->setTableId('drivers')
                   ->columns($this->getColumns())
                   ->minifiedAjax()
                   ->orderBy(1);
    }


    protected function getColumns()
    {
        return [
            'id',
            'first_name',
            'last_name',
            'email',
            // Column::computed('action')
            //         ->exportable(false)
            //         ->printable(false)
            //         ->width(60)
            //         ->addClass('text-center'),
            //         Column::make('id'),
            //         Column::make('First Name'),
            //         Column::make('Last Name'),
            //         Column::make('Email'),

        ];
    }
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'driver_' . date('YmdHis');
    }
}
