{{--@foreach($nav_agents as $nav_agent)--}}

{{--    @foreach($nav_agent->countries as $country)--}}
{{--        {{$country->id}}--}}
{{--        @endforeach--}}

{{--@endforeach--}}
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg  navigation">
                    <a class="navbar-brand" href="/">
                        <img src="/images/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-10">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{route('homepage')}}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.home')}}">Dashboard</a>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    Sending Organizations<span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <div class="dropdown-menu dropdown-menu-right">
{{--                                    {{ route('user.attendance', ['id' => 1]) }}--}}
{{--                                    {{ url('attendance/1') }}--}}
                                    @foreach($nav_countries as $country)
                                        <form action="{{ route('search') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="type" value="organization">
                                            <input type="hidden" name="country_id" value="{{$country->id}}">
                                            <button type="submit"
                                                    class="dropdown-item">
                                                {{$country->name}}
                                            </button>
                                        </form>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link" href="" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    Employers <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <div class="dropdown-menu dropdown-menu-right">
                                    @foreach($nav_destinations as $destination)
                                        <form action="{{ route('search') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="type" value="employer">
                                            <input type="hidden" name="destination_id" value="{{$destination->id}}">
                                            <button type="submit"
                                                    class="dropdown-item">
                                                {{$destination->name}}
                                            </button>
                                        </form>
                                    @endforeach

                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto mt-10">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link taglog-button" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link taglog-button" href="{{ route('register') }}">Register</a>
                                </li>
                            @else

                                <li class="nav-item">
                                    <a class="nav-link taglog-button" href="{{ route('user.my-profile') }}">My
                                        Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class=" nav-link taglog-button" href="#"
                                       onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
