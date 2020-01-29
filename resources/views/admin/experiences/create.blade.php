@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.experience.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.experiences.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.experience.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
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
                <label for="agent_id">{{ trans('cruds.experience.fields.agent') }}</label>
                <select class="form-control select2 {{ $errors->has('agent') ? 'is-invalid' : '' }}" name="agent_id" id="agent_id">
                    @foreach($agents as $id => $agent)
                        <option value="{{ $id }}" {{ old('agent_id') == $id ? 'selected' : '' }}>{{ $agent }}</option>
                    @endforeach
                </select>
                @if($errors->has('agent_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.agent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="destination_id">{{ trans('cruds.experience.fields.destination') }}</label>
                <select class="form-control select2 {{ $errors->has('destination') ? 'is-invalid' : '' }}" name="destination_id" id="destination_id">
                    @foreach($destinations as $id => $destination)
                        <option value="{{ $id }}" {{ old('destination_id') == $id ? 'selected' : '' }}>{{ $destination }}</option>
                    @endforeach
                </select>
                @if($errors->has('destination_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destination_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.destination_helper') }}</span>
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.experience.fields.visa_type') }}</label>
                <select class="form-control {{ $errors->has('visa_type') ? 'is-invalid' : '' }}" name="visa_type" id="visa_type">
                    <option value disabled {{ old('visa_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Experience::VISA_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('visa_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('visa_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visa_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.visa_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.experience.fields.application_period') }}</label>
                <select class="form-control {{ $errors->has('application_period') ? 'is-invalid' : '' }}" name="application_period" id="application_period">
                    <option value disabled {{ old('application_period', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Experience::APPLICATION_PERIOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('application_period', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('application_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('application_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.application_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expenses_paid">{{ trans('cruds.experience.fields.expenses_paid') }}</label>
                <input class="form-control {{ $errors->has('expenses_paid') ? 'is-invalid' : '' }}" type="text" name="expenses_paid" id="expenses_paid" value="{{ old('expenses_paid', '') }}">
                @if($errors->has('expenses_paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expenses_paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.expenses_paid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="visa_application_rating">{{ trans('cruds.experience.fields.visa_application_rating') }}</label>
                <input class="form-control {{ $errors->has('visa_application_rating') ? 'is-invalid' : '' }}" type="number" name="visa_application_rating" id="visa_application_rating" value="{{ old('visa_application_rating', '') }}" step="1">
                @if($errors->has('visa_application_rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visa_application_rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.visa_application_rating_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="language_training_rating">{{ trans('cruds.experience.fields.language_training_rating') }}</label>
                <input class="form-control {{ $errors->has('language_training_rating') ? 'is-invalid' : '' }}" type="number" name="language_training_rating" id="language_training_rating" value="{{ old('language_training_rating', '') }}" step="1">
                @if($errors->has('language_training_rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language_training_rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.language_training_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.experience.fields.language_level') }}</label>
                <select class="form-control {{ $errors->has('language_level') ? 'is-invalid' : '' }}" name="language_level" id="language_level">
                    <option value disabled {{ old('language_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Experience::LANGUAGE_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('language_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('language_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.language_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agent_rating">{{ trans('cruds.experience.fields.agent_rating') }}</label>
                <input class="form-control {{ $errors->has('agent_rating') ? 'is-invalid' : '' }}" type="number" name="agent_rating" id="agent_rating" value="{{ old('agent_rating') }}" step="1">
                @if($errors->has('agent_rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent_rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.agent_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agent_feedback">{{ trans('cruds.experience.fields.agent_feedback') }}</label>
                <textarea class="form-control {{ $errors->has('agent_feedback') ? 'is-invalid' : '' }}" name="agent_feedback" id="agent_feedback">{{ old('agent_feedback') }}</textarea>
                @if($errors->has('agent_feedback'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agent_feedback') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.agent_feedback_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employer_id">{{ trans('cruds.experience.fields.employer') }}</label>
                <select class="form-control select2 {{ $errors->has('employer') ? 'is-invalid' : '' }}" name="employer_id" id="employer_id">
                    @foreach($employers as $id => $employer)
                        <option value="{{ $id }}" {{ old('employer_id') == $id ? 'selected' : '' }}>{{ $employer }}</option>
                    @endforeach
                </select>
                @if($errors->has('employer_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employer_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.employer_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="employer_location">{{ trans('cruds.experience.fields.employer_location') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('employer_location') ? 'is-invalid' : '' }}" name="employer_location" id="employer_location">{!! old('employer_location') !!}</textarea>
                @if($errors->has('employer_location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employer_location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.employer_location_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="industry_id">{{ trans('cruds.experience.fields.industry') }}</label>
                <select class="form-control select2 {{ $errors->has('industry') ? 'is-invalid' : '' }}" name="industry_id" id="industry_id">
                    @foreach($industries as $id => $industry)
                        <option value="{{ $id }}" {{ old('industry_id') == $id ? 'selected' : '' }}>{{ $industry }}</option>
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
                <input class="form-control date {{ $errors->has('emloyment_date') ? 'is-invalid' : '' }}" type="text" name="emloyment_date" id="emloyment_date" value="{{ old('emloyment_date') }}">
                @if($errors->has('emloyment_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('emloyment_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.emloyment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employment_period">{{ trans('cruds.experience.fields.employment_period') }}</label>
                <input class="form-control {{ $errors->has('employment_period') ? 'is-invalid' : '' }}" type="number" name="employment_period" id="employment_period" value="{{ old('employment_period') }}" step="1">
                @if($errors->has('employment_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employment_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.employment_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_salary">{{ trans('cruds.experience.fields.monthly_salary') }}</label>
                <input class="form-control {{ $errors->has('monthly_salary') ? 'is-invalid' : '' }}" type="number" name="monthly_salary" id="monthly_salary" value="{{ old('monthly_salary') }}" step="0.01">
                @if($errors->has('monthly_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.monthly_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_living_expenses">{{ trans('cruds.experience.fields.monthly_living_expenses') }}</label>
                <input class="form-control {{ $errors->has('monthly_living_expenses') ? 'is-invalid' : '' }}" type="number" name="monthly_living_expenses" id="monthly_living_expenses" value="{{ old('monthly_living_expenses') }}" step="0.01">
                @if($errors->has('monthly_living_expenses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_living_expenses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.monthly_living_expenses_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.experience.fields.accommodation_type') }}</label>
                <select class="form-control {{ $errors->has('accommodation_type') ? 'is-invalid' : '' }}" name="accommodation_type" id="accommodation_type">
                    <option value disabled {{ old('accommodation_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Experience::ACCOMMODATION_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('accommodation_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('accommodation_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('accommodation_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.accommodation_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.experience.fields.weekly_working_hours') }}</label>
                <select class="form-control {{ $errors->has('weekly_working_hours') ? 'is-invalid' : '' }}" name="weekly_working_hours" id="weekly_working_hours">
                    <option value disabled {{ old('weekly_working_hours', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Experience::WEEKLY_WORKING_HOURS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('weekly_working_hours', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('weekly_working_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weekly_working_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.weekly_working_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_days_off">{{ trans('cruds.experience.fields.monthly_days_off') }}</label>
                <input class="form-control {{ $errors->has('monthly_days_off') ? 'is-invalid' : '' }}" type="number" name="monthly_days_off" id="monthly_days_off" value="{{ old('monthly_days_off') }}" step="1">
                @if($errors->has('monthly_days_off'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_days_off') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.monthly_days_off_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.experience.fields.next_year_opportunity') }}</label>
                @foreach(App\Experience::NEXT_YEAR_OPPORTUNITY_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('next_year_opportunity') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="next_year_opportunity_{{ $key }}" name="next_year_opportunity" value="{{ $key }}" {{ old('next_year_opportunity', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="next_year_opportunity_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('next_year_opportunity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('next_year_opportunity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.next_year_opportunity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employer_rating">{{ trans('cruds.experience.fields.employer_rating') }}</label>
                <input class="form-control {{ $errors->has('employer_rating') ? 'is-invalid' : '' }}" type="number" name="employer_rating" id="employer_rating" value="{{ old('employer_rating') }}" step="1">
                @if($errors->has('employer_rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employer_rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.employer_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employer_feedback">{{ trans('cruds.experience.fields.employer_feedback') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('employer_feedback') ? 'is-invalid' : '' }}" name="employer_feedback" id="employer_feedback">{!! old('employer_feedback') !!}</textarea>
                @if($errors->has('employer_feedback'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employer_feedback') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.employer_feedback_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
