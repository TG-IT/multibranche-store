@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.expanse.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expanses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.expanse.fields.id') }}
                        </th>
                        <td>
                            {{ $expanse->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expanse.fields.title') }}
                        </th>
                        <td>
                            {{ $expanse->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expanse.fields.expensecategory') }}
                        </th>
                        <td>
                            {{ $expanse->expensecategory->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expanse.fields.price') }}
                        </th>
                        <td>
                            {{ $expanse->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expanse.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Expanse::TYPE_SELECT[$expanse->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expanse.fields.description') }}
                        </th>
                        <td>
                            {{ $expanse->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.expanse.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($expanse->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.expanses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection