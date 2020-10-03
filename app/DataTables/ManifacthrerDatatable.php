<?php

namespace App\DataTables;

use App\Models\Dashboard\Manufacturer;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ManifacthrerDatatable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.manufacturer.btn.edit')
            ->addColumn('delete', 'admin.manufacturer.btn.delete')
            ->rawColumns(['edit', 'delete']);
    }

    public function query(Manufacturer $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('manifacthrerdatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
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

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name_ar'),
            Column::make('name_en'),
            Column::make('facebook'),
            Column::make('twitter'),
            Column::make('website'),
            Column::make('contact_name'),
            Column::make('edit')->exportable(false)->printable(false),
            Column::make('delete')->exportable(false)->printable(false),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    protected function filename()
    {
        return 'Manifacthrer_' . date('YmdHis');
    }
}
