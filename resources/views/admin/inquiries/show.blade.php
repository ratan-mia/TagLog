@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.inquiry.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.inquiries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.id') }}
                        </th>
                        <td>
                            {{ $inquiry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.user') }}
                        </th>
                        <td>
                            {{ $inquiry->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.agent') }}
                        </th>
                        <td>
                            {{ $inquiry->agent->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.name') }}
                        </th>
                        <td>
                            {{ $inquiry->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.country') }}
                        </th>
                        <td>
                            {{ $inquiry->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.address') }}
                        </th>
                        <td>
                            {{ $inquiry->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inquiry.fields.inquiry') }}
                        </th>
                        <td>
                            {{ $inquiry->inquiry }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.inquiries.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
