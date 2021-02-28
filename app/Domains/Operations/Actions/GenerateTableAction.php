<?php


namespace Domains\Operations\Actions;


use Domains\Operations\Models\Operation;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Facades\DataTables;

final class GenerateTableAction extends \Parents\Actions\Action
{
    public function __invoke(): EloquentDataTable
    {
        $query = Operation::with(['source_account', 'to_account', 'category', 'user', 'team'])->select(sprintf('%s.*', (new Operation)->table));
        $table = Datatables::of($query);

        $table->addColumn('placeholder', '&nbsp;');
        $table->addColumn('actions', '&nbsp;');

        $table->editColumn('actions', function (Operation $row) {
            $viewGate      = 'operation_show';
            $editGate      = 'operation_edit';
            $deleteGate    = 'operation_delete';
            $crudRoutePart = 'operations';

            return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
        });

        $table->editColumn('id', function (Operation $row) {
            return $row->id ? $row->id : "";
        });
        $table->editColumn('amount', function (Operation $row) {
            return $row->amount->toNative();
        });

        $table->addColumn('source_account_name', function (Operation $row): string {
            return $row->source_account->name;
        });

        $table->editColumn('type', function (Operation $row): string {
            return $row->type->description;
        });
        $table->editColumn('done_at', function (Operation $row): string {
            return $row->done_at->format('Y-m-d H:i:s');
        });
        $table->addColumn('category_name', function (Operation $row): string {
            return $row->category->name;
        });

        $table->rawColumns(['actions', 'placeholder', 'source_account', 'category']);
        return $table;
    }
}
