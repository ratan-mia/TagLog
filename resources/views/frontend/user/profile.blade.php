@extends('layouts.master')

@section('content')

    <!--==================================
=            User Profile            =
===================================-->

    <section class="user-profile section">

        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
                    <div class="sidebar">
                        <!-- User Widget -->
                        <div class="widget user-dashboard-profile">
                            <!-- User Image -->

                            <div class="profile-thumb">
                                <img src="{{$profile_picture}}" alt="" class="rounded-circle">
                                <!-- File chooser -->
                                {{--                                <div class="form-group choose-file">--}}
                                {{--                                    <i class="fa fa-user text-center"></i>--}}
                                {{--                                    <input type="file" class="form-control-file d-inline" id="input-file">--}}
                                {{--                                </div>--}}

                            </div>
                            <!-- User Name -->
                            <h5 class="text-center">{{$user->name}}</h5>
                            <p>{{$user->email}}</p>
                        </div>
                        <!-- Dashboard Links -->
                        <div class="widget user-dashboard-menu">
                            <ul class="nav nav-tabs tabs-left">
                                <li>
                                    <a href="#basic_information" data-toggle="tab"><i class="fa fa-user"></i> Basic
                                        Information</a>
                                </li>
                                <li>
                                    <a href="#work_preference" data-toggle="tab"><i class="fa fa-briefcase"></i> Work
                                        Preference</a>
                                </li>
                                <li>
                                    <a href="#change_email" data-toggle="tab"><i class="fa fa-envelope"></i>Change Email</a>
                                </li>
                                <li>
                                    <a href="#change_password" data-toggle="tab"><i class="fa fa-briefcase"></i>Change
                                        Password</a>
                                </li>

                                <li style="display: none;">
                                    <a href="#change_password" data-toggle="tab"><i class="fa fa-cog"></i>Log out</a>
                                </li>

                                <li>
                                    <a href="#"
                                       onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-cog"></i> Log out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Edit Personal Info -->
                    <div class="widget personal-info">

                        <div class="tab-content">

                            <div class="tab-pane active" id="basic_information">

                                <h3 class="widget-header user">Basic Information</h3>
                                <form method="POST" action="{{ route("admin.users.update", [$user->id]) }}"
                                      enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <!-- First Name -->

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-6 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" value="{{$user->name}}">
                                        </div>
                                    </div>

                                    <!-- Nationality -->
                                    <div class="form-group row">
                                        <label for="nationality_id"
                                               class="col-sm-6 col-form-label">{{ trans('profile.basic-information.nationality') }}</label>
                                        <div class="col-sm-6">
                                            <select
                                                class="form-control select2 {{ $errors->has('nationality') ? 'is-invalid' : '' }}"
                                                name="nationality_id" id="nationality_id">
                                                @foreach($nationalities as $id => $nationality)
                                                    <option
                                                        value="{{ $id }}" {{ ($user->nationality ? $user->nationality->id : old('nationality_id')) == $id ? 'selected' : '' }}>{{ $nationality }}</option>
                                                @endforeach
                                            </select>

                                            @if($errors->has('country_id'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('country_id') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
                                        </div>
                                    </div>


                                    <!-- Country -->
                                    <div class="form-group row">
                                        <label for="country_id"
                                               class="col-sm-6 col-form-label">{{ trans('profile.basic-information.country') }}</label>
                                        <div class="col-sm-6">
                                            <select
                                                class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                                name="country_id" id="country_id">
                                                @foreach($countries as $id => $country)
                                                    <option
                                                        value="{{ $id }}" {{ ($user->country ? $user->country->id : old('country_id')) == $id ? 'selected' : '' }}>{{ $country }}</option>
                                                @endforeach
                                            </select>

                                            @if($errors->has('country_id'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('country_id') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
                                        </div>
                                    </div>

                                    <!-- Current City/Area -->

                                    <div class="form-group row">
                                        <label for="city"
                                               class="col-sm-6 col-form-label">{{ trans('profile.basic-information.city') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" value="{{$user->city}}">
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->

                                    <div class="form-group row">
                                        <label for="city"
                                               class="col-sm-6 col-form-label">{{ trans('profile.basic-information.date_of_birth') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control date" id="name"
                                                   value="{{$user->date_of_birth}}">
                                        </div>
                                    </div>

                                    <!-- Gender -->

                                    <div class="form-group row">
                                        <label for="gender"
                                               class="col-sm-6 col-form-label">{{ trans('cruds.user.fields.gender') }}</label>
                                        <div class="col-sm-6">
                                            @foreach(App\User::GENDER_RADIO as $key => $label)
                                                <div
                                                    class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                                                    <input class="form-check-input" type="radio" id="gender_{{ $key }}"
                                                           name="gender"
                                                           value="{{ $key }}" {{ old('gender', $user->gender) === (string) $key ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                           for="gender_{{ $key }}">{{ $label }}</label>
                                                </div>
                                            @endforeach
                                            @if($errors->has('gender'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('gender') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
                                        </div>
                                    </div>

                                    <!-- Education Level -->

                                    <div class="form-group row">
                                        <label for="education_level"
                                               class="col-sm-6 col-form-label">{{ trans('profile.basic-information.education_level') }}</label>
                                        <div class="col-sm-6">
                                            <select
                                                class="form-control {{ $errors->has('education_level') ? 'is-invalid' : '' }}"
                                                name="education_level" id="education_level">
                                                <option value
                                                        disabled {{ old('education_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                @foreach(App\User::EDUCATION_LEVEL_SELECT as $key => $label)
                                                    <option
                                                        value="{{ $key }}" {{ old('education_level', $user->education_level) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('education_level'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('education_level') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.education_level_helper') }}</span>
                                        </div>
                                    </div>
                                    <!-- Language Level -->

                                    <div class="form-group row">
                                        <label for="language_level"
                                               class="col-sm-6 col-form-label">{{ trans('profile.basic-information.language_level') }}</label>
                                        <div class="col-sm-6">
                                            <select
                                                class="form-control {{ $errors->has('language_level') ? 'is-invalid' : '' }}"
                                                name="language_level" id="language_level">
                                                <option value
                                                        disabled {{ old('language_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                @foreach(App\User::LANGUAGE_LEVEL_SELECT as $key => $label)
                                                    <option
                                                        value="{{ $key }}" {{ old('language_level', $user->language_level) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('language_level'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('language_level') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('profile.basic-information.language_level_helper') }}</span>
                                        </div>
                                    </div>
                                    <!-- Phone-->

                                    <div class="form-group row">
                                        <label for="phone"
                                               class="col-sm-6 col-form-label">{{ trans('cruds.user.fields.phone') }}</label>
                                        <div class="col-sm-6">
                                            <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                   type="text" name="phone" id="phone"
                                                   value="{{ old('phone', $user->phone) }}">
                                            @if($errors->has('phone'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('phone') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                                        </div>
                                    </div>

                                    <!-- Email-->
                                    <div class="form-group row">
                                        <label for="email"
                                               class="col-sm-6 col-form-label">{{ trans('cruds.user.fields.email') }}</label>
                                        <div class="col-sm-6">
                                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                   type="text" name="email" id="email"
                                                   value="{{ old('email', $user->email) }}" required>
                                            @if($errors->has('email'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('email') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                                        </div>
                                    </div>
                                    <!-- Facebook-->
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label"
                                               for="facebook">{{ trans('cruds.user.fields.facebook') }}</label>
                                        <div class="col-sm-6">
                                            <input
                                                class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
                                                type="text" name="facebook" id="facebook"
                                                value="{{ old('facebook', $user->facebook) }}">
                                            @if($errors->has('facebook'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('facebook') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.facebook_helper') }}</span>
                                        </div>
                                    </div>
                                    <!-- skype-->
                                    <div class="form-group row">
                                        <label for="skype"
                                               class="col-sm-6 col-form-label">{{ trans('cruds.user.fields.skype') }}</label>
                                        <div class="col-sm-6">
                                            <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}"
                                                   type="text" name="skype" id="skype"
                                                   value="{{ old('skype', $user->skype) }}">
                                            @if($errors->has('skype'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('skype') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.skype_helper') }}</span>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <button class="btn btn-transparent">Save My Changes</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="work_preference">

                                <h3 class="widget-header user">Work Preference</h3>
                                {{dd($experience)}}
                                @if (is_null($experience))
                                    <p>No Data Found</p>
                                @else

                                <form method="POST" action="{{ route("admin.experiences.update", [$experience->id]) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="user_id">{{ trans('cruds.experience.fields.user') }}</label>
                                        <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                                            @foreach($users as $id => $user)
                                                <option value="{{ $id }}" {{ ($experience->user ? $experience->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('user_id'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('user_id') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.experience.fields.user_helper') }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="destination_country_id">{{ trans('cruds.experience.fields.destination_country') }}</label>
                                        <select class="form-control select2 {{ $errors->has('destination_country') ? 'is-invalid' : '' }}" name="destination_country_id" id="destination_country_id">
                                            @foreach($destination_countries as $id => $destination_country)
                                                <option value="{{ $id }}" {{ ($experience->destination_country ? $experience->destination_country->id : old('destination_country_id')) == $id ? 'selected' : '' }}>{{ $destination_country }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('destination_country_id'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('destination_country_id') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.experience.fields.destination_country_helper') }}</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="industry_id">{{ trans('cruds.experience.fields.industry') }}</label>
                                        <select class="form-control select2 {{ $errors->has('industry') ? 'is-invalid' : '' }}" name="industry_id" id="industry_id">
                                            @foreach($industries as $id => $industry)
                                                <option value="{{ $id }}" {{ ($experience->industry ? $experience->industry->id : old('industry_id')) == $id ? 'selected' : '' }}>{{ $industry }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('industry_id'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('industry_id') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.experience.fields.industry_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="emloyment_date">{{ trans('cruds.experience.fields.emloyment_date') }}</label>
                                        <input class="form-control date {{ $errors->has('emloyment_date') ? 'is-invalid' : '' }}" type="text" name="emloyment_date" id="emloyment_date" value="{{ old('emloyment_date', $experience->emloyment_date) }}">
                                        @if($errors->has('emloyment_date'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('emloyment_date') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.experience.fields.emloyment_date_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="employment_period">{{ trans('cruds.experience.fields.employment_period') }}</label>
                                        <input class="form-control {{ $errors->has('employment_period') ? 'is-invalid' : '' }}" type="number" name="employment_period" id="employment_period" value="{{ old('employment_period', $experience->employment_period) }}" step="1">
                                        @if($errors->has('employment_period'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('employment_period') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.experience.fields.employment_period_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="monthly_salary">{{ trans('cruds.experience.fields.monthly_salary') }}</label>
                                        <input class="form-control {{ $errors->has('monthly_salary') ? 'is-invalid' : '' }}" type="number" name="monthly_salary" id="monthly_salary" value="{{ old('monthly_salary', $experience->monthly_salary) }}" step="0.01">
                                        @if($errors->has('monthly_salary'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('monthly_salary') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.experience.fields.monthly_salary_helper') }}</span>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-danger" type="submit">
                                            {{ trans('global.save') }}
                                        </button>
                                    </div>
                                </form>
                                @endif
                            </div>


                            <div class="tab-pane" id="change_email">

                                <!-- Change Email Address -->
                                <div class="widget change-email mb-0">
                                    <h3 class="widget-header user">Edit Email Address</h3>
                                    <form action="#">
                                        <!-- Current Password -->
                                        <div class="form-group">
                                            <label for="current-email">Current Email</label>
                                            <input type="email" class="form-control" id="current-email">
                                        </div>
                                        <!-- New email -->
                                        <div class="form-group">
                                            <label for="new-email">New email</label>
                                            <input type="email" class="form-control" id="new-email">
                                        </div>
                                        <!-- Submit Button -->
                                        <button class="btn btn-transparent">Change email</button>
                                    </form>
                                </div>
                            </div>


                            <div class="tab-pane" id="change_password">
                                <!-- Change Password -->
                                <div class="widget change-password">
                                    <h3 class="widget-header user">Edit Password</h3>
                                    <form action="#">
                                        <!-- Current Password -->
                                        <div class="form-group">
                                            <label for="current-password">Current Password</label>
                                            <input type="password" class="form-control" id="current-password">
                                        </div>
                                        <!-- New Password -->
                                        <div class="form-group">
                                            <label for="new-password">New Password</label>
                                            <input type="password" class="form-control" id="new-password">
                                        </div>
                                        <!-- Confirm New Password -->
                                        <div class="form-group">
                                            <label for="confirm-password">Confirm New Password</label>
                                            <input type="password" class="form-control" id="confirm-password">
                                        </div>
                                        <!-- Submit Button -->
                                        <button class="btn btn-transparent">Change Password</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- End Tab Content-->
                        @php
                            echo '<pre>';

                            var_dump($profile_picture);
                               echo '</pre>';
                        @endphp

                    </div>
                </div>
            </div>
    </section>

@stop
