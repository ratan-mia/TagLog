<div class="form-group">
    <label for="longitude">{{ trans('cruds.agent.fields.longitude') }}</label>
    <input id="searchMapInput" class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude') }}">
    @if($errors->has('longitude'))
    <div class="invalid-feedback">
        {{ $errors->first('longitude') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.agent.fields.longitude_helper') }}</span>
</div>
