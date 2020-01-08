@extends('layouts.master')

@section('content')

    <!--===============================
=            Hero Area            =
================================-->

    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Buy & Sell Near You </h1>
                        <p>Join the millions who buy and sell from each other <br> everyday in local communities around
                            the world</p>
                    </div>
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <p style="text-align: left;">Find Sending Organizations in your area</p>
                        <form action="{{ route('search') }}" method="GET">

                            <div class="form-row">
                                <div class="form-group col-md-2 offset-md-1">
                                    {{-- <label>{{ trans('cruds.user.fields.destination_id') }}</label>--}}
                                    <select class="form-control {{ $errors->has('destination_id') ? 'is-invalid' : '' }}"
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

                    {{--                <!-- Advance Search  2-->--}}
                    {{--                <div class="advance-search">--}}
                    {{--                    <p style="text-align: left;">Find Employers in Japan</p>--}}
                    {{--                    <form action="{{ route('search') }}" method="GET">--}}

                    {{--                        <div class="form-row">--}}

                    {{--                            <div class="form-group col-md-3">--}}

                    {{--                                <input type="text" name="destination" value="{{ old('destination') }}" class="form-control" placeholder="Destination" />--}}
                    {{--                                <p class="help-block"></p>--}}
                    {{--                                @if($errors->has('name'))--}}
                    {{--                                    <p class="help-block">--}}
                    {{--                                        {{ $errors->first('name') }}--}}
                    {{--                                    </p>--}}
                    {{--                                @endif--}}
                    {{--                            </div>--}}

                    {{--                            <div class="form-group col-md-3">--}}

                    {{--                                <input type="text" name="visa" value="{{ old('visa') }}" class="form-control" placeholder="Visa Type" />--}}
                    {{--                                <p class="help-block"></p>--}}
                    {{--                                @if($errors->has('name'))--}}
                    {{--                                    <p class="help-block">--}}
                    {{--                                        {{ $errors->first('name') }}--}}
                    {{--                                    </p>--}}
                    {{--                                @endif--}}
                    {{--                            </div>--}}


                    {{--                            <div class="form-group col-md-">--}}
                    {{--                                <select name="categories" class="form-control form-control-lg" placeholder="Category">--}}
                    {{--                                    @foreach ($errors as $category)--}}
                    {{--                                        <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                                </select>--}}
                    {{--                                <p class="help-block"></p>--}}
                    {{--                                @if($errors->has('categories'))--}}
                    {{--                                    <p class="help-block">--}}
                    {{--                                        {{ $errors->first('categories') }}--}}
                    {{--                                    </p>--}}
                    {{--                                @endif--}}
                    {{--                            </div>--}}

                    {{--                            <div class="form-group col-md-2">--}}
                    {{--                                <select name="city_id" class="form-control form-control-lg" placeholder="City">--}}
                    {{--                                    @foreach ($search_cities ?? '' as $city)--}}
                    {{--                                        <option value="{{ $city->id }}">{{ $city->name }}</option>--}}
                    {{--                                    @endforeach--}}
                    {{--                                </select>--}}
                    {{--                                <p class="help-block"></p>--}}
                    {{--                                @if($errors->has('city_id'))--}}
                    {{--                                    <p class="help-block">--}}
                    {{--                                        {{ $errors->first('city_id') }}--}}
                    {{--                                    </p>--}}
                    {{--                                @endif--}}
                    {{--                            </div>--}}


                    {{--                            <div class="form-group col-md-2">--}}
                    {{--                                <button type="submit"--}}
                    {{--                                        class="btn btn-main">--}}
                    {{--                                    Search Now--}}
                    {{--                                </button>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                    </form>--}}

                    {{--                </div>--}}

                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


    <!--==========================================
    =            All Category Section            =
    ===========================================-->

    <section class=" section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section title -->
                    <div class="section-title">
                        <h2>All Categories</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
                    </div>
                    <div class="row">
                    @foreach ($categories_all->take(8) as $category_all)
                        <!-- Category list -->
                            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                                <div class="category-block">
                                    <div class="header">
                                        <i class="{{ $category_all->icon }} icon-bg-{{ $category_all->id }}"></i>
                                        <h4>
                                            <a href="{{ route('category', [$category_all->id]) }}">{{ $category_all->name }}
                                                <p style="display: inline">({{ $category_all->companies->count() }})</p>
                                            </a>

                                        </h4>
                                    </div>
                                    <ul class="category-list">
                                        @foreach ( $category_all->companies->shuffle()->take(4) as $singleCompany)
                                            <li>
                                                <a href="{{ route('company', [$singleCompany->id]) }}">{{ $singleCompany->name}} </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> <!-- /Category List -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


@stop
