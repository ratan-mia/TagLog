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
                    @foreach ($categories->take(8) as $category)
                        <!-- Category list -->
                            <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
                                <div class="category-block">
                                    <div class="header">
                                        <i class="{{ $category->icon }} icon-bg-{{ $category->id }}"></i>
                                        <h4>
                                            <a href="{{ route('category', [$category->id]) }}">{{ $category->name }}
                                                <p style="display: inline">({{ $category->companies->count() }})</p>
                                            </a>

                                        </h4>
                                    </div>
                                    <ul class="category-list">
                                        @foreach ( $category->companies->shuffle()->take(4) as $singleCompany)
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
