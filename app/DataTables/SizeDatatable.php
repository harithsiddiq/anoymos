<?php

namespace App\DataTables;

use App\Models\Dashboard\Size;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SizeDatatable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.sizes.btn.edit')
            ->addColumn('delete', 'admin.sizes.btn.delete')
            ->rawColumns(['edit', 'delete']);
    }


    public function query(Size $model)
    {
        return $model->newQuery();
    }


    public function html()
    {
        return $this->builder()
                    ->setTableId('sizedatatable-table')
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
            Column::make('department.dep_name_'.lang())->title('department'),
            Column::make('is_public')->title('public'),
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
        return 'Size_' . date('YmdHis');
    }
}
