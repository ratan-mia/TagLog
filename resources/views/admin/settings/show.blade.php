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
                            {{ trans('cruds.setting.fields.name') }}
                        </th>
                        <td>
                            {{ $setting->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.email') }}
                        </th>
                        <td>
                            {{ $setting->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.phone') }}
                        </th>
                        <td>
                            {{ $setting->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.url') }}
                        </th>
                        <td>
                            {{ $setting->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.address') }}
                        </th>
                        <td>
                            {!! $setting->address !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.logo') }}
                        </th>
                        <td>
                            @if($setting->logo)
                                <a href="{{ $setting->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $setting->logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.philosophy_title') }}
                        </th>
                        <td>
                            {{ $setting->philosophy_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.philosophy_sentence') }}
                        </th>
                        <td>
                            {!! $setting->philosophy_sentence !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.philosophy_image') }}
                        </th>
                        <td>
                            @if($setting->philosophy_image)
                                <a href="{{ $setting->philosophy_image->getUrl() }}" target="_blank">
                                    <img src="{{ $setting->philosophy_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.business_title') }}
                        </th>
                        <td>
                            {{ $setting->business_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.business_sentence') }}
                        </th>
                        <td>
                            {{ $setting->business_sentence }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.business_image') }}
                        </th>
                        <td>
                            @if($setting->business_image)
                                <a href="{{ $setting->business_image->getUrl() }}" target="_blank">
                                    <img src="{{ $setting->business_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.slider') }}
                        </th>
                        <td>
                            @foreach($setting->slider as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
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