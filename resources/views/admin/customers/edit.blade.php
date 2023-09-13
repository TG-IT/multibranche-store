@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.update", [$customer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="id_national">{{ trans('cruds.customer.fields.id_national') }}</label>
                <input class="form-control {{ $errors->has('id_national') ? 'is-invalid' : '' }}" type="number" name="id_national" id="id_national" value="{{ old('id_national', $customer->id_national) }}" step="1">
                @if($errors->has('id_national'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_national') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.id_national_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="full_name">{{ trans('cruds.customer.fields.full_name') }}</label>
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', $customer->full_name) }}" required>
                @if($errors->has('full_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('full_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.customer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $customer->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loyal_points">{{ trans('cruds.customer.fields.loyal_points') }}</label>
                <input class="form-control {{ $errors->has('loyal_points') ? 'is-invalid' : '' }}" type="number" name="loyal_points" id="loyal_points" value="{{ old('loyal_points', $customer->loyal_points) }}" step="1">
                @if($errors->has('loyal_points'))
                    <div class="invalid-feedback">
                        {{ $errors->first('loyal_points') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.loyal_points_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.customer.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $customer->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.address_helper') }}</span>
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
