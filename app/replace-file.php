<div class="form-group">
    <label>{{ trans('cruds.user.fields.language_level') }}</label>
    <select class="form-control {{ $errors->has('language_level') ? 'is-invalid' : '' }}" name="language_level" id="language_level">
        <option value disabled {{ old('language_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach(App\User::LANGUAGE_LEVEL_SELECT as $key => $label)
        <option value="{{ $key }}" {{ old('language_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($errors->has('language_level'))
    <div class="invalid-feedback">
        {{ $errors->first('language_level') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.user.fields.language_level_helper') }}</span>
</div>
