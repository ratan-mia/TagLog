@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.partner.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.partners.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.id') }}
                        </th>
                        <td>
                            {{ $partner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.country') }}
                        </th>
                        <td>
                            {{ $partner->country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.company') }}
                        </th>
                        <td>
                            {{ $partner->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.address') }}
                        </th>
                        <td>
                            {!! $partner->address !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.details') }}
                        </th>
                        <td>
                            {!! $partner->details !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.logo') }}
                        </th>
                        <td>
                            @if($partner->logo)
                                <a href="{{ $partner->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $partner->logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.partner.fields.banner') }}
                        </th>
                        <td>
                            @if($partner->banner)
                                <a href="{{ $partner->banner->getUrl() }}" target="_blank">
                                    <img src="{{ $partner->banner->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.partners.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



    @endsection
