<div class="form-group">
    <label for="employers">{{ trans('cruds.agent.fields.employer') }}</label>
    <div style="padding-bottom: 4px">
        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
    </div>
    <select class="form-control select2 {{ $errors->has('employers') ? 'is-invalid' : '' }}" name="employers[]" id="employers" multiple>
        @foreach($employers as $id => $employer)
        <option value="{{ $id }}" {{ (in_array($id, old('employers', [])) || $agent->employers->contains($id)) ? 'selected' : '' }}>{{ $employer }}</option>
        @endforeach
    </select>
    @if($errors->has('employers'))
    <div class="invalid-feedback">
        {{ $errors->first('employers') }}
    </div>
    @endif
    <span class="help-block">{{ trans('cruds.agent.fields.employer_helper') }}</span>
</div>
