@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.branch.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.branches.update", [$branch->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="branch_name">{{ trans('cruds.branch.branch_name') }}</label>
                <input class="form-control {{ $errors->has('branch_name') ? 'is-invalid' : '' }}" type="text" name="branch_name" id="branch_name" value="{{ old('branch_name', $branch->branch_name) }}">
                @if($errors->has('branch_name'))
                    <span class="text-danger">{{ $errors->first('branch_name') }}</span>
                @endif
                
            </div>
            <div class="form-group">
                <label for="branch_id">{{ trans('cruds.branch.fields.branch_id') }}</label>
                <input class="form-control {{ $errors->has('branch_id') ? 'is-invalid' : '' }}" type="text" name="branch_id" id="branch_id" value="{{ old('branch_id', $branch->branch_id) }}">
                @if($errors->has('branch_id'))
                    <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                @endif
                
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.branch.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $branch->city) }}">
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
               
            </div>
            <div class="form-group">
                <button class="btn btn-save" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
