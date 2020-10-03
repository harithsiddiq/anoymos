<?php

namespace App\DataTables;

use App\Models\Dashboard\Brand;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Services\DataTable;

class BrandDatatable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('logo','admin.countries.logo')
            ->addColumn('edit', 'admin.brands.btn.edit')
            ->addColumn('delete', 'admin.brands.btn.delete')
            ->rawColumns(['logo', 'edit', 'delete']);
    }


    public function query(Brand $model)
    {
        return $model->newQuery();
    }


    public function html()
    {
        return $this->builder()
                    ->setTableId('branddatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->lengthMenu([[10,25,50,100, -1], [10, 25, 50, 'All record']])
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->className('btn btn-primary btn-sm mb-2')->text('create <i class="fa fa-plus-circle"></i>'),
                        Button::make('export')->className('btn btn-info btn-sm mb-2')->text('export <i class="fa fa-file-export"></i>'),
                        Button::make('print')->className('btn btn-primary btn-sm mb-2')->text('print <i class="fa fa-print"></i>'),
                        Button::make('reset')->className('btn btn-danger btn-sm mb-2')->text('reset <i class="fa fa-recycle"></i>'),
                        Button::make('reload')->className('btn btn-warning btn-sm mb-2')->text('reload <i class="fa fa-download"></i>')
                    );
    }


    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('brand_ar'),
            Column::make('brand_en'),
            Column::make('logo'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('edit'),
            Column::make('delete'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Brand_' . date('YmdHis');
    }
}
