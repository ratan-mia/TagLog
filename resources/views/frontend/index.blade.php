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
                    <div id="taglog" class="content-block">
                        <h1 class="title">TAGLOG</h1>
                        <h2 class="sub-title">
                            The community for foreigners who wish to work, or have experience <br>working in Japan
                            (Technical Intern Trainee, Specified Skilled Worker) </h2>
                    </div>

                    <!-- Advance Search -->
                    <div class="advance-search">
                        <h4 class="search-title text-left">Find Sending Organizations in your area</h4>
                        @include('frontend.agent-form')
                        <h4 class="search-title text-left"> Find Host Employers in Japan</h4>
                        @include('frontend.employer-form')

                    </div>
                    <!-- Advance Search -->

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">


                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>


    <!--==========================================
    =           Mission Section           =
    ===========================================-->

    <section class="section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('images/home/mission-bg.jpg')}}">
                </div>
                <div class="col-md-6">
                    <h2 class="title m-t-50">Mission</h2>
                    <br>
                    <p style="font-size: 1rem;color:#888;" class="paragraph">To build happy relationship between
                        employers and foreigners, contributing to create better working environment in Japan</p>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>
    <section class="section how-to-use">
        <!-- Container Start -->
        <div class="container">
            <h2 class="title text-center m-b-50">How To Use TagLog</h2>
            <div class="row">
                <div class="col-md-4">
                    <h2 class="title">1</h2>
                    <br>
                    <h4 class="sub-title">Register</h4>
                    <br>
                    <p class="paragraph">Register in less than 2 minutes<br> and <a style="color:#08B3E6;" href="{{route('register')}}">get
                            started</a></p><br>
                    <img src="{{asset('images/home/Taglog_Home_Register.png')}}">
                </div>
                <div class="col-md-4">
                    <h2 class="title">2</h2>
                    <br>
                    <h4 class="sub-title">Share your preference for work, or<br>
                        experience in Japan</h4>
                    <br>
                    <ol class="work-preference-list">
                        <li>If you plan to go to Japan with Technical Intern or Specified Skilled Worker Visa - share
                            your preference for work
                        </li>
                        <li>If you know where to work, or are currently staying in Japan, or have experience in Japan -
                            review your experience with Sending Organizations
                        </li>
                        <li>If you are currently working or have experience working in Japan - share your working
                            experience in Japan
                        </li>

                    </ol>
                </div>
                <div class="col-md-4">
                    <h2 class="title">3</h2>
                    <br>
                    <h4 class="sub-title">TAGLOG offers support for
                        your stay and job search in Japan</h4>
                    <br>
                    <p class="paragraph">Seize your moment. Get what you need.</p><br>
                    <img src="{{asset('images/home/Taglog_Home_Support.png')}}">
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>

{{--    <section class="section">--}}
        <!-- Container Start -->
{{--        <div class="container">--}}
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <h2 style="color:#000;" class="title m-t-50">Why TAGLOG service is unique</h2>
                    <br>
                    <p style="font-size: 1rem;color:#505050;" class="paragraph">We build strong relationship with Sending Organizations in your country, Japanese employers and organizations.
                        We help you go to Japan with reasonable budget, stay and work in the safest environment, and develop future career.</p>
                </div>
                <div class="col-md-6 bg-taglog-service">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="taglog-service-list m-t-10">
                                <li>Consulting service to select right<br> Sending Organizations - Free!
                                </li>
                                <li>Concierge support during<br> your stay in Japan - Free!
                                </li>
                                <li>Consulting service to search <br>job in Japan - Free!
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('images/home/Taglog_Home_Unique-Service.png')}}">
                        </div>
                    </div>
                </div>


            </div>
{{--        </div>--}}
        <!-- Container End -->
{{--    </section>--}}

@stop
