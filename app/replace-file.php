<div class="form-group">
    <label for="nationality_id">{{ trans('cruds.user.fields.nationality') }}</label>
    <select class="form-control select2 {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality_id" id="nationality_id">
        @foreach($nationalities as $id => $nationality)
        <option value="{{ $id }}" {{ old('nationality_id') == $id ? 'selected' : '' }}>{{ $nationality }}</option>
        @endforeach
    </select>
    @if($errors->has('nationality_id'))
    <div class="invalid-feedback">
        {{ $errors->first('nationality_id') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.user.fields.nationality_helper') }}</span>
</div>
