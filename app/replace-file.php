<div class="form-group">
    <label for="map">{{ trans('cruds.setting.fields.map') }}</label>
    <textarea class="form-control ckeditor {{ $errors->has('map') ? 'is-invalid' : '' }}" name="map" id="map">{!! old('map', $setting->map) !!}</textarea>
    @if($errors->has('map'))
    <div class="invalid-feedback">
        {{ $errors->first('map') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.setting.fields.map_helper') }}</span>
</div>
