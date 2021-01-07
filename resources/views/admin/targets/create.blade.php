@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.target.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.targets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="target_category_id">{{ trans('cruds.target.fields.target_category') }}</label>
                <select class="form-control select2 {{ $errors->has('target_category') ? 'is-invalid' : '' }}" name="target_category_id" id="target_category_id" required>
                    @foreach($target_categories as $id => $target_category)
                        <option value="{{ $id }}" {{ old('target_category_id') == $id ? 'selected' : '' }}>{{ $target_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('target_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.target_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency_id">{{ trans('cruds.target.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id">
                    @foreach($currencies as $id => $currency)
                        <option value="{{ $id }}" {{ old('currency_id') == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="account_from_id">{{ trans('cruds.target.fields.account_from') }}</label>
                <select class="form-control select2 {{ $errors->has('account_from') ? 'is-invalid' : '' }}" name="account_from_id" id="account_from_id">
                    @foreach($account_froms as $id => $account_from)
                        <option value="{{ $id }}" {{ old('account_from_id') == $id ? 'selected' : '' }}>{{ $account_from }}</option>
                    @endforeach
                </select>
                @if($errors->has('account_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('account_from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.account_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.target.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.target.fields.target_type') }}</label>
                <select class="form-control {{ $errors->has('target_type') ? 'is-invalid' : '' }}" name="target_type" id="target_type">
                    <option value disabled {{ old('target_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(Domains\Targets\Models\Target::TARGET_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('target_type', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('target_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.target_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="target_name">{{ trans('cruds.target.fields.target_name') }}</label>
                <input class="form-control {{ $errors->has('target_name') ? 'is-invalid' : '' }}" type="text" name="target_name" id="target_name" value="{{ old('target_name', '') }}" required>
                @if($errors->has('target_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.target_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.target.fields.target_status') }}</label>
                @foreach(Domains\Targets\Models\Target::TARGET_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('target_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="target_status_{{ $key }}" name="target_status" value="{{ $key }}" {{ old('target_status', '0') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="target_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('target_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.target_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.target.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_pay_date">{{ trans('cruds.target.fields.first_pay_date') }}</label>
                <input class="form-control date {{ $errors->has('first_pay_date') ? 'is-invalid' : '' }}" type="text" name="first_pay_date" id="first_pay_date" value="{{ old('first_pay_date') }}">
                @if($errors->has('first_pay_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_pay_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.first_pay_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_pay_amount">{{ trans('cruds.target.fields.monthly_pay_amount') }}</label>
                <input class="form-control {{ $errors->has('monthly_pay_amount') ? 'is-invalid' : '' }}" type="number" name="monthly_pay_amount" id="monthly_pay_amount" value="{{ old('monthly_pay_amount', '') }}" step="0.01">
                @if($errors->has('monthly_pay_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_pay_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.monthly_pay_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pay_to_date">{{ trans('cruds.target.fields.pay_to_date') }}</label>
                <input class="form-control date {{ $errors->has('pay_to_date') ? 'is-invalid' : '' }}" type="text" name="pay_to_date" id="pay_to_date" value="{{ old('pay_to_date') }}">
                @if($errors->has('pay_to_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pay_to_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.pay_to_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.target.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="image">{{ trans('cruds.target.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('target_is_done') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="target_is_done" value="0">
                    <input class="form-check-input" type="checkbox" name="target_is_done" id="target_is_done" value="1" {{ old('target_is_done', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="target_is_done">{{ trans('cruds.target.fields.target_is_done') }}</label>
                </div>
                @if($errors->has('target_is_done'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_is_done') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.target.fields.target_is_done_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.targets.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($target) && $target->image)
      var file = {!! json_encode($target->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection
