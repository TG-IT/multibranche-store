@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            
            <div class="form-group">
                <label class="" for="system_title">{{ trans('cruds.setting.fields.system_title') }}</label>
                <input class="form-control {{ $errors->has('system_title') ? 'is-invalid' : '' }}" type="text" name="system_title" id="system_title" value="{{ old('system_title', $setting->system_title) }}" >
                @if($errors->has('system_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('system_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.system_title_helper') }}</span>
            </div>
            
            
            <div class="form-group">
                <label class="" for="logo">{{ trans('cruds.setting.fields.system_logo') }}</label>
                <input class="form-control" type="file" id="logo" name="logo">
            </div>


            <div class="form-group">
                <label class="" for="stock_alert">{{ trans('cruds.setting.fields.stock_alert') }}</label>
                <input class="form-control {{ $errors->has('stock_alert') ? 'is-invalid' : '' }}" type="text"   name="stock_alert" id="stock_alert" value="{{ old('stock_alert', $setting->stock_alert) }}" >
                @if($errors->has('stock_alert'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock_alert') }}
                    </div>
                @endif
            </div>
            
            

            <div class="form-group">
                <label class="" for="loyal_points_value_in_money">{{ trans('cruds.setting.fields.loyal_points_value_in_money') }}</label>
                <input class="form-control {{ $errors->has('loyal_points_value_in_money') ? 'is-invalid' : '' }}" type="text"   name="loyal_points_value_in_money" id="loyal_points_value_in_money" value="{{ old('loyal_points_value_in_money', $setting->loyal_points_value_in_money) }}" >
                @if($errors->has('loyal_points_value_in_money'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loyal_points_value_in_money') }}
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <label class="" for="api_token">{{ trans('cruds.setting.fields.api_token') }}</label>
                <input class="form-control {{ $errors->has('api_token') ? 'is-invalid' : '' }}" type="text"  name="api_token" id="api_token" value="{{ old('api_token', $setting->api_token) }}" >
                @if($errors->has('api_token'))
                    <div class="invalid-feedback">
                        {{ $errors->first('api_token') }}
                    </div>
                @endif
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