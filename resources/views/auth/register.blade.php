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


                            <!--Phone Number-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                           type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                                    @if($errors->has('phone'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('phone') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="facebook">{{ trans('cruds.user.fields.facebook') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}"
                                           type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                                    @if($errors->has('facebook'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('facebook') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.facebook_helper') }}</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="skype">{{ trans('cruds.user.fields.skype') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}"
                                           type="text" name="skype" id="skype" value="{{ old('skype', '') }}">
                                    @if($errors->has('skype'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('skype') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.skype_helper') }}</span>
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

                            <!--Work Preference(Technical Intern Trainee-->

                            <!--Expected Destination Area-->

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="destination_country_id">{{ trans('cruds.user.fields.destination_area') }}</label>
                                <div class="col-md-6">
                                    <select
                                        class="form-control select2 {{ $errors->has('destination_country') ? 'is-invalid' : '' }}"
                                        name="destination_country_id" id="destination_country_id">
                                        @foreach($destination_countries as $id => $destination_country)
                                            <option
                                                value="{{ $id }}" {{ old('destination_country_id') == $id ? 'selected' : '' }}>{{ $destination_country }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('destination_country_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('destination_country_id') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.user.fields.destination_country_helper') }}</span>
                                </div>
                            </div>


                            <!-- Expected Industries-->

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="expected_industries">{{ trans('cruds.user.fields.expected_industries') }}</label>
                                <div class="col-md-6">
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
                                                value="{{ $id }}" {{ in_array($id, old('expected_industries', [])) ? 'selected' : '' }}>{{ $expected_industries }}</option>
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
                            </div>
                            <!-- Expected Salary-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="expected_salary">{{ trans('cruds.user.fields.expected_salary') }}</label>
                                <div class="col-md-6">
                                    <input
                                        class="form-control {{ $errors->has('expected_salary') ? 'is-invalid' : '' }}"
                                        type="number" name="expected_salary" id="expected_salary"
                                        value="{{ old('expected_salary') }}" step="0.01">
                                    @if($errors->has('expected_salary'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('expected_salary') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.user.fields.expected_salary_helper') }}</span>
                                </div>
                            </div>

                            <!--Date of Leaving-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="date_of_leaving">{{ trans('cruds.user.fields.date_of_leaving_register') }}</label>
                                <div class="col-md-6">
                                    <input
                                        class="form-control date {{ $errors->has('date_of_leaving') ? 'is-invalid' : '' }}"
                                        type="text" name="date_of_leaving" id="date_of_leaving"
                                        value="{{ old('date_of_leaving') }}">
                                    @if($errors->has('date_of_leaving'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('date_of_leaving') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.user.fields.date_of_leaving_helper') }}</span>
                                </div>
                            </div>
                            <!--Share Sending Organization Experience(Technical Intern Trainee)-->
                            <!--Name of Agent-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="agents_id">{{ trans('cruds.user.fields.agents_register') }}</label>
                                <div class="col-md-6">
                                    <select
                                        class="form-control select2 {{ $errors->has('agents') ? 'is-invalid' : '' }}"
                                        name="agents_id" id="agents_id">
                                        @foreach($agents as $id => $agents)
                                            <option
                                                value="{{ $id }}" {{ old('agents_id') == $id ? 'selected' : '' }}>{{ $agents }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('agents_id'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('agents_id') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.agents_helper') }}</span>
                                </div>
                            </div>

                            <!--Expense Paid-->

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="expenses_paid">{{ trans('cruds.experience.fields.expenses_paid') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control {{ $errors->has('expenses_paid') ? 'is-invalid' : '' }}"
                                           type="text" name="expenses_paid" id="expenses_paid"
                                           value="{{ old('expenses_paid', '') }}">
                                    @if($errors->has('expenses_paid'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('expenses_paid') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.experience.fields.expenses_paid_helper') }}</span>
                                </div>
                            </div>
                            <!--Visa Application Rating-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="visa_application_rating">{{ trans('cruds.experience.fields.visa_application_rating') }}</label>
                                <div class="col-md-6">
                                    <input
                                        class="form-control {{ $errors->has('visa_application_rating') ? 'is-invalid' : '' }}"
                                        type="number" name="visa_application_rating" id="visa_application_rating"
                                        value="{{ old('visa_application_rating', '') }}" step="1">
                                    @if($errors->has('visa_application_rating'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('visa_application_rating') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.experience.fields.visa_application_rating_helper') }}</span>
                                </div>
                            </div>

                            <!--Language Training Rating-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="language_training_rating">{{ trans('cruds.experience.fields.language_training_rating') }}</label>
                                <div class="col-md-6">
                                    <input
                                        class="form-control {{ $errors->has('language_training_rating') ? 'is-invalid' : '' }}"
                                        type="number" name="language_training_rating" id="language_training_rating"
                                        value="{{ old('language_training_rating', '') }}" step="1">
                                    @if($errors->has('language_training_rating'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('language_training_rating') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.experience.fields.language_training_rating_helper') }}</span>
                                </div>
                            </div>

                            <!--Agent Rating-->

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="agent_rating">{{ trans('cruds.experience.fields.agent_rating') }}</label>
                                <div class="col-md-6">
                                    <input class="form-control {{ $errors->has('agent_rating') ? 'is-invalid' : '' }}"
                                           type="number" name="agent_rating" id="agent_rating"
                                           value="{{ old('agent_rating') }}" step="1">
                                    @if($errors->has('agent_rating'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('agent_rating') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.experience.fields.agent_rating_helper') }}</span>
                                </div>
                            </div>

                            <!--Free Comment About Sending Agent-->
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="agent_feedback">{{ trans('cruds.experience.fields.agent_feedback') }}</label>
                                <div class="col-md-6">
                                    <textarea
                                        class="form-control {{ $errors->has('agent_feedback') ? 'is-invalid' : '' }}"
                                        name="agent_feedback" id="agent_feedback">{{ old('agent_feedback') }}</textarea>
                                    @if($errors->has('agent_feedback'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('agent_feedback') }}
                                        </div>
                                    @endif
                                    <span
                                        class="help-block">{{ trans('cruds.experience.fields.agent_feedback_helper') }}</span>
                                </div>
                            </div>

                            <!--Share Employer  Experience(Technical Intern Trainee)-->
                            <!--Employer Name-->

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right"
                                       for="employer_id">{{ trans('cruds.experience.fields.employer') }}</label>
                                <div class="col-md-6">
                                    <select
                                        class="form-control select2 {{ $errors->has('employer_id') ? 'is-invalid' : '' }}"
                                        name="employer_id" id="employer_id">
                                        @foreach($employers ?? '' as $id => $employer)
                                            <option
                                                value="{{ $id }}" {{ old('employer_id') == $id ? 'selected' : '' }}>{{ $employer }}</option>
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
