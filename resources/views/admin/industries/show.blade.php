@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.industry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.industries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.id') }}
                        </th>
                        <td>
                            {{ $industry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.name') }}
                        </th>
                        <td>
                            {{ $industry->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.description') }}
                        </th>
                        <td>
                            {!! $industry->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.minimum_salary') }}
                        </th>
                        <td>
                            {{ $industry->minimum_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.maximum_salary') }}
                        </th>
                        <td>
                            {{ $industry->maximum_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.education_level') }}
                        </th>
                        <td>
                            {{ App\Industry::EDUCATION_LEVEL_SELECT[$industry->education_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.training_level') }}
                        </th>
                        <td>
                            {{ App\Industry::TRAINING_LEVEL_SELECT[$industry->training_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.language_course') }}
                        </th>
                        <td>
                            {{ App\Industry::LANGUAGE_COURSE_RADIO[$industry->language_course] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.language_course_level') }}
                        </th>
                        <td>
                            {{ App\Industry::LANGUAGE_COURSE_LEVEL_SELECT[$industry->language_course_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.icon') }}
                        </th>
                        <td>
                            @if($industry->icon)
                                <a href="{{ $industry->icon->getUrl() }}" target="_blank">
                                    <img src="{{ $industry->icon->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.logo') }}
                        </th>
                        <td>
                            @if($industry->logo)
                                <a href="{{ $industry->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $industry->logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.banner_titile') }}
                        </th>
                        <td>
                            {{ $industry->banner_titile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.banner_image') }}
                        </th>
                        <td>
                            @if($industry->banner_image)
                                <a href="{{ $industry->banner_image->getUrl() }}" target="_blank">
                                    <img src="{{ $industry->banner_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.banner_text') }}
                        </th>
                        <td>
                            {!! $industry->banner_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.gallery') }}
                        </th>
                        <td>
                            @foreach($industry->gallery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.sliders') }}
                        </th>
                        <td>
                            @foreach($industry->sliders as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.industries.index') }}">
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
            <a class="nav-link" href="#indurstry_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#industry_experiences" role="tab" data-toggle="tab">
                {{ trans('cruds.experience.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#industry_agents" role="tab" data-toggle="tab">
                {{ trans('cruds.agent.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#industries_employers" role="tab" data-toggle="tab">
                {{ trans('cruds.employer.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#industries_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="indurstry_users">
            @includeIf('admin.industries.relationships.indurstryUsers', ['users' => $industry->indurstryUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="industry_experiences">
            @includeIf('admin.industries.relationships.industryExperiences', ['experiences' => $industry->industryExperiences])
        </div>
        <div class="tab-pane" role="tabpanel" id="industry_agents">
            @includeIf('admin.industries.relationships.industryAgents', ['agents' => $industry->industryAgents])
        </div>
        <div class="tab-pane" role="tabpanel" id="industries_employers">
            @includeIf('admin.industries.relationships.industriesEmployers', ['employers' => $industry->industriesEmployers])
        </div>
        <div class="tab-pane" role="tabpanel" id="industries_users">
            @includeIf('admin.industries.relationships.expectedIndustriesUsers', ['users' => $industry->expectedIndustriesUsers])
        </div>
    </div>
</div>

@endsection
