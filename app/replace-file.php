<div class="form-group col-md-2">
    {{-- <label>{{ trans('cruds.user.fields.destination_id') }}</label>--}}
    <select class="form-control {{ $errors->has('destination_id') ? 'is-invalid' : '' }}"
            name="destination_id" id="destination_id">
        <option value
                disabled {{ old('destination_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
        @foreach($destinations as $key => $label)
        <option
            value="{{ $key }}" {{ old('destination_id', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($errors->has('destination_id'))
    <div class="invalid-feedback">
        {{ $errors->first('destination_id') }}
    </div>
    @endif
</div>
