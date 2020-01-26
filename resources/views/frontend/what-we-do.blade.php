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
                        {{--                        <h1 class="title">TAGLOG</h1>--}}
                        <h2 class="title"> What We Do</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <section class="section what-we-do">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img  src="{{asset('images/what-we-do/taglog.png')}}" class="img-responsive" alt="Taglog" width="100%" height="auto">
                </div>

                <div class="col-md-4">
                    <h2 class="sub-title">Find Sending Organizations or Host Employers in Japan</h2>
                    <p class="paragraph">If you plan to go to Japan with Technical Intern Trainee or Specified Skilled Worker Visa</p>
                </div>
                <div class="col-md-4">
                    <img  src="{{asset('images/what-we-do/taglog-service.png')}}" class="img-responsive" alt="Taglog" width="60%" height="auto">
                </div>
            </div>
            <hr class="horizontal-line">
            <div class="row">
                <div class="col-md-4">
                    <img  src="{{asset('images/what-we-do/taglog-assist.png')}}" class="img-responsive" alt="Taglog" width="100%" height="auto">
                </div>

                <div class="col-md-4">
                    <h2 class="sub-title">Concierge, Language support</h2>
                    <p class="paragraph">If you are staying in Japan and looking for daily life support</p>
                </div>
                <div class="col-md-4">
                    <img  src="{{asset('images/what-we-do/TagLog_Service_Taglog-Assist.png')}}" class="img-responsive" alt="Taglog" width="60%" height="auto">
                </div>
            </div>
            <hr class="horizontal-line">
            <div class="row">
                <div class="col-md-4">
                    <img  src="{{asset('images/what-we-do/taglog-next.png')}}" class="img-responsive" alt="Taglog" width="100%" height="auto">
                </div>

                <div class="col-md-4">
                    <h2 class="sub-title">Search full-time job in Japan</h2>
                    <p class="paragraph">If you are looking for full-time job in Japan</p>
                </div>
                <div class="col-md-4">
                    <img  src="{{asset('images/what-we-do/TagLog_Service_Taglog-Next.png')}}" class="img-responsive" alt="Taglog" width="60%" height="auto">
                </div>
            </div>
        </div>
    </section>

@stop
