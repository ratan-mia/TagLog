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
                                <a href="{{ $member->photo->getUrl() }}" target="_blank">
                                    <img class="member-photo" src="{{ $member->photo->getUrl() }}" width="100%"
                                         height="auto">
                                </a>
                            @endif
                            <h3 class="member-name">{{$member->name}}</h3>
                            <h4 class="member-position">{{$member->position}}</h4>
                            <div class="member-overview">{!!$member->overview!!}</div>
                            <ul class="list-inline social-links">
                                <li class="list-inline-item"><a href="{{$member->twitter}}" target="_blank"><i
                                            class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a href="{{$member->instagram}}" target="_blank"><i
                                            class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a href="{{$member->facebook}}" target="_blank"><i
                                            class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    @endforeach
                @endif

            </div>

        </div>
        </div>
    </section>

    <section class="section about-us">
        <!-- Container Start -->
        <div class="container">
            <h2 class="m-t-30">Company Profile</h2>
            <hr>
            @if(!empty($setting))
                <div class="row m-t-50">
                    <div class="col-md-6">
                        <h3>Company Name: {{$setting->name}}</h3>
                        <br>
                        <div class="address">{!! $setting->address !!}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="comapny-map">
                            {{--                            {!! $setting->map !!}--}}
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.065807657298!2d139.7701683150905!3d35.675381580195726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188be20dff79c5%3A0xfb6a6567024ff1b8!2sKyobashi%20MID%20Building!5e0!3m2!1sen!2sbd!4v1580368646322!5m2!1sen!2sbd"
                                width="100%" height="200px" frameborder="0" style="border:0;"
                                allowfullscreen=""></iframe>
                        </div>
                    </div>

                </div>
                <div class="row m-t-50">
                    <div class="col-md-6 m-b-20">
                        <h3 class="title">{{$setting->business_title}}</h3>
                        <hr>
                        <p class="paragraph">{!! $setting->business_sentence!!}</p>
                    </div>

                    <div class="col-md-6 m-b-20">
                        <h3 class="title">{{$setting->philosophy_title}}</h3>
                        <hr>
                        <p class="paragraph">{!! $setting->philosophy_sentence!!}</p>
                        <br>
                        <h2 class="title">{{$setting->mission_title}}</h2>
                        <hr>
                        <p class="paragraph">{!! $setting->mission_sentence!!}</p>
                    </div>

                </div>
            @endif

        </div>
        </div>
    </section>

{{--    @php--}}
{{--        echo'<pre>';--}}
{{--        var_dump($setting);--}}
{{--        echo'</pre>';--}}
{{--    @endphp--}}
@stop
