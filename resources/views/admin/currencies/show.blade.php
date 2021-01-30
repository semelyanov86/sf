@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.currency.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.currencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.id') }}
                        </th>
                        <td>
                            {{ $viewModel->currency()->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.code') }}
                        </th>
                        <td>
                            {{ $viewModel->currency()->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.course') }}
                        </th>
                        <td>
                            {{ $viewModel->currency()->course }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.update_date') }}
                        </th>
                        <td>
                            {{ $viewModel->currency()->update_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.users') }}
                        </th>
                        <td>
                            @foreach($viewModel->currency()->users as $key => $users)
                                <span class="label label-info">{{ $users->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currency.fields.name') }}
                        </th>
                        <td>
                            {{ $viewModel->currency()->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.currencies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
