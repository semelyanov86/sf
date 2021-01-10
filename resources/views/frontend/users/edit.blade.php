@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.users.update", [$user->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control" type="password" name="password" id="password">
                            @if($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="approved" value="0">
                                <input type="checkbox" name="approved" id="approved" value="1" {{ $user->approved || old('approved', 0) === 1 ? 'checked' : '' }}>
                                <label for="approved">{{ trans('cruds.user.fields.approved') }}</label>
                            </div>
                            @if($errors->has('approved'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('approved') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.approved_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="roles[]" id="roles" multiple required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('roles') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="login">{{ trans('cruds.user.fields.login') }}</label>
                            <input class="form-control" type="text" name="login" id="login" value="{{ old('login', $user->login) }}" required>
                            @if($errors->has('login'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('login') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.login_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="operations_number">{{ trans('cruds.user.fields.operations_number') }}</label>
                            <input class="form-control" type="number" name="operations_number" id="operations_number" value="{{ old('operations_number', $user->operations_number) }}" step="1" required>
                            @if($errors->has('operations_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('operations_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.operations_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="budget_day_start">{{ trans('cruds.user.fields.budget_day_start') }}</label>
                            <input class="form-control" type="number" name="budget_day_start" id="budget_day_start" value="{{ old('budget_day_start', $user->budget_day_start) }}" step="1" required>
                            @if($errors->has('budget_day_start'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('budget_day_start') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.budget_day_start_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="primary_currency">{{ trans('cruds.user.fields.primary_currency') }}</label>
                            <input class="form-control" type="number" name="primary_currency" id="primary_currency" value="{{ old('primary_currency', $user->primary_currency) }}" step="1" required>
                            @if($errors->has('primary_currency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('primary_currency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.primary_currency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="timezone">{{ trans('cruds.user.fields.timezone') }}</label>
                            <input class="form-control" type="text" name="timezone" id="timezone" value="{{ old('timezone', $user->timezone) }}" required>
                            @if($errors->has('timezone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('timezone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.timezone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="google_sync" value="0">
                                <input type="checkbox" name="google_sync" id="google_sync" value="1" {{ $user->google_sync || old('google_sync', 0) === 1 ? 'checked' : '' }}>
                                <label for="google_sync">{{ trans('cruds.user.fields.google_sync') }}</label>
                            </div>
                            @if($errors->has('google_sync'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('google_sync') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.google_sync_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="email_notify" value="0">
                                <input type="checkbox" name="email_notify" id="email_notify" value="1" {{ $user->email_notify || old('email_notify', 0) === 1 ? 'checked' : '' }}>
                                <label for="email_notify">{{ trans('cruds.user.fields.email_notify') }}</label>
                            </div>
                            @if($errors->has('email_notify'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email_notify') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.email_notify_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.user.fields.mail_days_before') }}</label>
                            <select class="form-control" name="mail_days_before" id="mail_days_before" required>
                                <option value disabled {{ old('mail_days_before', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(\Domains\Users\Enums\MailDaysBeforeEnum::getInstances() as $key => $label)
                                    <option value="{{ $label->value }}" {{ (int) old('mail_days_before', $user->mail_days_before) === $label->value ? 'selected' : '' }}>{{ $label->description }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mail_days_before'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mail_days_before') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.mail_days_before_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mail_time">{{ trans('cruds.user.fields.mail_time') }}</label>
                            <input class="form-control timepicker" type="text" name="mail_time" id="mail_time" value="{{ old('mail_time', $user->mail_time) }}">
                            @if($errors->has('mail_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mail_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.mail_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="sms_notify" value="0">
                                <input type="checkbox" name="sms_notify" id="sms_notify" value="1" {{ $user->sms_notify || old('sms_notify', 0) === 1 ? 'checked' : '' }}>
                                <label for="sms_notify">{{ trans('cruds.user.fields.sms_notify') }}</label>
                            </div>
                            @if($errors->has('sms_notify'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sms_notify') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.sms_notify_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.user.fields.sms_days_before') }}</label>
                            <select class="form-control" name="sms_days_before" id="sms_days_before" required>
                                <option value disabled {{ old('sms_days_before', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(\Domains\Users\Enums\SmsDayBefore::getInstances() as $key => $label)
                                    <option value="{{ $label->value }}" {{ (int) old('sms_days_before', $user->sms_days_before) === $label->value ? 'selected' : '' }}>{{ $label->description }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sms_days_before'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sms_days_before') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.sms_days_before_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sms_time">{{ trans('cruds.user.fields.sms_time') }}</label>
                            <input class="form-control timepicker" type="text" name="sms_time" id="sms_time" value="{{ old('sms_time', $user->sms_time) }}">
                            @if($errors->has('sms_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sms_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.sms_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.user.fields.language') }}</label>
                            <select class="form-control" name="language" id="language">
                                <option value disabled {{ old('language', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(\Domains\Users\Enums\LanguageEnum::getInstances() as $key => $label)
                                    <option value="{{ $label->value }}" {{ old('language', $user->language) === (string) $label->value ? 'selected' : '' }}>{{ $label->description }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('language'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('language') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.language_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="team_id">{{ trans('cruds.user.fields.team') }}</label>
                            <select class="form-control select2" name="team_id" id="team_id">
                                @foreach($teams as $id => $team)
                                    <option value="{{ $id }}" {{ (old('team_id') ? old('team_id') : $user->team->id ?? '') == $id ? 'selected' : '' }}>{{ $team }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('team'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('team') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.team_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
