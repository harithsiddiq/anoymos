<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDatatables extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.users.btn.edit')
            ->addColumn('delete', 'admin.users.btn.delete')
            ->addColumn('level', 'admin.users.btn.level')
            ->rawColumns([
                'level',
                'edit',
                'delete'
            ]);
    }

    public function query(User $model)
    {
        return $model->newQuery()->where(function($query) use ($model){
            if (request()->has('level')){
                return $query->where('level', request('level'));
            }
            return $model->newQuery();
        });
    }


    public function html()
    {
        return $this->builder()
                    ->setTableId('user-table')
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
                        Button::make('reload')->className('btn btn-warning btn-sm mb-2')->text('reload <i class="fa fa-download"></i>'),
                        ['text' => '<i class="fa fa-trash"></i> delete all', 'className' => 'delBtn btn btn-danger btn-sm mb-2']
                    );
    }

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('level')->searchable(false),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::make('edit')->className('btn-sm')->printable(false)->exportable(false),
            Column::make('delete')->className('btn-sm')->printable(false)->exportable(false)
        ];
    }

    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
