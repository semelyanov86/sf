@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.operation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.operations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.id') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.amount') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->amount->toNative() }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.done_at') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->done_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.source_account') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->source_account->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.to_account') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->to_account->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.type') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->type->description ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.category') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.description') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.user') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.attachment') }}
                        </th>
                        <td>
                            @if($viewModel->operation()->attachment)
                                <a href="{{ $viewModel->operation()->attachment->url }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.related_transactions') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->related_transactions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.cal_repeat') }}
                        </th>
                        <td>
                            {{ $viewModel->operation()->cal_repeat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.google_sync') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $viewModel->operation()->google_sync ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.remind_operation') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $viewModel->operation()->remind_operation ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.is_calendar') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $viewModel->operation()->is_calendar ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.operations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
