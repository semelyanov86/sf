@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cardType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.card-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cardType.fields.id') }}
                        </th>
                        <td>
                            {{ $cardType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cardType.fields.name') }}
                        </th>
                        <td>
                            {{ $cardType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cardType.fields.description') }}
                        </th>
                        <td>
                            {{ $cardType->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.card-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection