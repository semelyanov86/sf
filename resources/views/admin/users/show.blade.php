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
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->approved ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.verified') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->verified ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.login') }}
                        </th>
                        <td>
                            {{ $user->login }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.operations_number') }}
                        </th>
                        <td>
                            {{ $user->operations_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.budget_day_start') }}
                        </th>
                        <td>
                            {{ $user->budget_day_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.primary_currency') }}
                        </th>
                        <td>
                            {{ $user->primary_currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.timezone') }}
                        </th>
                        <td>
                            {{ $user->timezone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <td>
                            {{ $user->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.google_sync') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->google_sync ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_notify') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->email_notify ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.mail_days_before') }}
                        </th>
                        <td>
                            {{ App\Models\User::MAIL_DAYS_BEFORE_SELECT[$user->mail_days_before] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.mail_time') }}
                        </th>
                        <td>
                            {{ $user->mail_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.sms_notify') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $user->sms_notify ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.sms_days_before') }}
                        </th>
                        <td>
                            {{ App\Models\User::SMS_DAYS_BEFORE_SELECT[$user->sms_days_before] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.sms_time') }}
                        </th>
                        <td>
                            {{ $user->sms_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.language') }}
                        </th>
                        <td>
                            {{ App\Models\User::LANGUAGE_SELECT[$user->language] ?? '' }}
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
            @includeIf('admin.users.relationships.userOperations', ['operations' => $user->userOperations])
        </div>
        <div class="tab-pane" role="tabpanel" id="users_currencies">
            @includeIf('admin.users.relationships.usersCurrencies', ['currencies' => $user->usersCurrencies])
        </div>
    </div>
</div>

@endsection