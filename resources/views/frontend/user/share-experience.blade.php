@extends('layouts.master')
@section('content')
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    {{--                    <div class="col-md-2"></div>--}}
                    <div class="col-md-8 offset-md-2 form-box registration">
                        <form role="form" action="{{ route('user.share-experience') }}" method="POST"
                              class="registration-form">
                            @csrf
                            <div class="form-top">
                                <div class="form-top-left">
                                    @if (url()->previous() == 'http://127.0.0.1:8000/user/work-preference')
                                        <h3>Step 3 / 3</h3>
                                    @endif
                                    <p>Share Your Experience:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <!--Share Sending Organization Experience(Technical Intern Trainee)-->
                                <!--Name of Agent-->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="agent_id">{{ trans('cruds.user.fields.agents_register') }}</label>
                                    <div class="col-md-6">
                                        <select
                                            class="form-control {{ $errors->has('agents') ? 'is-invalid' : '' }}"
                                            name="agent_id" id="agent_id">
                                            @foreach($agents as $id => $agent)
                                                <option
                                                    value="{{ $id }}" {{ old('agent_id') == $id ? 'selected' : '' }}>{{ $agent }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('agent_id'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('agent_id') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.user.fields.agents_helper') }}</span>
                                    </div>
                                </div>

                                <!--Expense Paid-->

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="expenses_paid">{{ trans('cruds.experience.fields.expenses_paid') }} ($)</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('expenses_paid') ? 'is-invalid' : '' }}"
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
                                           for="visa_application_rating">{{ trans('cruds.experience.fields.visa_application_rating') }}(Min:1, Max:5)</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('visa_application_rating') ? 'is-invalid' : '' }}"
                                            type="number" name="visa_application_rating" id="visa_application_rating"
                                            value="{{ old('visa_application_rating', '') }}" step="1" min="1" max="5">
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
                                           for="language_training_rating">{{ trans('cruds.experience.fields.language_training_rating') }}(Min:1, Max:5)</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('language_training_rating') ? 'is-invalid' : '' }}"
                                            type="number" name="language_training_rating" id="language_training_rating"
                                            value="{{ old('language_training_rating', '') }}" step="1" min="1" max="5">
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
                                           for="agent_rating">{{ trans('cruds.experience.fields.agent_rating') }} (Min:1, Max:5)</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('agent_rating') ? 'is-invalid' : '' }}"
                                            type="number" name="agent_rating" id="agent_rating"
                                            value="{{ old('agent_rating') }}" step="1" min="1" max="5">
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
                                        class="form-control ckeditor {{ $errors->has('agent_feedback') ? 'is-invalid' : '' }}"
                                        name="agent_feedback"
                                        id="agent_feedback">{{ old('agent_feedback') }}</textarea>
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
                                            class="form-control {{ $errors->has('employer_id') ? 'is-invalid' : '' }}"
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

                                <!--Employer Location-->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="employer_location">{{ trans('cruds.experience.fields.employer_location') }}</label>
                                    <div class="col-md-6">
                                    <textarea
                                        class="form-control {{ $errors->has('employer_location') ? 'is-invalid' : '' }}"
                                        name="employer_location"
                                        id="employer_location">{!! old('employer_location') !!}</textarea>
                                        @if($errors->has('employer_location'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('employer_location') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.experience.fields.employer_location_helper') }}</span>
                                    </div>
                                </div>

                                <!--Industry/Job Type-->

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="industry_id">{{ trans('cruds.experience.fields.industry') }}</label>
                                    <div class="col-md-6">
                                        <select
                                            class="form-control{{ $errors->has('industry') ? 'is-invalid' : '' }}"
                                            name="industry_id" id="industry_id">
                                            @foreach($industries as $id => $industry)
                                                <option
                                                    value="{{ $id }}" {{ old('industry_id') == $id ? 'selected' : '' }}>{{ $industry }}</option>
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
                                </div>

                                <!--Employment Date-->

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="emloyment_date">{{ trans('cruds.experience.fields.emloyment_date') }}</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control date {{ $errors->has('emloyment_date') ? 'is-invalid' : '' }}"
                                            type="text" name="emloyment_date" id="emloyment_date"
                                            value="{{ old('emloyment_date') }}">
                                        @if($errors->has('emloyment_date'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('emloyment_date') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.experience.fields.emloyment_date_helper') }}</span>
                                    </div>
                                </div>
                                <!--Employment Period-->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="employment_period">{{ trans('cruds.experience.fields.employment_period') }}</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('employment_period') ? 'is-invalid' : '' }}"
                                            type="number" name="employment_period" id="employment_period"
                                            value="{{ old('employment_period') }}" step="1" min="1" max="100">
                                        @if($errors->has('employment_period'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('employment_period') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.experience.fields.employment_period_helper') }}</span>
                                    </div>
                                </div>

                                <!--Monthly Salary-->

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="monthly_salary">{{ trans('cruds.experience.fields.monthly_salary') }} ($)</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('monthly_salary') ? 'is-invalid' : '' }}"
                                            type="number" name="monthly_salary" id="monthly_salary"
                                            value="{{ old('monthly_salary') }}" step="1" min="1" max="1000000">
                                        @if($errors->has('monthly_salary'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('monthly_salary') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.experience.fields.monthly_salary_helper') }}</span>
                                    </div>
                                </div>

                                <!--Monthly Living Expenses-->

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="monthly_living_expenses">{{ trans('cruds.experience.fields.monthly_living_expenses') }} ($)</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('monthly_living_expenses') ? 'is-invalid' : '' }}"
                                            type="number" name="monthly_living_expenses" id="monthly_living_expenses"
                                            value="{{ old('monthly_living_expenses') }}" step="1" min="1" max="1000000">
                                        @if($errors->has('monthly_living_expenses'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('monthly_living_expenses') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.experience.fields.monthly_living_expenses_helper') }}</span>
                                    </div>
                                </div>

                                <!--Weekly Working Hours-->

                                <div class="form-group row">
                                    <label
                                        class="col-md-4 col-form-label text-md-right">{{ trans('cruds.experience.fields.weekly_working_hours') }}</label>
                                    <div class="col-md-6">
                                        <select
                                            class="form-control {{ $errors->has('weekly_working_hours') ? 'is-invalid' : '' }}"
                                            name="weekly_working_hours" id="weekly_working_hours">
                                            <option value
                                                    disabled {{ old('weekly_working_hours', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                            @foreach(App\Experience::WEEKLY_WORKING_HOURS_SELECT as $key => $label)
                                                <option
                                                    value="{{ $key }}" {{ old('weekly_working_hours', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                                </div>

                                <!--Monthly Days off-->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="monthly_days_off">{{ trans('cruds.experience.fields.monthly_days_off') }}</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('monthly_days_off') ? 'is-invalid' : '' }}"
                                            type="number" name="monthly_days_off" id="monthly_days_off"
                                            value="{{ old('monthly_days_off') }}" step="1" min="1" max="31">
                                        @if($errors->has('monthly_days_off'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('monthly_days_off') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.experience.fields.monthly_days_off_helper') }}</span>
                                    </div>
                                </div>

                                <!--Employer Rating-->

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="employer_rating">{{ trans('cruds.experience.fields.employer_rating') }}</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('employer_rating') ? 'is-invalid' : '' }}"
                                            type="number" name="employer_rating" id="employer_rating"
                                            value="{{ old('employer_rating') }}" step="1" min="1" max="10">
                                        @if($errors->has('employer_rating'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('employer_rating') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.experience.fields.employer_rating_helper') }}</span>
                                    </div>
                                </div>

                                <!--Employer Feedback-->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="employer_feedback">{{ trans('cruds.experience.fields.employer_feedback') }}</label>
                                    <div class="col-md-6">
                                    <textarea
                                        class="form-control ckeditor {{ $errors->has('employer_feedback') ? 'is-invalid' : '' }}"
                                        name="employer_feedback"
                                        id="employer_feedback">{!! old('employer_feedback') !!}</textarea>
                                        @if($errors->has('employer_feedback'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('employer_feedback') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.experience.fields.employer_feedback_helper') }}</span>
                                    </div>
                                </div>

                                {{--                                <button type="submit" class="btn btn-next taglog-button">Next</button>--}}


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-next">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    {{--    Step 1 End--}}
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.conditional').conditionize();
        });
    </script>
@endsection
