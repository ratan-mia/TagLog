@extends('layouts.master')
@section('content')

    <!--===============================
=            Banner Area           =
================================-->

    <section class="hero-area bg-business-partner text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div id="taglog" class="content-block">
                        {{--                        <h1 class="title">TAGLOG</h1>--}}
                        <h2 class="title"> Our Business Partners</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <section class="section what-we-do">
        <!-- Container Start -->
        <div class="container">
            <h2 class="m-t-20">Japan <span><img src="{{asset('flags/japan.png')}}" width="30px" height="30px"></span>
            </h2>
            <br>
            <div class="row border">
                <div class="col-md-12">
                    <div class="row m-b-10">
                        <div class="col-md-4 border-right"><h4>Company</h4></div>
                        <div class="col-md-4 border-right"><h4>Address</h4></div>
                        <div class="col-md-4"><h4>Details</h4></div>
                    </div>
                    @if($partners->count()>0)
                        @foreach($partners as $partner)
                            @if($partner ->country_id == 19)
                                <div class="row border">
                                    <div class="col-md-4 border-right">
                                        {{$partner->company}}
                                    </div>
                                    <div class="col-md-4 border-right">
                                        {!!$partner->address!!}
                                    </div>
                                    <div class="col-md-4">
                                        {!!$partner->details!!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>

            </div>
        </div>

        <div class="container">
            <h2 class="m-t-20">Vietnam <span><img src="{{asset('flags/vietnam.png')}}" width="30px"
                                                  height="30px"></span></h2>
            <br>
            <div class="row border">
                <div class="col-md-12">
                    <div class="row m-b-10">
                        <div class="col-md-4 border-right"><h4>Company</h4></div>
                        <div class="col-md-4 border-right"><h4>Address</h4></div>
                        <div class="col-md-4"><h4>Details</h4></div>
                    </div>
                    @if($partners->count()>0)
                        @foreach($partners as $partner)
                            @if($partner ->country_id == 20)
                                <div class="row border">
                                    <div class="col-md-4 border-right">
                                        {{$partner->company}}
                                    </div>
                                    <div class="col-md-4 border-right">
                                        {!!$partner->address!!}
                                    </div>
                                    <div class="col-md-4">
                                        {!!$partner->details!!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>

            </div>
        </div>
        <div class="container">
            <h2 class="m-t-20">Bangladesh <span><img src="{{asset('flags/bangladesh.png')}}" width="30px" height="30px"></span>
            </h2>
            <br>
            <div class="row border">
                <div class="col-md-12">
                    <div class="row m-b-10">
                        <div class="col-md-4 border-right"><h4>Company</h4></div>
                        <div class="col-md-4 border-right"><h4>Address</h4></div>
                        <div class="col-md-4"><h4>Details</h4></div>
                    </div>
                    @if($partners->count()>0)
                        @foreach($partners as $partner)
                            @if($partner ->country_id == $partner->country->id)
                                <div class="row border">
                                    <div class="col-md-4 border-right">
                                        {{$partner->company}}
                                    </div>
                                    <div class="col-md-4 border-right">
                                        {!!$partner->address!!}
                                    </div>
                                    <div class="col-md-4">
                                        {!!$partner->details!!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>

            </div>
        </div>
    </section>

@stop
