@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $viewModel->user()->approved ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $viewModel->user()->verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($viewModel->user()->roles as $role)
                                <span class="label label-info">{{ $role->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.login') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->login }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.operations_number') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->operations_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.budget_day_start') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->budget_day_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.primary_currency') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->primary_currency->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.timezone') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->timezone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.google_sync') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $viewModel->user()->google_sync ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_notify') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $viewModel->user()->email_notify ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.mail_days_before') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->mail_days_before ? \Domains\Users\Enums\MailDaysBeforeEnum::getValue($viewModel->user()->mail_days_before)?->description : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.mail_time') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->mail_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.sms_notify') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $viewModel->user()->sms_notify ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.sms_days_before') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->sms_days_before ? \Domains\Users\Enums\SmsDayBefore::fromValue($viewModel->user()->sms_days_before)?->description : '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.sms_time') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->sms_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.language') }}
                        </th>
                        <td>
                            {{ $viewModel->user()->language ? \Domains\Users\Enums\LanguageEnum::fromValue($viewModel->user()->language)?->description : '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#user_operations" role="tab" data-toggle="tab">
                {{ trans('cruds.operation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#users_currencies" role="tab" data-toggle="tab">
                {{ trans('cruds.currency.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_operations">
            @includeIf('admin.users.relationships.userOperations', ['operations' => $viewModel->operations()])
        </div>
        <div class="tab-pane" role="tabpanel" id="users_currencies">
            @includeIf('admin.users.relationships.usersCurrencies', ['currencies' => $viewModel->currencies()])
        </div>
    </div>
</div>

@endsection
