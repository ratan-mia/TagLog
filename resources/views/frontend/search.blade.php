@extends('layouts.master')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
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
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-result bg-gray">
                        <h2>Results</h2>
                        <p>{{ $agents->count() }} Results</p>
                        @if (count($agents) > 0)
                            @foreach ($agents as $agent)
                                <div class="agent-container">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="thumb-content">
                                                @if($agent->logo)<a href="{{ route('agent', [$agent->id]) }}"><img
                                                        class="card-img-top img-fluid"
                                                        src="{{ $agent->logo->getUrl() }}"></a>@endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h6 class="title-attr">Company Name: <span><a href="{{ route('agent', [$agent->id]) }}">{{$agent->name}}</a></span></h6>
                                            <p class="title-attr">Address:<span>{{$agent->address}}</span></p>
                                            <br>
                                            <h3 class="sub-title-attr">Overview</h3>
                                            {!! substr($agent->overview, 0, 100) !!}...
                                        </div>
                                        <div class="col-md-4">
                                            <div class="visa-type">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h4 class="title-attr">Visa Type</h4></div>
                                                    <div class="col-md-9">
                                                        <ul>
                                                            @foreach($agent->visas as $visa)
                                                                <li class="visa-type-item">{{$visa->name}}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <hr class="horizontal-line">
                                                <h4 class="title-attr">Employer's Industry from Taglog User</h4>
                                                <ul>
                                                    @foreach($agent->employers as $employer)
                                                        {{--                                                <li class="industry-type-item">{{$employer->name}}</li>--}}
                                                        <ul class="list-inline">
                                                            @foreach($employer->industries as $industry)
                                                                <li class="list-inline-item industry-type-item"><a
                                                                        href="{{ route('industry', [$industry->id]) }}">{{ $industry->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                    @endforeach
                                                </ul>
                                                <p class="text-right"><a class="link-cta"
                                                                         href="{{ route('agent', [$agent->id]) }}">&gt;See
                                                        Individual Review</a></p>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                    </div>
                </div>
            </div>
        {{ $agents->appends(request()->all())->links() }}

    </section>
@stop
