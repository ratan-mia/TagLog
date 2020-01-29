@extends('layouts.master')

@section('content')
    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100">

                <form lass="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-logo">
{{--						<i class="zmdi zmdi-landscape"></i>--}}
                        <img src="{{asset('images/logo-login.png')}}" width="100px" height="auto">
					</span>

                    <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input id="email" name="email" type="text"
                               class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" required
                               autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}"
                               value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">

                        <input id="password" name="password" type="password"
                               class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" required
                               placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" name="remember" type="checkbox" id="remember"
                               style="vertical-align: middle;"/>
                        <label class="label-checkbox100" for="remember" style="vertical-align: middle;">
                            {{ trans('global.remember_me') }}
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ trans('global.login') }}
                        </button>
                    </div>

                    <div class="text-center p-t-90">
                        @if(Route::has('password.request'))
                            <a class="txt1" href="{{ route('password.request') }}">
                                {{ trans('global.forgot_password') }}
                            </a><br>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
@endsection
