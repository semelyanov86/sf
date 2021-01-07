@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.account.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.id') }}
                        </th>
                        <td>
                            {{ $account->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.name') }}
                        </th>
                        <td>
                            {{ $account->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.account_type') }}
                        </th>
                        <td>
                            {{ $account->account_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.state') }}
                        </th>
                        <td>
                            {{ Domains\Accounts\Models\Account::STATE_RADIO[$account->state] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.description') }}
                        </th>
                        <td>
                            {{ $account->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.start_balance') }}
                        </th>
                        <td>
                            {{ $account->start_balance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.currency') }}
                        </th>
                        <td>
                            {{ $account->currency->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.bank') }}
                        </th>
                        <td>
                            {{ $account->bank->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.market_value') }}
                        </th>
                        <td>
                            {{ $account->market_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.account.fields.extra_prefix') }}
                        </th>
                        <td>
                            {{ $account->extra_prefix }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.accounts.index') }}">
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
            <a class="nav-link" href="#source_account_operations" role="tab" data-toggle="tab">
                {{ trans('cruds.operation.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#account_from_targets" role="tab" data-toggle="tab">
                {{ trans('cruds.target.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="source_account_operations">
            @includeIf('admin.accounts.relationships.sourceAccountOperations', ['operations' => $account->sourceAccountOperations])
        </div>
        <div class="tab-pane" role="tabpanel" id="account_from_targets">
            @includeIf('admin.accounts.relationships.accountFromTargets', ['targets' => $account->accountFromTargets])
        </div>
    </div>
</div>

@endsection
