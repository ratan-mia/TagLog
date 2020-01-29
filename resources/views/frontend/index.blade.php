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
{{--                        <h1 class="title">TAGLOG</h1>--}}
                        <h2 class="sub-title">
                            The community for foreigners who wish to work, or have experience <br>working in Japan (Technical Intern  Trainee, Specified Skilled Worker) </h2>
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
                    <p style="font-size: 1rem;color:#888;" class="paragraph">To build happy relationship between employers and foreigners, contributing to create better working environment in Japan</p>
                </div>

            </div>
        </div>
        <!-- Container End -->
    </section>

@stop
