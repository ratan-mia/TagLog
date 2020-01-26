<!--industry-->
<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right"
           for="industry_id">{{ trans('cruds.user.fields.industry') }}</label>
    <div class="col-md-6">
        <select
            class="form-control select2 {{ $errors->has('industry') ? 'is-invalid' : '' }}"
            name="industry_id" id="industry_id">
            @foreach($industries as $id => $industry)
            <option
                value="{{ $id }}" {{ old('industry_id') == $id ? 'selected' : '' }}>{{ $industry }}</option>
            @endforeach
        </select>
        @if($errors->has('industry_id'))
        <div class="invalid-feedback">
            {{ $errors->first('industry_id') }}
        </div>
        @endif
        <span class="help-block">{{ trans('cruds.user.fields.industry_helper') }}</span>
    </div>
</div>
