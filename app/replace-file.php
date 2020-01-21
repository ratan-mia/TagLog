<div class="form-group col-md-2">
    {{-- <label>{{ trans('cruds.user.fields.industry_id') }}</label>--}}
    <select class="form-control {{ $errors->has('industry_id') ? 'is-invalid' : '' }}"
            name="industry_id" id="industry_id">
        <option value disabled {{ old('industry_id', null) === null ? 'selected' : '' }}>{{ trans('forms.industry') }}</option>
        @foreach($search_industries as $key => $label)
        <option
            value="{{ $key }}" {{ old('industry_id', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
    @if($errors->has('industry_id'))
    <div class="invalid-feedback">
        {{ $errors->first('industry_id') }}
    </div>
    @endif
</div>
