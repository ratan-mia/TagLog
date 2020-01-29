@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <h4 class="search-title">Find Host Employers in Japan</h4>
                        @include('frontend.employer-form')

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->

                    <!--===================================
        =            employer Header Section            =
        ==================================-->
                    <section class="section bg-gray">
                        <!-- Container Start -->
                        <div class="container">
                            {{--                            <div class="thumb-content m-t-15">--}}
                            {{--                                @if($employer->logo)--}}
                            {{--                                    <a href="{{ $employer->logo->getUrl() }}" target="_blank">--}}
                            {{--                                        <img src="{{ $employer->logo->getUrl() }}" width="100%"--}}
                            {{--                                             height="auto">--}}
                            {{--                                    </a>--}}
                            {{--                                @endif--}}
                            {{--                            </div>--}}
                            <h3 class="title">Company Name:<span>{{$employer->name }}</span></h3>
                            <hr class="horizontal-line">
                            <p class="paragraph">{!! $employer->description !!}</p>
                            <hr class="horizontal-line">
                            <p>Address: {!! $employer->address !!}</p>
                            <div class="row m-t-20">
                                <div class="col-md-2">
                                    <h4 class="sub-title">Location:<span>{{$employer->city->name}}
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h5 class="title-attr">Industry:</h5>
                                        </div>
                                        <div class="col-md-10">
                                            <ul class="list-inline">
                                                @foreach($employer->industries as $industry)
                                                    <li class="list-inline-item industry-type-item">
                                                        <a
                                                            href="{{ route('industry', [$industry->id]) }}">{{ $industry->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="visa-type">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <p style="text-align: center;">Visa Type</p></div>
                                            <div class="col-md-9">
                                                <ul class="list-inline">
                                                    @foreach($employer->visas as $visa)
                                                        <li class=" list-inline-item visa-type-item">{{$visa->name}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-3">
                                    @if(!$employer->location->isEmpty)
                                        <iframe
                                            width="100%"
                                            height="120px"
                                            frameborder="0"
                                            scrolling="no"
                                            marginheight="0"
                                            marginwidth="0"
                                            src="https://www.google.com/maps/embed/v1/place?q={{$employer->location->latitude}},{{$employer->location->longitude}}&amp;key=AIzaSyC4seHvysGcv7ppFOPF0jNDRbVr97NuG0Y">

                                        </iframe>
                                    @endif

                                    <br/>
                                </div>

                                <div class="col-md-9">
                                    <h3 class="sub-title">Individual Reviews<span
                                            style="color:#00aced;font-style: italic;">( {{$employer->experiences->count()}} found )</span>
                                    </h3>
                                    @foreach($employer->experiences as $experience)
                                        <div class="row review-container">
                                            <div class="col-md-8">
                                                <div class="single-review">
                                                    <p class="paragraph font-italic">
                                                        "{!!$experience->employer_feedback!!}"</p>
                                                    <p class="reviewer-attr">Reviewer :
                                                        <span>{{$experience->user->name}}</span> Reviewer ID:
                                                        <span>{{$experience->user->id}}</span></p>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <p class="reviewer-attr">Visa Type:
                                                    <span>{{$experience->user->visa->name}}</span></p>
                                                <p class="reviewer-attr">Industry:
                                                    <span>{{$experience->industry->name}}</span></p>
                                                <p class="reviewer-attr">Monthly Salary:
                                                    <span>US${{$experience->monthly_salary}}</span></p>
                                                <p class="reviewer-attr">Living Expenses:
                                                    <span>US${{$experience->monthly_living_expenses}}</span></p>
                                                <p class="reviewer-attr">Weekly Working Hours: <span>{{$experience->weekly_working_hours}} hours</span>
                                                </p>
                                                <p class="reviewer-attr">Monthly Days off: <span>{{$experience->monthly_days_off}} Days</span>
                                                </p>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>
                        </div>
                </div>
                <!-- Container End -->
    </section>

@stop
