@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="system_title">{{ trans('cruds.setting.fields.system_title') }}</label>
                <input class="form-control {{ $errors->has('system_title') ? 'is-invalid' : '' }}" type="text" name="system_title" id="system_title" value="{{ old('system_title', '') }}" required>
                @if($errors->has('system_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('system_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.system_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="system_logo">{{ trans('cruds.setting.fields.system_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('system_logo') ? 'is-invalid' : '' }}" id="system_logo-dropzone">
                </div>
                @if($errors->has('system_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('system_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.system_logo_helper') }}</span>
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
    Dropzone.options.systemLogoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 250, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 250
    },
    success: function (file, response) {
      $('form').find('input[name="system_logo"]').remove()
      $('form').append('<input type="hidden" name="system_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="system_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->system_logo)
      var file = {!! json_encode($setting->system_logo) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="system_logo" value="' + file.file_name + '">')
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