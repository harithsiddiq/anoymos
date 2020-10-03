<?php

namespace App\DataTables;

use App\Models\Dashboard\Admin;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdminDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.admins.btn.edit')
            ->addColumn('delete', 'admin.admins.btn.delete')
            ->addColumn('checkbox', 'admin.admins.btn.checkbox')
            ->rawColumns([
                'edit',
                'delete',
                'checkbox'
            ]);
    }

    public function query(Admin $model)
    {
        return $model::query();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('admin-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->lengthMenu([[10,25,50,100, -1], [10, 25, 50, 'All record']])
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->className('btn btn-primary btn-sm mb-2')->text('create <i class="fa fa-plus-circle"></i>'),
                        Button::make('export')->className('btn btn-info btn-sm mb-2')->text('export <i class="fa fa-file-export"></i>'),
                        Button::make('print')->className('btn btn-primary btn-sm mb-2')->text('print <i class="fa fa-print"></i>'),
                        Button::make('reset')->className('btn btn-danger btn-sm mb-2')->text('reset <i class="fa fa-recycle"></i>'),
                        Button::make('reload')->className('btn btn-warning btn-sm mb-2')->text('reload <i class="fa fa-download"></i>'),
                        ['text' => '<i class="fa fa-trash"></i> delete all', 'className' => 'delBtn btn btn-danger btn-sm mb-2']
        );
    }

    protected function getColumns()
    {
        return [
            Column::checkbox('<input type="checkbox" class="check_all" onclick="checkAll()"/>')->data('checkbox')->name('checkbox')->printable(false)->exportable(false),
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('edit')->printable(false)->exportable(false),
            Column::make('delete')->printable(false)->exportable(false)
        ];
    }

    protected function filename()
    {
        return 'Admin_' . date('YmdHis');
    }
}
