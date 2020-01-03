<div class="form-group">
    <label for="language_training_rating">{{ trans('cruds.experience.fields.language_training_rating') }}</label>
    <input class="form-control {{ $errors->has('language_training_rating') ? 'is-invalid' : '' }}" type="number" name="language_training_rating" id="language_training_rating" value="{{ old('language_training_rating', $experience->language_training_rating) }}" step="1">
    @if($errors->has('language_training_rating'))
    <div class="invalid-feedback">
        {{ $errors->first('language_training_rating') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.experience.fields.language_training_rating_helper') }}</span>
</div>
