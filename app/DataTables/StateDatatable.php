<?php

namespace App\DataTables;

use App\Models\Dashboard\State;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StateDatatable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('edit', 'admin.states.btn.edit')
            ->addColumn('delete', 'admin.states.btn.delete')
            ->rawColumns([
                'edit',
                'delete',
            ]);
    }

    public function query(State $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('statedatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->lengthMenu([[10,25,50,100, -1], [10, 25, 50, 'All record']])
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
            Column::make('state_name_ar'),
            Column::make('state_name_en'),
            Column::make('country.country_name_ar'),
            Column::make('city.city_name_ar'),
            Column::make('updated_at'),
            Column::make('created_at'),
            Column::make('edit')->printable(false),
            Column::make('delete')->printable(false)
        ];
    }


    protected function filename()
    {
        return 'State_' . date('YmdHis');
    }
}
