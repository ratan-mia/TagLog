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
            <div class="row border">
                <div class="col-md-12">
                    <div class="row m-b-10">
                        <div class="col-md-4 border-right"><h2>Company</h2></div>
                        <div class="col-md-4 border-right"><h2>Address</h2></div>
                        <div class="col-md-4"><h2>Details</h2></div>
                    </div>
                    @if($partners->count()>0)
                        @foreach($partners as $partner)
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
                        @endforeach
                    @endif

                </div>

            </div>
        </div>
    </section>

@stop
