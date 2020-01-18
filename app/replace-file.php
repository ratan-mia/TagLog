@if (count($agents) > 0)
@foreach ($agents as $agent)
<div class="col-sm-12 col-lg-4 col-md-6">

    <!-- product card -->

    <div class="product-item bg-light">
        <div class="card">
            <div class="thumb-content">
                @if($agent->logo)<a href="{{ route('agent', [$agent->id]) }}"><img class="card-img-top img-fluid" src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $agent->logo) }}"/></a>@endif
            </div>
            <div class="card-body">
                <h4 class="card-title"><a href="{{ route('agent', [$agent->id]) }}">{{$agent->name}}</a></h4>
                @foreach ($agent->industries as $industry)
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="{{ route('category', [$industry->id]) }}"><i class="fa fa-folder-open-o"></i>{{ $industry->name }}</a>
                    </li>
                </ul>
                @endforeach
                <p class="card-text">{{ substr($agent->description, 0, 100) }}...</p>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
