@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.branch.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.branches.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="branch_id">{{ trans('cruds.branch.fields.branch_id') }}</label>
                <input class="form-control {{ $errors->has('branch_id') ? 'is-invalid' : '' }}" type="number" name="branch_id" id="branch_id" value="{{ old('branch_id', '') }}" step="1">
                @if($errors->has('branch_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('branch_id') }}
                    </div>
                @endif
                
            </div>
            
            <div class="form-group">
                <label for="branch_name">{{ trans('cruds.branch.branch_name') }}</label>
                <input class="form-control {{ $errors->has('branch_name') ? 'is-invalid' : '' }}" type="text" name="branch_name" id="branch_name" value="{{ old('branch_name', '') }}">
                @if($errors->has('branch_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('branch_name') }}
                    </div>
                @endif
                
            </div>

            <div class="form-group">
    <label for="city">{{ trans('cruds.branch.fields.city') }}</label>
    <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
    @if($errors->has('city'))
        <div class="invalid-feedback">
            {{ $errors->first('city') }}
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
