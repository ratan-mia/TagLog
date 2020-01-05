
<div class="form-group">
    <label for="destination_area">{{ trans('cruds.user.fields.destination_area') }}</label>
    <input class="form-control {{ $errors->has('destination_area') ? 'is-invalid' : '' }}" type="text" name="destination_area"
           id="destination_area" value="{{ old('destination_area', $user->destination_area) }}">
    @if($errors->has('destination_area'))
    <div class="invalid-feedback">
        {{ $errors->first('destination_area') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.user.fields.destination_area_helper') }}</span>
</div>
