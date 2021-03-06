@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.budget.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.budgets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.id') }}
                        </th>
                        <td>
                            {{ $budget->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.category') }}
                        </th>
                        <td>
                            {{ $budget->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.plan') }}
                        </th>
                        <td>
                            {{ $budget->plan->toNative() }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.budget.fields.user') }}
                        </th>
                        <td>
                            {{ $budget->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.budgets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
