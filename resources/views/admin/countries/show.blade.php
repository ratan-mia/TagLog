@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.country.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.countries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.id') }}
                        </th>
                        <td>
                            {{ $country->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.name') }}
                        </th>
                        <td>
                            {{ $country->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.short_code') }}
                        </th>
                        <td>
                            {{ $country->short_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.language') }}
                        </th>
                        <td>
                            {{ App\Country::LANGUAGE_SELECT[$country->language] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.currency') }}
                        </th>
                        <td>
                            {{ App\Country::CURRENCY_SELECT[$country->currency] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.religion') }}
                        </th>
                        <td>
                            {{ $country->religion }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.description') }}
                        </th>
                        <td>
                            {!! $country->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.safe_food') }}
                        </th>
                        <td>
                            {{ App\Country::SAFE_FOOD_RADIO[$country->safe_food] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.food') }}
                        </th>
                        <td>
                            {!! $country->food !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.safe_medicine') }}
                        </th>
                        <td>
                            {{ App\Country::SAFE_MEDICINE_RADIO[$country->safe_medicine] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.health_insurance') }}
                        </th>
                        <td>
                            {!! $country->health_insurance !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.healthcare') }}
                        </th>
                        <td>
                            {!! $country->healthcare !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.taxi_available') }}
                        </th>
                        <td>
                            {{ App\Country::TAXI_AVAILABLE_RADIO[$country->taxi_available] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.transport') }}
                        </th>
                        <td>
                            {!! $country->transport !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.culture') }}
                        </th>
                        <td>
                            {!! $country->culture !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.politics') }}
                        </th>
                        <td>
                            {!! $country->politics !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.flag') }}
                        </th>
                        <td>
                            @if($country->flag)
                                <a href="{{ $country->flag->getUrl() }}" target="_blank">
                                    <img src="{{ $country->flag->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.gallery') }}
                        </th>
                        <td>
                            @foreach($country->gallery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.country.fields.additional_files') }}
                        </th>
                        <td>
                            @foreach($country->additional_files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.countries.index') }}">
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
            <a class="nav-link" href="#country_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#destination_country_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#destination_country_experiences" role="tab" data-toggle="tab">
                {{ trans('cruds.experience.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#destination_agents" role="tab" data-toggle="tab">
                {{ trans('cruds.agent.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#countries_employers" role="tab" data-toggle="tab">
                {{ trans('cruds.employer.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="country_users">
            @includeIf('admin.countries.relationships.countryUsers', ['users' => $country->countryUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="destination_country_users">
            @includeIf('admin.countries.relationships.destinationCountryUsers', ['users' => $country->destinationCountryUsers])
        </div>
        <div class="tab-pane" role="tabpanel" id="destination_country_experiences">
            @includeIf('admin.countries.relationships.destinationCountryExperiences', ['experiences' => $country->destinationCountryExperiences])
        </div>
        <div class="tab-pane" role="tabpanel" id="destination_agents">
            @includeIf('admin.countries.relationships.destinationAgents', ['agents' => $country->destinationAgents])
        </div>
        <div class="tab-pane" role="tabpanel" id="countries_employers">
            @includeIf('admin.countries.relationships.countriesEmployers', ['employers' => $country->countriesEmployers])
        </div>
    </div>
</div>

@endsection