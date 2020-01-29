@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.id') }}
                        </th>
                        <td>
                            {{ $employer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.name') }}
                        </th>
                        <td>
                            {{ $employer->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.email') }}
                        </th>
                        <td>
                            {{ $employer->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.phone') }}
                        </th>
                        <td>
                            {{ $employer->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.address') }}
                        </th>
                        <td>
                            {!! $employer->address !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.description') }}
                        </th>
                        <td>
                            {!! $employer->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.recruiting_workers') }}
                        </th>
                        <td>
                            {{ $employer->recruiting_workers }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.countries') }}
                        </th>
                        <td>
                            @foreach($employer->countries as $key => $countries)
                                <span class="label label-info">{{ $countries->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.agents') }}
                        </th>
                        <td>
                            @foreach($employer->agents as $key => $agents)
                                <span class="label label-info">{{ $agents->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.industries') }}
                        </th>
                        <td>
                            @foreach($employer->industries as $key => $industries)
                                <span class="label label-info">{{ $industries->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.monthly_salary') }}
                        </th>
                        <td>
                            {{ $employer->monthly_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.working_hours') }}
                        </th>
                        <td>
                            {{ $employer->working_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.days_off') }}
                        </th>
                        <td>
                            {{ $employer->days_off }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.logo') }}
                        </th>
                        <td>
                            @if($employer->logo)
                                <a href="{{ $employer->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $employer->logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.banner_titile') }}
                        </th>
                        <td>
                            {{ $employer->banner_titile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.banner_image') }}
                        </th>
                        <td>
                            @if($employer->banner_image)
                                <a href="{{ $employer->banner_image->getUrl() }}" target="_blank">
                                    <img src="{{ $employer->banner_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.banner_text') }}
                        </th>
                        <td>
                            {!! $employer->banner_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.gallery') }}
                        </th>
                        <td>
                            @foreach($employer->gallery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employer.fields.sliders') }}
                        </th>
                        <td>
                            @foreach($employer->sliders as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#employer_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#agents_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#employer_experiences" role="tab" data-toggle="tab">
                {{ trans('cruds.experience.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="employer_users">
            @includeIf('admin.employers.relationships.employers', ['users' => $employer->employers])
        </div>
        <div class="tab-pane" role="tabpanel" id="agents_users">
            @includeIf('admin.employers.relationships.users', ['users' => $employer->users])
        </div>
        <div class="tab-pane" role="tabpanel" id="employer_experiences">
            @includeIf('admin.employers.relationships.experiences', ['experiences' => $employer->experiences])
        </div>
    </div>
</div>

@endsection
