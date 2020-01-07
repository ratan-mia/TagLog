<div class="form-group">
    <label>{{ trans('cruds.user.fields.user_status') }}</label>
    <select class="form-control {{ $errors->has('user_status') ? 'is-invalid' : '' }}" name="user_status"
            id="user_status">
        <option value
                disabled {{ old('user_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach($visas as $key => $label)
        <option
                value="{{ $key }}" {{ old('user_status', $user->user_status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($errors->has('user_status'))
    <div class="invalid-feedback">
        {{ $errors->first('user_status') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.user.fields.user_status_helper') }}</span>
</div>