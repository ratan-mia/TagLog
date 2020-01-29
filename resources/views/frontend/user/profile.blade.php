
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
                                @if($user->profile_picture)
                                    <a href="{{ $user->profile_picture->getUrl() }}" target="_blank">
                                        <img src="{{ $user->profile_picture->getUrl('avatar') }}" width="50px" height="50px">
                                    </a>
                                @endif

                            </div>
                            <!-- User Name -->
                            <h5 class="text-center">{{$user->name}}</h5>
                            <p>Email: {{$user->email}}</p>
                            <p>User ID: {{$user->id}}</p>
                        </div>
                        <!-- Dashboard Links -->
                        <div class="widget user-dashboard-menu">
                            <ul class="nav nav-tabs tabs-right">
                                <li>
                                    <a href="#basic_information" data-toggle="tab"><i class="fa fa-user"></i> Basic
                                        Information</a>
                                </li>
                                <li>
                                    <a href="#work_preference" data-toggle="tab"><i class="fa fa-briefcase"></i> Work
                                        Preference</a>
                                </li>
                                <li>
                                    <a href="#share_experience" data-toggle="tab"><i class="fa fa-briefcase"></i> Your
                                        Experience</a>
                                </li>
{{--                                <li>--}}
{{--                                    <a href="#change_email" data-toggle="tab"><i class="fa fa-envelope"></i>Change Email</a>--}}
{{--                                </li>--}}
                                <li>
                                    <a href="#change_photo" data-toggle="tab"><i class="fa fa-envelope"></i>Change Avatar</a>
                                </li>
                                <li>
                                    <a href="#change_password" data-toggle="tab"><i class="fa fa-briefcase"></i>Change
                                        Password</a>
                                </li>


                                <li>
                                    <a href="#"
                                       onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-cog"></i>Logout
                                    </a>
                                </li>
                            </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>


                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
                    <!-- Edit Personal Info -->
                    <div class="widget personal-info">

                        <div class="tab-content">

                            <div class="tab-pane active" id="basic_information">

                                <h3 class="widget-header user">Basic Information</h3>

                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route("user.update-basic-information", [$user->id]) }}"
                                      enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <!-- Name -->
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-6 col-form-label">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name" class="form-control" id="name"
                                                   value="{{$user->name}}">
                                        </div>
                                    </div>

                                    <!-- Nationality -->
                                    <div class="form-group row">
                                        <label for="nationality_id"
                                               class="col-sm-6 col-form-label">{{ trans('profile.basic-information.nationality') }}</label>
                                        <div class="col-sm-6">
                                            <select
                                                class="form-control{{ $errors->has('nationality') ? 'is-invalid' : '' }}"
                                                name="nationality_id" id="nationality_id">
                                                @foreach($nationalities as $id => $nationality)
                                                    <option
                                                        value="{{ $id }}" {{ ($user->nationality ? $user->nationality->id : old('nationality_id')) == $id ? 'selected' : '' }}>{{ $nationality }}</option>
                                                @endforeach
                                            </select>

                                            @if($errors->has('nationality_id'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('nationality_id') }}
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
                                                class="form-control {{ $errors->has('country_id') ? 'is-invalid' : '' }}"
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
                                            <input type="text" name="city" class="form-control" id="city"
                                                   value="{{$user->city}}">
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->

                                    <div class="form-group row">
                                        <label for="date_of_birth"
                                               class="col-sm-6 col-form-label">{{ trans('profile.basic-information.date_of_birth') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="date_of_birth" class="form-control date"
                                                   id="date_of_birth"
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
                                    <div class="form-group">
                                        <button class="btn" type="submit">
                                            {{ trans('global.update') }}
                                        </button>
                                    </div>
                                </form>
                            </div>

                            {{---------------------------------------Work Preference ------------------------------------------------------------
                            --------------------------------------------------------------------------------------------------------------------}}
                            <div class="tab-pane" id="work_preference">

                                <h3 class="widget-header user">Work Preference</h3>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                @if (is_null($user))
                                    <p>No Data Found</p>
                                    <p><a class="btn taglog-button" href="{{route('user.work-preference-form')}}">Add Now</a></p>
                                @else

                                    <form method="POST" action="{{ route("user.update-work-preference", [$user->id]) }}"
                                          enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf


                                        <div class="form-group">
                                            <label
                                                for="destination_area">{{ trans('cruds.user.fields.destination_area') }}</label>

                                            <select
                                                class="form-control {{ $errors->has('destination') ? 'is-invalid' : '' }}"
                                                name="destination_area" id="destination_area">
                                                @foreach($destination_areas as $id => $destination_area)
                                                    <option
                                                        value="{{ $id }}" {{ ($user->destination_area ? $user->area->id : old('destination_area')) == $id ? 'selected' : '' }}>{{ $destination_area }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('destination_area'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('destination_area') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.destination_area_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="expected_industries">{{ trans('cruds.user.fields.expected_industries') }}</label>
                                            <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                                <span class="btn btn-info btn-xs deselect-all"
                                                      style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                            </div>
                                            <select
                                                class="form-control select2 {{ $errors->has('expected_industries') ? 'is-invalid' : '' }}"
                                                name="expected_industries[]" id="expected_industries" multiple>
                                                @foreach($expected_industries as $id => $expected_industries)
                                                    <option
                                                        value="{{ $id }}" {{ (in_array($id, old('expected_industries', [])) || $user->industries->contains($id)) ? 'selected' : '' }}>{{ $expected_industries }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('expected_industries'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('expected_industries') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.expected_industries_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="expected_salary">{{ trans('cruds.user.fields.expected_salary') }}</label>
                                            <input
                                                class="form-control {{ $errors->has('expected_salary') ? 'is-invalid' : '' }}"
                                                type="number"
                                                name="expected_salary" id="expected_salary"
                                                value="{{ old('expected_salary', $user->expected_salary) }}"
                                                step="0.01">
                                            @if($errors->has('expected_salary'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('expected_salary') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.expected_salary_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <label
                                                for="date_of_leaving">{{ trans('cruds.user.fields.date_of_leaving') }}</label>
                                            <input
                                                class="form-control date {{ $errors->has('date_of_leaving') ? 'is-invalid' : '' }}"
                                                type="text" name="date_of_leaving" id="date_of_leaving"
                                                value="{{ old('date_of_leaving', $user->date_of_leaving) }}">
                                            @if($errors->has('date_of_leaving'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('date_of_leaving') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.date_of_leaving_helper') }}</span>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn" type="submit">
                                                {{ trans('global.save') }}
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </div>

                            {{-------------------------------------Change Email Tab Panel ------------------------------------------------------------
                            --------------------------------------------------------------------------------------------------------------------}}
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
                                        <button class="btn">Change email</button>
                                    </form>
                                </div>
                            </div>

                            {{-------------------------------------Change Photo ------------------------------------------------------------
                     --------------------------------------------------------------------------------------------------------------------}}
                            <div class="tab-pane" id="change_photo">

                                <!-- Change Email Address -->
                                <div class="widget change-email mb-0">
                                    <h3 class="widget-header user">Change Profile Picture</h3>
                                    <form method="POST" action="{{ route("user.update-profile-picture", [$user->id]) }}" enctype="multipart/form-data">
                                        {{--                                    @method('PUT')--}}
                                        @csrf
                                        <div class="form-group">
                                            <label for="profile_picture">{{ trans('cruds.user.fields.profile_picture') }}</label>
                                            {{--                                    <div class="needsclick dropzone {{ $errors->has('profile_picture') ? 'is-invalid' : '' }}"--}}
                                            {{--                                         id="profile_picture-dropzone">--}}
                                            {{--                                    </div>--}}
                                            <input class="form-control" type="file" id="profile_picture" name="profile_picture" >
                                            @if($errors->has('profile_picture'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('profile_picture') }}
                                                </div>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.user.fields.profile_picture_helper') }}</span>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn" type="submit">
                                                {{ trans('global.save') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            {{---------------------------------------Change Password------------------------------------------------------------
                            --------------------------------------------------------------------------------------------------------------------}}
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
                                        <button class="btn">Change Password</button>
                                    </form>
                                </div>
                            </div>
                            {{---------------------------------------Share Experience ------------------------------------------------------------
                            --------------------------------------------------------------------------------------------------------------------}}

                            <div class="tab-pane" id="share_experience">
                                <!-- Change Password -->
                                <div class="widget change-password">
                                    <h3 class="widget-header user">Share Experience</h3>

                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    @if (empty($experience))
                                        <p>You didn't share your experience yet.</p>
                                    <br>
                                        <p><a class="btn taglog-button" href="{{route('user.experience-form')}}">Share Now</a></p>
                                    @else
                                        <form method="POST"
                                              action="{{ route("admin.experiences.update", [$experience->id]) }}"
                                              enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        <!--Sending Organization-->

                                            <div class="form-group">
                                                <label
                                                    for="agent_id">{{ trans('cruds.experience.fields.agent') }}</label>
                                                <select
                                                    class="form-control {{ $errors->has('agent') ? 'is-invalid' : '' }}"
                                                    name="agent_id" id="agent_id">
                                                    @foreach($agents as $id => $agent)
                                                        <option
                                                            value="{{ $id }}" {{ ($experience->agent ? $experience->agent->id : old('agent_id')) == $id ? 'selected' : '' }}>{{ $agent }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('agent_id'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('agent_id') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.agent_helper') }}</span>
                                            </div>
                                            <!--Expense Paid-->

                                            <div class="form-group">
                                                <label
                                                    for="expenses_paid">{{ trans('cruds.experience.fields.expenses_paid') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('expenses_paid') ? 'is-invalid' : '' }}"
                                                    type="text" name="expenses_paid" id="expenses_paid"
                                                    value="{{ old('expenses_paid', $experience->expenses_paid) }}">
                                                @if($errors->has('expenses_paid'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('expenses_paid') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.expenses_paid_helper') }}</span>
                                            </div>
                                            <!--Visa Application Rating-->
                                            <div class="form-group">
                                                <label
                                                    for="visa_application_rating">{{ trans('cruds.experience.fields.visa_application_rating') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('visa_application_rating') ? 'is-invalid' : '' }}"
                                                    type="number" name="visa_application_rating"
                                                    id="visa_application_rating"
                                                    value="{{ old('visa_application_rating', $experience->visa_application_rating) }}"
                                                    step="1">
                                                @if($errors->has('visa_application_rating'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('visa_application_rating') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.visa_application_rating_helper') }}</span>
                                            </div>

                                            <!--Language Training Rating-->
                                            <div class="form-group">
                                                <label
                                                    for="language_training_rating">{{ trans('cruds.experience.fields.language_training_rating') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('language_training_rating') ? 'is-invalid' : '' }}"
                                                    type="number" name="language_training_rating"
                                                    id="language_training_rating"
                                                    value="{{ old('language_training_rating', $experience->language_training_rating) }}"
                                                    step="1">
                                                @if($errors->has('language_training_rating'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('language_training_rating') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.language_training_rating_helper') }}</span>
                                            </div>
                                            <!--Recommendation Rating about Sending Agent-->
                                            <div class="form-group">
                                                <label
                                                    for="agent_rating">{{ trans('cruds.experience.fields.agent_rating') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('agent_rating') ? 'is-invalid' : '' }}"
                                                    type="number" name="agent_rating" id="agent_rating"
                                                    value="{{ old('agent_rating', $experience->agent_rating) }}"
                                                    step="1">
                                                @if($errors->has('agent_rating'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('agent_rating') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.agent_rating_helper') }}</span>
                                            </div>
                                            <!--Agent Feedback-->
                                            <div class="form-group">
                                                <label
                                                    for="agent_feedback">{{ trans('cruds.experience.fields.agent_feedback') }}</label>
                                                <textarea
                                                    class="form-control {{ $errors->has('agent_feedback') ? 'is-invalid' : '' }}"
                                                    name="agent_feedback"
                                                    id="agent_feedback">{{ old('agent_feedback', $experience->agent_feedback) }}</textarea>
                                                @if($errors->has('agent_feedback'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('agent_feedback') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.agent_feedback_helper') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label
                                                    for="employer_id">{{ trans('cruds.experience.fields.employer') }}</label>
                                                <select
                                                    class="form-control {{ $errors->has('employer') ? 'is-invalid' : '' }}"
                                                    name="employer_id" id="employer_id">
                                                    @foreach($employers as $id => $employer)
                                                        <option
                                                            value="{{ $id }}" {{ ($experience->employer ? $experience->employer->id : old('employer_id')) == $id ? 'selected' : '' }}>{{ $employer }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('employer_id'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('employer_id') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.employer_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="employer_location">{{ trans('cruds.experience.fields.employer_location') }}</label>
                                                <textarea
                                                    class="form-control ckeditor {{ $errors->has('employer_location') ? 'is-invalid' : '' }}"
                                                    name="employer_location"
                                                    id="employer_location">{!! old('employer_location', $experience->employer_location) !!}</textarea>
                                                @if($errors->has('employer_location'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('employer_location') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.employer_location_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="industry_id">{{ trans('cruds.experience.fields.industry') }}</label>
                                                <select
                                                    class="form-control {{ $errors->has('industry') ? 'is-invalid' : '' }}"
                                                    name="industry_id" id="industry_id">
                                                    @foreach($industries as $id => $industry)
                                                        <option
                                                            value="{{ $id }}" {{ ($experience->industry ? $experience->industry->id : old('industry_id')) == $id ? 'selected' : '' }}>{{ $industry }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('industry_id'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('industry_id') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.industry_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="emloyment_date">{{ trans('cruds.experience.fields.emloyment_date') }}</label>
                                                <input
                                                    class="form-control date {{ $errors->has('emloyment_date') ? 'is-invalid' : '' }}"
                                                    type="text" name="emloyment_date" id="emloyment_date"
                                                    value="{{ old('emloyment_date', $experience->emloyment_date) }}">
                                                @if($errors->has('emloyment_date'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('emloyment_date') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.emloyment_date_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="employment_period">{{ trans('cruds.experience.fields.employment_period') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('employment_period') ? 'is-invalid' : '' }}"
                                                    type="number" name="employment_period" id="employment_period"
                                                    value="{{ old('employment_period', $experience->employment_period) }}"
                                                    step="1">
                                                @if($errors->has('employment_period'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('employment_period') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.employment_period_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="monthly_salary">{{ trans('cruds.experience.fields.monthly_salary') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('monthly_salary') ? 'is-invalid' : '' }}"
                                                    type="number" name="monthly_salary" id="monthly_salary"
                                                    value="{{ old('monthly_salary', $experience->monthly_salary) }}"
                                                    step="0.01">
                                                @if($errors->has('monthly_salary'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('monthly_salary') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.monthly_salary_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="monthly_living_expenses">{{ trans('cruds.experience.fields.monthly_living_expenses') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('monthly_living_expenses') ? 'is-invalid' : '' }}"
                                                    type="number" name="monthly_living_expenses"
                                                    id="monthly_living_expenses"
                                                    value="{{ old('monthly_living_expenses', $experience->monthly_living_expenses) }}"
                                                    step="0.01">
                                                @if($errors->has('monthly_living_expenses'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('monthly_living_expenses') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.monthly_living_expenses_helper') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label>{{ trans('cruds.experience.fields.weekly_working_hours') }}</label>
                                                <select
                                                    class="form-control {{ $errors->has('weekly_working_hours') ? 'is-invalid' : '' }}"
                                                    name="weekly_working_hours" id="weekly_working_hours">
                                                    <option value
                                                            disabled {{ old('weekly_working_hours', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                                    @foreach(App\Experience::WEEKLY_WORKING_HOURS_SELECT as $key => $label)
                                                        <option
                                                            value="{{ $key }}" {{ old('weekly_working_hours', $experience->weekly_working_hours) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('weekly_working_hours'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('weekly_working_hours') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.weekly_working_hours_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="monthly_days_off">{{ trans('cruds.experience.fields.monthly_days_off') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('monthly_days_off') ? 'is-invalid' : '' }}"
                                                    type="number" name="monthly_days_off" id="monthly_days_off"
                                                    value="{{ old('monthly_days_off', $experience->monthly_days_off) }}"
                                                    step="1">
                                                @if($errors->has('monthly_days_off'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('monthly_days_off') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.monthly_days_off_helper') }}</span>
                                            </div>

                                            <div class="form-group">
                                                <label
                                                    for="employer_rating">{{ trans('cruds.experience.fields.employer_rating') }}</label>
                                                <input
                                                    class="form-control {{ $errors->has('employer_rating') ? 'is-invalid' : '' }}"
                                                    type="number" name="employer_rating" id="employer_rating"
                                                    value="{{ old('employer_rating', $experience->employer_rating) }}"
                                                    step="1">
                                                @if($errors->has('employer_rating'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('employer_rating') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.employer_rating_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <label
                                                    for="employer_feedback">{{ trans('cruds.experience.fields.employer_feedback') }}</label>
                                                <textarea
                                                    class="form-control ckeditor {{ $errors->has('employer_feedback') ? 'is-invalid' : '' }}"
                                                    name="employer_feedback"
                                                    id="employer_feedback">{!! old('employer_feedback', $experience->employer_feedback) !!}</textarea>
                                                @if($errors->has('employer_feedback'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('employer_feedback') }}
                                                    </div>
                                                @endif
                                                <span
                                                    class="help-block">{{ trans('cruds.experience.fields.employer_feedback_helper') }}</span>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn" type="submit">
                                                    {{ trans('global.update') }}
                                                </button>
                                            </div>
                                        </form>

                                        @endif


                                </div>
                            </div>


                        </div>

                        <!-- End Tab Content-->

                    </div>
                </div>
            </div>
    </section>

@stop
