@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf


            <div class="form-group">
                <label for="product_categorie_id">{{ trans('cruds.product.fields.product_categorie') }}</label>
                <select class="form-control select2 {{ $errors->has('product_categorie') ? 'is-invalid' : '' }}" name="product_categorie_id" id="product_categorie_id">
                    @foreach($product_categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_categorie_id') ? old('product_categorie_id') : $product->product_categorie->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                <a href="{{url('admin/product-categories/create')}}">
                    <i class="fa fa-plus"></i>
                    {{ trans('cruds.product.fields.product_categorie') }}
                </a>
                @if($errors->has('product_categorie'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_categorie') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.product_categorie_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="titel">{{ trans('cruds.product.fields.titel') }}</label>
                <input class="form-control {{ $errors->has('titel') ? 'is-invalid' : '' }}" type="text" name="titel" id="titel" value="{{ old('titel', $product->titel) }}" required>
                @if($errors->has('titel'))
                    <div class="invalid-feedback">
                        {{ $errors->first('titel') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.titel_helper') }}</span>
            </div>




            <br>
            <h4 style="text-align: center">
                {{ trans('global.sell_price_configuration') }}
            </h4>
            <br>
            <div class="form-group">
                <label class="required" for="sell_price">{{ trans('cruds.product.fields.sell_price') }}</label>
                <input class="form-control {{ $errors->has('sell_price') ? 'is-invalid' : '' }}" type="number" name="sell_price" id="sell_price" value="{{ old('sell_price', $product->sell_price) }}" step="0.001" min="0.001" required>
                @if($errors->has('sell_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sell_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.sell_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="min_sell_price">{{ trans('cruds.product.fields.min_sell_price') }}</label>
                <input class="form-control {{ $errors->has('min_sell_price') ? 'is-invalid' : '' }}" type="number" name="min_sell_price" id="min_sell_price" value="{{ old('min_sell_price', $product->min_sell_price) }}" step="0.001" min="0.000" >
                @if($errors->has('min_sell_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min_sell_price') }}
                    </div>
                @endif
            </div>



            <div class="form-group">
                <label class="" for="max_sell_price">{{ trans('cruds.product.fields.max_sell_price') }}</label>
                <input class="form-control {{ $errors->has('max_sell_price') ? 'is-invalid' : '' }}" type="number" name="max_sell_price" id="max_sell_price" value="{{ old('max_sell_price', $product->max_sell_price) }}" step="0.001" min="0.000" >
                @if($errors->has('max_sell_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_sell_price') }}
                    </div>
                @endif
            </div>









            <br>
            <h4 style="text-align: center">
                {{ trans('global.buy_price_configuration') }}
            </h4>
            <br>
            <div class="form-group">
                <label class="required" for="buy_price">{{ trans('cruds.product.fields.buy_price') }}</label>
                <input class="form-control {{ $errors->has('buy_price') ? 'is-invalid' : '' }}" type="number" name="buy_price" id="buy_price" value="{{ old('buy_price', $product->buy_price) }}" step="0.001" min="0.001" required>
                @if($errors->has('buy_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('buy_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.buy_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="min_buy_price">{{ trans('cruds.product.fields.min_buy_price') }}</label>
                <input class="form-control {{ $errors->has('min_buy_price') ? 'is-invalid' : '' }}" type="number" name="min_buy_price" id="min_buy_price" value="{{ old('min_buy_price', $product->min_buy_price) }}" step="0.001" min="0.000" >
                @if($errors->has('min_buy_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('min_buy_price') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="" for="max_buy_price">{{ trans('cruds.product.fields.max_buy_price') }}</label>
                <input class="form-control {{ $errors->has('max_buy_price') ? 'is-invalid' : '' }}" type="number" name="max_buy_price" id="max_buy_price" value="{{ old('max_buy_price', $product->max_buy_price) }}" step="0.001" min="0.000" >
                @if($errors->has('max_buy_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('max_buy_price') }}
                    </div>
                @endif
            </div>







            <div class="form-group">
                <label for="loyal_points">{{ trans('cruds.product.fields.loyal_points') }}</label>
                <input class="form-control {{ $errors->has('loyal_points') ? 'is-invalid' : '' }}" type="number" name="loyal_points" id="loyal_points" value="{{ old('loyal_points', $product->loyal_points) }}" step="1"  min="0">
                @if($errors->has('loyal_points'))
                <div class="invalid-feedback">
                    {{ $errors->first('loyal_points') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.loyal_points_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $product->description) !!}</textarea>
                @if($errors->has('description'))
                <div class="invalid-feedback">
                    {{ $errors->first('description') }}
                </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>

            {{-- <div class="form-group">
                <label class="required" for="quantity">{{ trans('cruds.product.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', $product->quantity) }}" step="0.1"  min="0" required>
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.quantity_helper') }}</span>
            </div> --}}



            <br>
            <h4 style="text-align: center">
                {{ trans('global.quantities_settings') }}
            </h4>



            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>{{trans('global.target_branch')}}</th>
                        <th>{{trans('global.quantity')}}</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>





            <div class="form-group">
                <label class="required" for="barcode">{{ trans('cruds.product.fields.barcode') }}</label>
                <input class="form-control {{ $errors->has('barcode') ? 'is-invalid' : '' }}" type="text" name="barcode" id="barcode" value="{{ old('barcode', $product->barcode) }}" required>
                @if($errors->has('barcode'))
                    <div class="invalid-feedback">
                        {{ $errors->first('barcode') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.barcode_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.products.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $product->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection
