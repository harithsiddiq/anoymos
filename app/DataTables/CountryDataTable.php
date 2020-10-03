<?php

namespace App\DataTables;

use App\Models\Dashboard\Country;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CountryDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('logo','admin.countries.logo')
            ->addColumn('edit','admin.countries.btn.edit')
            ->addColumn('delete','admin.countries.btn.delete')
            ->rawColumns([
                'logo',
                'edit',
                'delete',
            ]);
    }


    public function query(Country $model)
    {
        return $model->newQuery();
    }


    public function html()
    {
        return $this->builder()
                    ->setTableId('countrydatatable-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->lengthMenu([[10,25,50,100, -1], [10, 25, 50, 'All record']])
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->className('btn btn-primary btn-sm mb-2')->text('create <i class="fa fa-plus-circle"></i>'),
                        Button::make('export')->className('btn btn-success btn-sm mb-2')->text('export <i class="fa fa-file-export"></i>'),
                        Button::make('print')->className('btn btn-info btn-sm mb-2')->text('print <i class="fa fa-print"></i>'),
                        Button::make('reset')->className('btn btn-warning btn-sm mb-2')->text('reset <i class="fa fa-recycle"></i>'),
                        Button::make('reload')->className('btn btn-danger btn-sm mb-2')->text('reload <i class="fa fa-download"></i>')
                    );
    }

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('country_name_ar'),
            Column::make('country_name_en'),
            Column::make('mob'),
            Column::make('code'),
            Column::make('currency'),
            Column::make('logo')->printable(false)->exportable(false),
            Column::make('edit')->printable(false)->exportable(false),
            Column::make('delete')->printable(false)->exportable(false)
        ];
    }

    protected function filename()
    {
        return 'Country_' . date('YmdHis');
    }
}
