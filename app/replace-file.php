<div class="form-group">
    <label for="destination_id">{{ trans('cruds.experience.fields.destination_country') }}</label>
    <select class="form-control select2 {{ $errors->has('destination_country') ? 'is-invalid' : '' }}" name="destination_id" id="destination_id">
        @foreach($destination_countries as $id => $destination_country)
        <option value="{{ $id }}" {{ ($experience->destination_country ? $experience->destination_country->id : old('destination_id')) == $id ? 'selected' : '' }}>{{ $destination_country }}</option>
        @endforeach
    </select>
    @if($errors->has('destination_id'))
    <div class="invalid-feedback">
        {{ $errors->first('destination_id') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.experience.fields.destination_country_helper') }}</span>
</div>
