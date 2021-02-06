@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.targetCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.target-categories.update", [$targetCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="target_category_name">{{ trans('cruds.targetCategory.fields.target_category_name') }}</label>
                <input class="form-control {{ $errors->has('target_category_name') ? 'is-invalid' : '' }}" type="text" name="target_category_name" id="target_category_name" value="{{ old('target_category_name', $targetCategory->target_category_name) }}" required>
                @if($errors->has('target_category_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_category_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.targetCategory.fields.target_category_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.targetCategory.fields.target_category_type') }}</label>
                <select class="form-control {{ $errors->has('target_category_type') ? 'is-invalid' : '' }}" name="target_category_type" id="target_category_type" required>
                    <option value disabled {{ old('target_category_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(\Domains\Targets\Enums\TypeSelectEnum::getInstances() as $key => $label)
                        <option value="{{ $label->value }}" {{ old('target_category_type', $targetCategory->target_category_type) === (string) $label->value ? 'selected' : '' }}>{{ $label->description }}</option>
                    @endforeach
                </select>
                @if($errors->has('target_category_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_category_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.targetCategory.fields.target_category_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="target_category_image">{{ trans('cruds.targetCategory.fields.target_category_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('target_category_image') ? 'is-invalid' : '' }}" id="target_category_image-dropzone">
                </div>
                @if($errors->has('target_category_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('target_category_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.targetCategory.fields.target_category_image_helper') }}</span>
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
    Dropzone.options.targetCategoryImageDropzone = {
    url: '{{ route('admin.target-categories.storeMedia') }}',
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
      $('form').find('input[name="target_category_image"]').remove()
      $('form').append('<input type="hidden" name="target_category_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="target_category_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($targetCategory) && $targetCategory->target_category_image)
      var file = {!! json_encode($targetCategory->target_category_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="target_category_image" value="' + file.file_name + '">')
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
