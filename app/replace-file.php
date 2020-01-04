<div class="form-group">
    <label for="employer_location">{{ trans('cruds.employer.fields.employer_location') }}</label>
    <textarea class="form-control ckeditor {{ $errors->has('employer_location') ? 'is-invalid' : '' }}" name="employer_location" id="employer_location">{!! old('employer_location', $employer->employer_location) !!}</textarea>
    @if($errors->has('employer_location'))
    <div class="invalid-feedback">
        {{ $errors->first('employer_location') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.employer.fields.employer_location_helper') }}</span>
</div>
