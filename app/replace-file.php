<input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
       type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
@if($errors->has('phone'))
<div class="invalid-feedback">
    {{ $errors->first('phone') }}
</div>
@endif
<span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
</div>
