@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.target.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.targets.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $target->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.target_category') }}
                                    </th>
                                    <td>
                                        {{ $target->target_category->target_category_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.currency') }}
                                    </th>
                                    <td>
                                        {{ $target->currency->code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.account_from') }}
                                    </th>
                                    <td>
                                        {{ $target->account_from->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $target->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.target_type') }}
                                    </th>
                                    <td>
                                        {{ $target->target_type ? \Domains\Targets\Enums\TypeSelectEnum::fromValue((int) $target->target_type)?->description : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.target_name') }}
                                    </th>
                                    <td>
                                        {{ $target->target_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.target_status') }}
                                    </th>
                                    <td>
                                        {{ Domains\Targets\Models\Target::TARGET_STATUS_RADIO[$target->target_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $target->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.first_pay_date') }}
                                    </th>
                                    <td>
                                        {{ $target->first_pay_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.monthly_pay_amount') }}
                                    </th>
                                    <td>
                                        {{ $target->monthly_pay_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.pay_to_date') }}
                                    </th>
                                    <td>
                                        {{ $target->pay_to_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $target->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.image') }}
                                    </th>
                                    <td>
                                        @if($target->image)
                                            <a href="{{ $target->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $target->image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.target_is_done') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $target->target_is_done ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.targets.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
