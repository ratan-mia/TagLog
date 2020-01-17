@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="advance-search">
                        <h4 class="search-title">Find Sending Organizations in your area</h4>
                        <form action="{{ route('search') }}" method="GET">

                            <div class="form-row">
                                <div class="form-group col-md-2 offset-md-1">
                                    {{-- <label>{{ trans('cruds.user.fields.destination_id') }}</label>--}}
                                    <select
                                        class="form-control {{ $errors->has('destination_id') ? 'is-invalid' : '' }}"
                                        name="destination_id" id="destination_id">
                                        {{--                                        <option value--}}
                                        {{--                                                disabled {{ old('destination_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>--}}
                                        @foreach($destinations as $key => $label)
                                            <option
                                                value="{{ $key }}" {{ old('destination_id', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('destination_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('destination_id') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-md-2">
                                    {{--                                    <label>{{ trans('cruds.user.fields.visa_type') }}</label>--}}
                                    <select class="form-control {{ $errors->has('visa_type') ? 'is-invalid' : '' }}"
                                            name="visa_type" id="visa_type">
                                        {{--                                        <option value--}}
                                        {{--                                                disabled {{ old('visa_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>--}}
                                        @foreach($visas as $key => $label)
                                            <option
                                                value="{{ $key }}" {{ old('visa_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('visa_type'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('visa_type') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="form-group col-md-2">
                                    {{-- <label>{{ trans('cruds.user.fields.country_id') }}</label>--}}
                                    <select class="form-control {{ $errors->has('country_id') ? 'is-invalid' : '' }}"
                                            name="country_id" id="country_id">
                                        {{--                                        <option value--}}
                                        {{--                                                disabled {{ old('country_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>--}}
                                        @foreach($countries as $key => $label)
                                            <option
                                                value="{{ $key }}" {{ old('country_id', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('country_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country_id') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group col-md-2">
                                    {{--                                     <label>{{ trans('cruds.user.fields.city_id') }}</label>--}}
                                    <select class="form-control {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                                            name="city_id" id="city_id">
                                        {{--                                        <option value--}}
                                        {{--                                                disabled {{ old('city_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>--}}
                                        @foreach($cities as $key => $label)
                                            <option
                                                value="{{ $key }}" {{ old('city_id', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('city_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('city_id') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="form-group col-md-2">
                                    <button type="submit"
                                            class="btn btn-main">
                                        Search Now
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->


                    <!--===================================
        =            Agent Header Section            =
        ==================================-->
                    <section class="section bg-gray">
                        <!-- Container Start -->
                        <div class="container">
                            <div class="row">
                                <!-- Banner Image -->
                                <div class="col-md-7">
                                    <div class="organization-header">
                                        @if($agent->banner_image)
                                            <a href="{{ $agent->banner_image->getUrl() }}" target="_blank">
                                                <img src="{{ $agent->banner_image->getUrl() }}" width="100%"
                                                     height="auto">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <!--Side Info-->
                                <div class="col-md-5">
                                    <h3 class="title">{{ $agent->name }}</h3>
                                    <p>{{ $agent->address}}</p>
                                    <h3 class="sub-title">Overview</h3>
                                    <p class="paragraph">{!! $agent->overview !!}</p>
                                    <hr class="horizontal-line">
                                    <div class="visa-type">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p style="text-align: center;">Visa Type</p></div>
                                            <div class="col-md-9">
                                                <ul>
                                                    @foreach($agent->visas as $visa)
                                                        <li class="visa-type-item">{{$visa->name}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <hr class="horizontal-line">
                                        <h4 class="sub-title">Employer's Industry from Taglog User</h4>
                                        <ul>
                                            @foreach($agent->employers as $employer)
                                                {{--                                                <li class="industry-type-item">{{$employer->name}}</li>--}}
                                                <ul>
                                                    @foreach($employer->industries as $industry)
                                                        <li class="industry-type-item">{{$industry->name}}</li>
                                                    @endforeach
                                                </ul>

                                            @endforeach
                                        </ul>

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    @foreach($agent->locations as $location)
                                        <iframe
                                            width="100%"
                                            height="auto"
                                            frameborder="0"
                                            scrolling="no"
                                            marginheight="0"
                                            marginwidth="0"
                                            src="https://www.google.com/maps/embed/v1/place?q={{$location->latitude}},{{$location->longitude}}&amp;key=AIzaSyC4seHvysGcv7ppFOPF0jNDRbVr97NuG0Y">

                                        </iframe>
                                        <br/>
                                        {{--                                        <small>--}}
                                        {{--                                            <a href='"https://www.google.com/maps/@".{{$location->latitude}}.",."{{$location->longitude}}.",15z"'--}}
                                        {{--                                                style="color:#0000FF;text-align:left"--}}
                                        {{--                                                target="_blank"--}}
                                        {{--                                            >--}}
                                        {{--                                                See map bigger--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </small>--}}

                                    @endforeach
                                </div>

                                <div class="col-md-6">

                                    <h3 class="sub-title">Individual Reviews<span
                                            style="color:#00aced;font-style: italic;">( {{$agent->experiences->count()}} found )</span>
                                    </h3>

                                    @foreach($agent->experiences as $experience)
                                        <div class="single-review">
                                            <p class="paragraph font-italic">"{{$experience->agent_feedback}}"</p>
                                            <div class="review-stars">
                                                <p class="paragraph">Visa Application Process
                                                    @php $remain_stars = 5 - $experience->visa_application_rating; @endphp
                                                    @for ($i = 0; $i < $experience->visa_application_rating; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = 0; $i < $remain_stars; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor
                                                    <span style="margin-left: 10px;">Language Training Course</span>
                                                    @php $remain_stars2 = 5 - $experience->language_training_rating; @endphp
                                                    @for ($i = 0; $i < $experience->language_training_rating; $i++)
                                                        <span class="fa fa-star checked"></span>
                                                    @endfor
                                                    @for ($i = 0; $i < $remain_stars2; $i++)
                                                        <span class="fa fa-star"></span>
                                                    @endfor

                                                </p>

                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    <p class="reviewer-attr">Reviewer ID: <span>{{$experience->user->id}}</span></p>
                                    <p class="reviewer-attr">Date of birth: <span>{{$experience->user->date_of_birth}}</span></p>
                                    <p class="reviewer-attr">Gender: <span>{{$experience->user->gender}}</span></p>
                                    <p class="reviewer-attr">Education: <span>{{$experience->user->education_level}}</span></p>
                                    <p class="reviewer-attr">Language: <span>{{$experience->user->language_level}}</span></p>
                                    <p class="reviewer-attr">Industry: <span>{{$experience->industry->name}}</span></p>
                                </div>
                                @php
                                    echo '<pre>';
                                    var_dump($experience->user);
                                     echo '</pre>';
                                @endphp


                                @endforeach
                            </div>
                        </div>
                </div>
                <!-- Container End -->
    </section>

@stop
