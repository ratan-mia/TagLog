@extends('layouts.master')
@section('content')

    <!--===============================
=            Banner Area           =
================================-->

    <section class="hero-area bg-about-us text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div id="taglog" class="content-block">
                        {{--                        <h1 class="title">TAGLOG</h1>--}}
                        <h2 class="title"> About Us</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <section class="section what-we-do">
        <!-- Container Start -->
        <div class="container">
            <h2 class="m-t-30">Team</h2>
            <br>
            <div class="row">
                @if($members->count()>0)
                    @foreach($members as $member)
                        <div class="col-md-4">
                            @if($member->photo)
                                <a  href="{{ $member->photo->getUrl() }}" target="_blank">
                                    <img class="member-photo" src="{{ $member->photo->getUrl() }}" width="100%" height="auto">
                                </a>
                            @endif
                            <h3 class="member-name">{{$member->name}}</h3>
                            <h4 class="memnber-position">{{$member->position}}</h4>
                            <p class="member-overview">{!!$member->overview!!}</p>
            </div>
            @endforeach
            @endif

        </div>

        </div>
        </div>
    </section>

@stop
