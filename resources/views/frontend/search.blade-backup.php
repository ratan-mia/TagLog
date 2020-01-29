@extends('layouts.master')

@section('content')

<section class="page-search">
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

<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Results</h2>
					<p>{{ $agents->count() }} Results</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                        <ul class="category-list">
                            @foreach ( $categories_all as $category_all)
                                <li><a href="{{ route('category', [$category_all->id]) }} ">{{ $category_all->name}} <span>{{$category_all->companies->count()}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
				</div>
			</div>
            <div class="col-md-9">
				<div class="product-grid-list">
					<div class="row mt-30">
                        @if (count($companies) > 0)
                            @foreach ($companies as $company)
                                <div class="col-sm-12 col-lg-4 col-md-6">

                                    <!-- product card -->

                                    <div class="product-item bg-light">
                                        <div class="card">
                                            <div class="thumb-content">
                                                @if($company->logo)<a href="{{ route('company', [$company->id]) }}"><img class="card-img-top img-fluid" src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $company->logo) }}"/></a>@endif
                                            </div>
                                            <div class="card-body">
                                                <h4 class="card-title"><a href="{{ route('company', [$company->id]) }}">{{$company->name}}</a></h4>
                                                @foreach ($company->categories as $singleCategories)
                                                    <ul class="list-inline product-meta">
                                                        <li class="list-inline-item">
                                                            <a href="{{ route('category', [$singleCategories->id]) }}"><i class="fa fa-folder-open-o"></i>{{ $singleCategories->name }}</a>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                <p class="card-text">{{ substr($company->description, 0, 100) }}...</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
				</div>
            {{ $companies->appends(request()->all())->links() }}
			</div>
		</div>
	</div>
</section>


@stop
