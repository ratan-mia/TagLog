@extends('layouts.master')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                    <div class="advance-search">
                        <h4 class="search-title">Find Sending Organizations in your area</h4>
                    @include('frontend.agent-form')

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
                                                <ul class="list-inline">
                                                    @foreach($agent->visas as $visa)
                                                        <li class=" list-inline-item visa-type-item">{{$visa->name}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <hr class="horizontal-line">
                                        <h4 class="sub-title">Employer's Industry from Taglog User</h4>
                                        <ul>
                                            @foreach($agent->employers as $employer)
                                                {{--                                                <li class="industry-type-item">{{$employer->name}}</li>--}}
                                                <ul class="list-inline">
                                                    @foreach($employer->industries as $industry)
                                                        <li class="list-inline-item industry-type-item">{{$industry->name}}</li>
                                                    @endforeach
                                                </ul>

                                            @endforeach
                                        </ul>

                                    </div>
                                </div>

                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-3">
                                    <iframe
                                        width="100%"
                                        height="120px"
                                        frameborder="0"
                                        scrolling="no"
                                        marginheight="0"
                                        marginwidth="0"
                                        src="https://www.google.com/maps/embed/v1/place?q={{$agent->location->latitude}},{{$agent->location->longitude}}&amp;key=AIzaSyC4seHvysGcv7ppFOPF0jNDRbVr97NuG0Y">

                                    </iframe>
                                    <br/>
                                </div>

                                <div class="col-md-9">
                                    <h3 class="sub-title">Individual Reviews<span
                                            style="color:#00aced;font-style: italic;">( {{$agent->experiences->count()}} found )</span>
                                    </h3>
                                    @foreach($agent->experiences as $experience)
                                        <div class="row review-container">
                                            <div class="col-md-8">
                                                <div class="single-review">
                                                    <p class="paragraph font-italic">"{{$experience->agent_feedback}}
                                                        "</p>
                                                    <div class="review-stars">
                                                        <p class="paragraph">Visa Application Process
                                                            @php $remain_stars = 5 - $experience->visa_application_rating; @endphp
                                                            @for ($i = 0; $i < $experience->visa_application_rating; $i++)
                                                                <span class="fa fa-star checked"></span>
                                                            @endfor
                                                            @for ($i = 0; $i < $remain_stars; $i++)
                                                                <span class="fa fa-star"></span>
                                                            @endfor
                                                            <span
                                                                style="margin-left: 10px;">Language Training Course</span>
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
                                            <div class="col-md-4">
                                                <p class="reviewer-attr">Reviewer ID:
                                                    <span>{{$experience->user->id}}</span></p>
                                                <p class="reviewer-attr">Date of birth:
                                                    <span>{{$experience->user->date_of_birth}}</span></p>
                                                <p class="reviewer-attr">Gender:
                                                    <span>{{App\User::GENDER_RADIO[$experience->user->gender]}}</span>
                                                </p>
                                                <p class="reviewer-attr">Education:
                                                    <span>{{$experience->user->education_level}}</span></p>
                                                <p class="reviewer-attr">Language:
                                                    <span>{{$experience->user->language_level}}</span></p>
                                                <p class="reviewer-attr">Industry:
                                                    <span>{{$experience->industry->name}}</span></p>
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
