
<div class="form-group">
    <label>{{ trans('cruds.user.fields.education_background') }}</label>
    <select class="form-control {{ $errors->has('education_background') ? 'is-invalid' : '' }}" name="education_background" id="education_background">
        <option value disabled {{ old('education_background', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach(App\User::EDUCATION_BACKGROUND_SELECT as $key => $label)
        <option value="{{ $key }}" {{ old('education_background', $user->education_background) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($errors->has('education_background'))
    <div class="invalid-feedback">
        {{ $errors->first('education_background') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.user.fields.education_background_helper') }}</span>
</div>
