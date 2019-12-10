@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.visa.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.visas.update", [$visa->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.visa.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $visa->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">{{ trans('cruds.visa.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', $visa->type) }}">
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.visa.fields.countries_without_visa') }}</label>
                <select class="form-control {{ $errors->has('countries_without_visa') ? 'is-invalid' : '' }}" name="countries_without_visa" id="countries_without_visa">
                    <option value disabled {{ old('countries_without_visa', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Visa::COUNTRIES_WITHOUT_VISA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('countries_without_visa', $visa->countries_without_visa) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('countries_without_visa'))
                    <div class="invalid-feedback">
                        {{ $errors->first('countries_without_visa') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.countries_without_visa_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="duration">{{ trans('cruds.visa.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', $visa->duration) }}" step="1">
                @if($errors->has('duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.visa.fields.work_permit') }}</label>
                @foreach(App\Visa::WORK_PERMIT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('work_permit') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="work_permit_{{ $key }}" name="work_permit" value="{{ $key }}" {{ old('work_permit', $visa->work_permit) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="work_permit_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('work_permit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_permit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.work_permit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="working_limit">{{ trans('cruds.visa.fields.working_limit') }}</label>
                <input class="form-control {{ $errors->has('working_limit') ? 'is-invalid' : '' }}" type="number" name="working_limit" id="working_limit" value="{{ old('working_limit', $visa->working_limit) }}" step="1">
                @if($errors->has('working_limit'))
                    <div class="invalid-feedback">
                        {{ $errors->first('working_limit') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.working_limit_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.visa.fields.industries') }}</label>
                <select class="form-control {{ $errors->has('industries') ? 'is-invalid' : '' }}" name="industries" id="industries">
                    <option value disabled {{ old('industries', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Visa::INDUSTRIES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('industries', $visa->industries) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('industries'))
                    <div class="invalid-feedback">
                        {{ $errors->first('industries') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.industries_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.visa.fields.language_traning') }}</label>
                @foreach(App\Visa::LANGUAGE_TRANING_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('language_traning') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="language_traning_{{ $key }}" name="language_traning" value="{{ $key }}" {{ old('language_traning', $visa->language_traning) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="language_traning_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('language_traning'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language_traning') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.language_traning_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="training_duration">{{ trans('cruds.visa.fields.training_duration') }}</label>
                <input class="form-control {{ $errors->has('training_duration') ? 'is-invalid' : '' }}" type="number" name="training_duration" id="training_duration" value="{{ old('training_duration', $visa->training_duration) }}" step="1">
                @if($errors->has('training_duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('training_duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.training_duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.visa.fields.countries_restrictred') }}</label>
                <select class="form-control {{ $errors->has('countries_restrictred') ? 'is-invalid' : '' }}" name="countries_restrictred" id="countries_restrictred">
                    <option value disabled {{ old('countries_restrictred', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Visa::COUNTRIES_RESTRICTRED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('countries_restrictred', $visa->countries_restrictred) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('countries_restrictred'))
                    <div class="invalid-feedback">
                        {{ $errors->first('countries_restrictred') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.visa.fields.countries_restrictred_helper') }}</span>
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