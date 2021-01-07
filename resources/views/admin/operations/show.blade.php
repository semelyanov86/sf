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
                            {{ $operation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.amount') }}
                        </th>
                        <td>
                            {{ $operation->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.done_at') }}
                        </th>
                        <td>
                            {{ $operation->done_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.source_account') }}
                        </th>
                        <td>
                            {{ $operation->source_account->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.to_account') }}
                        </th>
                        <td>
                            {{ $operation->to_account->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.type') }}
                        </th>
                        <td>
                            {{ Domains\Operations\Models\Operation::TYPE_SELECT[$operation->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.category') }}
                        </th>
                        <td>
                            {{ $operation->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.description') }}
                        </th>
                        <td>
                            {{ $operation->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.user') }}
                        </th>
                        <td>
                            {{ $operation->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.attachment') }}
                        </th>
                        <td>
                            @if($operation->attachment)
                                <a href="{{ $operation->attachment->getUrl() }}" target="_blank">
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
                            {{ $operation->related_transactions }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.cal_repeat') }}
                        </th>
                        <td>
                            {{ $operation->cal_repeat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.google_sync') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $operation->google_sync ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.remind_operation') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $operation->remind_operation ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.operation.fields.is_calendar') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $operation->is_calendar ? 'checked' : '' }}>
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
