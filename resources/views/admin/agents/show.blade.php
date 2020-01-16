@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.id') }}
                        </th>
                        <td>
                            {{ $agent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.name') }}
                        </th>
                        <td>
                            {{ $agent->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.address') }}
                        </th>
                        <td>
                            {!! $agent->address !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.email') }}
                        </th>
                        <td>
                            {{ $agent->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.phone') }}
                        </th>
                        <td>
                            {{ $agent->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.map') }}
                        </th>
                        <td>
                            {{ $agent->map }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.interview_period') }}
                        </th>
                        <td>
                            {{ App\Agent::INTERVIEW_PERIOD_SELECT[$agent->interview_period] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.total_expense') }}
                        </th>
                        <td>
                            {{ $agent->total_expense }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.language_level') }}
                        </th>
                        <td>
                            {{ App\Agent::LANGUAGE_LEVEL_SELECT[$agent->language_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.destination') }}
                        </th>
                        <td>
                            @foreach($agent->destinations as $key => $destination)
                                <span class="label label-info">{{ $destination->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.industry') }}
                        </th>
                        <td>
                            @foreach($agent->industries as $key => $industry)
                                <span class="label label-info">{{ $industry->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.employers') }}
                        </th>
                        <td>
                            @foreach($agent->employers as $key => $employers)
                                <span class="label label-info">{{ $employers->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.leaving_period') }}
                        </th>
                        <td>
                            {{ App\Agent::LEAVING_PERIOD_SELECT[$agent->leaving_period] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.workers_sent') }}
                        </th>
                        <td>
                            {{ $agent->workers_sent }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.logo') }}
                        </th>
                        <td>
                            @if($agent->logo)
                                <a href="{{ $agent->logo->getUrl() }}" target="_blank">
                                    <img src="{{ $agent->logo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.banner_titile') }}
                        </th>
                        <td>
                            {{ $agent->banner_titile }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.banner_image') }}
                        </th>
                        <td>
                            @if($agent->banner_image)
                                <a href="{{ $agent->banner_image->getUrl() }}" target="_blank">
                                    <img src="{{ $agent->banner_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.banner_text') }}
                        </th>
                        <td>
                            {!! $agent->banner_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agent.fields.sliders') }}
                        </th>
                        <td>
                            @foreach($agent->sliders as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agents.index') }}">
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
            <a class="nav-link" href="#agent_experiences" role="tab" data-toggle="tab">
                {{ trans('cruds.experience.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#agents_employers" role="tab" data-toggle="tab">
                {{ trans('cruds.employer.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="agent_experiences">
            @includeIf('admin.agents.relationships.experiences', ['experiences' => $agent->experiences])
        </div>
        <div class="tab-pane" role="tabpanel" id="agents_employers">
            @includeIf('admin.agents.relationships.employers', ['employers' => $agent->employers])
        </div>
    </div>
</div>

@endsection
