@extends('layouts.master')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- Advance Search -->
                    <div class="advance-search">

                        @if(old('type')=='organization')
                            <h4 class="search-title">Find Sending Organizations in your area</h4>
                            @include('frontend.agent-form')
                        @else
                            <h4 class="search-title text-left"> Find Host Employers in Japan</h4>
                            @include('frontend.employer-form')

                        @endif

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advance Search -->
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-result">

                        {{--                        Organization Result--}}

                        @if(old('type')=='organization')

                            <h2>Results</h2>
                            <p>{{ $results->count() }} Results</p>
                            @if (count($results) > 0)
                                @foreach ($results as $result)
                                    <div class="agent-container">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="thumb-content">
                                                    @if($result->logo)<a href="{{ route('agent', [$result->id]) }}"><img
                                                            class="card-img-top img-fluid"
                                                            src="{{ $result->logo->getUrl() }}"></a>@endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h6 class="title-attr">Company Name: <span><a
                                                            href="{{ route('agent', [$result->id]) }}">{{$result->name}}</a></span>
                                                </h6>
                                                <p class="title-attr">Address:<span>{{$result->address}}</span></p>
                                                <br>
                                                <h3 class="sub-title-attr">Overview</h3>
                                                {!! substr($result->overview, 0, 100) !!}...
                                            </div>
                                            <div class="col-md-5">
                                                <div class="visa-type">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <h4 class="title-attr">Visa Type</h4>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <ul class="list-inline">
                                                                @foreach($result->visas as $visa)
                                                                    <li class="list-inline-item visa-type-item">{{$visa->name}}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <hr class="horizontal-line">
                                                    <h4 class="title-attr">Employer's Industry from Taglog User</h4>
                                                    @if(old('type')=='organization')
                                                        <ul>
                                                            @foreach($result->employers as $employer)
                                                                {{--                                                <li class="industry-type-item">{{$employer->name}}</li>--}}
                                                                <ul class="list-inline">
                                                                    @foreach($employer->industries as $industry)
                                                                        <li class="list-inline-item industry-type-item">
                                                                            <a
                                                                                href="{{ route('industry', [$industry->id]) }}">{{ $industry->name }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                            @endforeach
                                                        </ul>
                                                        <p class="text-right"><a class="link-cta"
                                                                                 href="{{ route('agent', [$result->id]) }}">&gt;See
                                                                Individual Review</a></p>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="d-flex align-items-center">

                                                    <p class="text-center mt-20">
                                                        <a class="link-cta" href="{{ route('agent', [$result->id]) }}">
                                                            See More info<br><i class="fa fa-long-arrow-right"
                                                                                aria-hidden="true"></i>
                                                        </a>
                                                    </p>
                                                    @else

                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                    </div>
                    @endforeach
                    @endif

                    {{--                    End Organization Result--}}

                    @elseif(old('type')=='employer')

                        <h2>Results</h2>
                        <p>{{ $results->count() }} Results</p>
                        @if (count($results) > 0)
                            @foreach ($results as $result)
                                <div class="employer-container">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="thumb-content m-t-15">
                                                @if($result->logo)<a href="{{ route('employer', [$result->id]) }}"><img
                                                        class="card-img-top img-fluid"
                                                        src="{{ $result->logo->getUrl() }}"></a>@endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 border-right">
                                            <h6 class="title-attr">Company Name: <span><a
                                                        href="{{ route('employer', [$result->id]) }}">{{$result->name}}</a></span>
                                            </h6>
                                            <p class="title-attr">Location:<span>{{$result->city->name}}</span> <a class="link-map" href="{{ route('agent', [$result->id]) }}">
                                                    See Map
                                                </a></p>
{{--                                            <h3 class="sub-title-attr">Overview</h3>--}}
{{--                                            {!! substr($result->description, 0, 100) !!}...--}}
                                            <br>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <h5 class="title-attr m-t-10">EIndustry:</h5>
                                                </div>
                                                <div class="col-md-10">
                                                    <ul class="list-inline">
                                                        @foreach($result->industries as $industry)
                                                            <li class="list-inline-item industry-type-item">
                                                                <a
                                                                    href="{{ route('industry', [$industry->id]) }}">{{ $industry->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4 border-right">
                                            <div class="visa-type">
                                                <h4 class="title-attr">Visa Type</h4>
                                                <ul class="list-inline m-t-20">
                                                    @foreach($result->visas as $visa)
                                                        <li class="list-inline-item visa-type-item">{{$visa->name}}</li>
                                                    @endforeach
                                                </ul>



{{--                                                <p class="text-center m-t-50">--}}
{{--                                                    <a class="link-map" href="{{ route('agent', [$result->id]) }}">--}}
{{--                                                        See Map--}}
{{--                                                    </a>--}}
{{--                                                </p>--}}


                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="d-flex align-items-center">

                                                <p class="text-center mt-20">
                                                    <a class="link-cta" href="{{ route('employer', [$result->id]) }}">
                                                        See Individual Review<br><i class="fa fa-long-arrow-right"
                                                                            aria-hidden="true"></i>
                                                    </a>
                                                </p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                </div>
                @endforeach
                @endif

                {{--                    Employer Result--}}
                @endif


            </div>
        </div>
        </div>
        {{ $results->appends(request()->all())->links() }}

    </section>
@stop
