@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {{--Visa Type--}}
                            <div class="form-group row">
                                <label
                                    class="col-md-4 col-form-label text-md-right">{{ trans('cruds.user.fields.visa_type_sign_up') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control {{ $errors->has('visa_type') ? 'is-invalid' : '' }}"
                                            name="visa_type" id="visa_type">
                                        <option value
                                                disabled {{ old('visa_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\Visa::all() as $key => $label)
                                            <option
                                                value="{{ $key }}" {{ old('visa_type', '') === (string) $key ? 'selected' : '' }}>{{ $label->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if($errors->has('visa_type'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('visa_type') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.user.fields.visa_type_helper') }}</span>
                            </div>

                            {{--                        user-staus--}}
                            <div class="form-group row">
                                <label
                                    class="col-md-4 col-form-label text-md-right">{{ trans('cruds.user.fields.user_status') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control {{ $errors->has('user_status') ? 'is-invalid' : '' }}"
                                            name="user_status" id="user_status">
                                        <option value
                                                disabled {{ old('user_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\USER::USER_STATUS_SELECT as $key => $label)
                                            <option
                                                value="{{ $key }}" {{ old('user_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('user_status'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('user_status') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.user_status_helper') }}</span>
                                </div>
                            </div>

                            {{--                        Name--}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!--Nationality-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="nationality_id">{{ trans('cruds.user.fields.nationality') }}</label>
                                <div class="col-md-6">
                                    <select
                                        class="form-control select2 {{ $errors->has('nationality') ? 'is-invalid' : '' }}"
                                        name="nationality_id" id="nationality_id">
                                        @foreach($nationalities as $id => $nationality)
                                            <option
                                                value="{{ $id }}" {{ old('nationality_id') == $id ? 'selected' : '' }}>{{ $nationality }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('nationality_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('nationality_id') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.nationality_helper') }}</span>
                                </div>
                            </div>
                            <!--Country Currently You're Living-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="country_id">{{ trans('cruds.user.fields.country_register') }}</label>
                                <div class="col-md-6">
                                    <select
                                        class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                        name="country_id" id="country_id">
                                        @foreach($countries as $id => $country)
                                            <option
                                                value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('country_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('country_id') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
                                </div>
                            </div>


                            <!--Current Area-->

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="city">{{ trans('cruds.user.fields.city_register') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                           type="text" name="city" id="city" value="{{ old('city', '') }}">
                                    @if($errors->has('city'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('city') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.city_helper') }}</span>
                                </div>
                            </div>
                            <!--Date of Birth-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="date_of_birth">{{ trans('cruds.user.fields.date_of_birth') }}</label>
                                <div class="col-md-6">
                                    <input
                                        class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"
                                        type="text" name="date_of_birth" id="date_of_birth"
                                        value="{{ old('date_of_birth') }}">
                                    @if($errors->has('date_of_birth'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('date_of_birth') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.user.fields.date_of_birth_helper') }}</span>
                                </div>
                            </div>


                            <!--Gender-->

                            <div class="form-group row">
                                <label
                                    class="col-md-4 col-form-label text-md-right">{{ trans('cruds.user.fields.gender') }}</label>
                                <div class="col-md-6">
                                    @foreach(App\User::GENDER_RADIO as $key => $label)
                                        <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                            <input class="form-check-input" type="radio" id="gender_{{ $key }}"
                                                   name="gender"
                                                   value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }}>
                                            <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                    @if($errors->has('gender'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('gender') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
                                </div>
                            </div>
                            <!--Education Background-->
                            <div class="form-group row">
                                <label
                                    class="col-md-4 col-form-label text-md-right">{{ trans('cruds.user.fields.education_background') }}</label>
                                <div class="col-md-6">
                                    <select
                                        class="form-control {{ $errors->has('education_background') ? 'is-invalid' : '' }}"
                                        name="education_background" id="education_background">
                                        <option value
                                                disabled {{ old('education_background', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                        @foreach(App\User::EDUCATION_BACKGROUND_SELECT as $key => $label)
                                            <option
                                                value="{{ $key }}" {{ old('education_background', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('education_background'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('education_background') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.user.fields.education_background_helper') }}</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
