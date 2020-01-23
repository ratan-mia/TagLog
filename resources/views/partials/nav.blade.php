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
                                        <a class="dropdown-item" href="{{ route('navigation',['type'=>'organization','country'=>$country->name]) }}">
                                            {{$country->name}}
                                        </a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-slide">
                                <a class="nav-link" href="" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                    Listing <span><i class="fa fa-angle-down"></i></span>
                                </a>
                                <!-- Dropdown list -->
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
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
