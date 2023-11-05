@extends('layouts.admin')

@section('content')
@can('product_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.products.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.product.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.product.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Product">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.product.fields.id') }}</th>
                        <th>{{ trans('cruds.product.fields.product_categorie') }}</th>
                        <th>{{ trans('cruds.product.fields.titel') }}</th>
                        <th>{{ trans('cruds.product.fields.barcode') }}</th>
                        <th>{{ trans('cruds.product.fields.quantity') }}</th>
                        <th>{{ trans('cruds.product.fields.branch_name') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($product_categories as $key => $item)
                                    <option value="{{ $item->title }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input class "search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td><input class="search" type="text" placeholder="{{ trans('global.search') }}"></td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($branches as $key => $item)
                                    <option value="{{ $item->branch_name }}">{{ $item->branch_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr data-entry-id="{{ $product->id }}">
                            <td></td>
                            <td>{{ $product->id ?? '' }}</td>
                            <td>{{ $product->product_categorie->title ?? '' }}</td>
                            <td>{{ $product->titel ?? '' }}</td>
                            <td>{{ $product->barcode ?? '' }}</td>
                            <td>{{ $product->quantity ?? '' }}</td>
                            <td>{{ $product->branch->branch_name ?? '' }}</td>
                            <td></td>
                            

                            <td>
                                @can('product_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.products.show', $product->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('product_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.products.edit', $product->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('product_delete')
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
