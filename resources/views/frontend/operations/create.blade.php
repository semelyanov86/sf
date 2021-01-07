@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.operation.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.operations.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="amount">{{ trans('cruds.operation.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="done_at">{{ trans('cruds.operation.fields.done_at') }}</label>
                            <input class="form-control date" type="text" name="done_at" id="done_at" value="{{ old('done_at') }}" required>
                            @if($errors->has('done_at'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('done_at') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.done_at_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="source_account_id">{{ trans('cruds.operation.fields.source_account') }}</label>
                            <select class="form-control select2" name="source_account_id" id="source_account_id">
                                @foreach($source_accounts as $id => $source_account)
                                    <option value="{{ $id }}" {{ old('source_account_id') == $id ? 'selected' : '' }}>{{ $source_account }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('source_account'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('source_account') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.source_account_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="to_account_id">{{ trans('cruds.operation.fields.to_account') }}</label>
                            <select class="form-control select2" name="to_account_id" id="to_account_id">
                                @foreach($to_accounts as $id => $to_account)
                                    <option value="{{ $id }}" {{ old('to_account_id') == $id ? 'selected' : '' }}>{{ $to_account }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('to_account'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('to_account') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.to_account_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.operation.fields.type') }}</label>
                            <select class="form-control" name="type" id="type" required>
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(Domains\Operations\Models\Operation::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="category_id">{{ trans('cruds.operation.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.operation.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.operation.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="attachment">{{ trans('cruds.operation.fields.attachment') }}</label>
                            <div class="needsclick dropzone" id="attachment-dropzone">
                            </div>
                            @if($errors->has('attachment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attachment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.attachment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="related_transactions">{{ trans('cruds.operation.fields.related_transactions') }}</label>
                            <textarea class="form-control" name="related_transactions" id="related_transactions">{{ old('related_transactions') }}</textarea>
                            @if($errors->has('related_transactions'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('related_transactions') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.related_transactions_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="cal_repeat">{{ trans('cruds.operation.fields.cal_repeat') }}</label>
                            <input class="form-control" type="number" name="cal_repeat" id="cal_repeat" value="{{ old('cal_repeat', '') }}" step="1">
                            @if($errors->has('cal_repeat'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('cal_repeat') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.cal_repeat_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="google_sync" value="0">
                                <input type="checkbox" name="google_sync" id="google_sync" value="1" {{ old('google_sync', 0) == 1 ? 'checked' : '' }}>
                                <label for="google_sync">{{ trans('cruds.operation.fields.google_sync') }}</label>
                            </div>
                            @if($errors->has('google_sync'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('google_sync') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.google_sync_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="remind_operation" value="0">
                                <input type="checkbox" name="remind_operation" id="remind_operation" value="1" {{ old('remind_operation', 0) == 1 ? 'checked' : '' }}>
                                <label for="remind_operation">{{ trans('cruds.operation.fields.remind_operation') }}</label>
                            </div>
                            @if($errors->has('remind_operation'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('remind_operation') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.remind_operation_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_calendar" value="0">
                                <input type="checkbox" name="is_calendar" id="is_calendar" value="1" {{ old('is_calendar', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_calendar">{{ trans('cruds.operation.fields.is_calendar') }}</label>
                            </div>
                            @if($errors->has('is_calendar'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_calendar') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.operation.fields.is_calendar_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.attachmentDropzone = {
    url: '{{ route('frontend.operations.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="attachment"]').remove()
      $('form').append('<input type="hidden" name="attachment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attachment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($operation) && $operation->attachment)
      var file = {!! json_encode($operation->attachment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attachment" value="' + file.file_name + '">')
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
