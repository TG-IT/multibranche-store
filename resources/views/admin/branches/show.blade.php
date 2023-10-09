@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.view') }} {{ trans('cruds.branch.title_singular') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.id') }}
                    </th>
                    <td>
                        {{ $branch->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.branch_name') }}
                    </th>
                    <td>
                        {{ $branch->branch_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.branch.fields.branch_id') }}
                    </th>
                    <td>
                        {{ $branch->branch_id }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
