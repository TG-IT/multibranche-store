@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <td>
                            {{ $setting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.system_title') }}
                        </th>
                        <td>
                            {{ $setting->system_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.system_logo') }}
                        </th>
                        <td>
                            @if($setting->system_logo)
                                <a href="{{ $setting->system_logo->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection