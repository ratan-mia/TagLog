
@extends('layouts.master')
@section('content')

    <!--===============================
=            Banner Area           =
================================-->

    <section class="hero-area bg-what-we-do text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div id="taglog" class="content-block">
                        {{-- <h1 class="title">TAGLOG</h1>--}}
                        <h2 class="title">Inquiry</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!-- SECTIONS
        ================================================== -->
    <section id="contact-info">
        <div class="container">
            <div class="row justify-content-center">
                @if(!empty($setting))
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-info-block text-center">
                        <i class="pe-7s-mail"></i>
                        <h4>Email</h4>
                        <p class="lead">{!! $setting->email !!}</p>
                    </div>
                </div>
                    <div class="col-lg-4 col-sm-6 col-md-6">
                        <div class="contact-info-block text-center">
                            <i class="pe-7s-map-marker"></i>
                            <h4>Address</h4>
                            <p class="lead">{!! $setting->address !!}</p>
                        </div>
                    </div>
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="contact-info-block text-center">
                        <i class="pe-7s-phone"></i>
                        <h4>Phone Number</h4>
                        <p class="lead">{!! $setting->phone !!}</p>
                    </div>
                </div>
                    @endif
            </div>
        </div>
    </section>

    <section class="section" id="contact">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8 col-lg-6 offset-3">
                    <!-- Heading -->
                    <h2 class="section-title mb-2 ">
                        Leave a <span class="font-weight-normal">inquiry</span>
                    </h2>
                    <!-- Subheading -->
                    <p class="text-center ">
                        Whether you have questions or you would just like to say hello, contact us.
                    </p>

                </div>
            </div> <!-- / .row -->

            <div class="row">
                <div class="col-lg-6 offset-3">
                    <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                        </div>
                    </div>
                    <!-- end message -->
                    <!-- Contacts Form -->
                    <form method="POST" action="{{ route("inquiries.new.submission") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @if(Auth()->check())
                                <input class="form-control" type="hidden" name="user_id" value ="{{Auth()->id()}}">
                            @endif
                            <input class="form-control" type="hidden" name="agent_id" value ="{{$agent_id ? $agent_id->id :''}}">
                            <!-- Input -->
                            <div class="col-sm-6 mb-6">
                                <div class="form-group">
                                    <label for="name">{{ trans('cruds.inquiry.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                                    @if($errors->has(''))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.inquiry.fields.name_helper') }}</span>
                                </div>
                            </div>
                            <!-- End Input -->

                            <!-- Input -->
                            <div class="col-sm-6 mb-6">
                                <div class="form-group">
                                    <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email"
                                           id="email" value="{{ old('email') }}" required>
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                                </div>
                            </div>
                            <!-- End Input -->

                            <div class="w-100"></div>

                            <!-- Input -->
                            <div class="col-sm-6 mb-6">
                                <div class="form-group">
                                    <label for="country_id">{{ trans('cruds.inquiry.fields.country') }}</label>
                                    <select class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                                        @foreach($countries as $id => $country)
                                            <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has(''))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.inquiry.fields.country_helper') }}</span>
                                </div>
                            </div>
                            <!-- End Input -->

                            <!-- Input -->
                            <div class="col-sm-6 mb-6">
                                <div class="form-group">
                                    <label for="address">{{ trans('cruds.inquiry.fields.address') }}</label>
                                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                                    @if($errors->has(''))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.inquiry.fields.address_helper') }}</span>
                                </div>
                            </div>
                            <!-- End Input -->
                        </div>

                        <!-- Input -->
                        <div class="form-group">
                            <label for="inquiry">{{ trans('cruds.inquiry.fields.inquiry') }}</label>
                            <textarea class="form-control {{ $errors->has('inquiry') ? 'is-invalid' : '' }}" name="inquiry" id="inquiry">{{ old('inquiry') }}</textarea>
                            @if($errors->has(''))
                                <div class="invalid-feedback">
                                    {{ $errors->first('') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inquiry.fields.inquiry_helper') }}</span>
                        </div>
                        <!-- End Input -->

                        <div class="">
                            <input name="submit" type="submit" class="btn btn-primary btn-circled" value="Send Message">

                            <p class="small pt-3">We'll get back to you in 1-2 business days.</p>
                        </div>
                    </form>
                    <!-- End Contacts Form -->
                </div>

{{--                <div class="col-lg-6 col-md-6">--}}
{{--                    <!-- START MAP -->--}}
{{--                    <div id="map"></div>--}}
{{--                    <!-- END MAP -->--}}
{{--                </div>--}}
            </div>
        </div>
    </section>


@stop
