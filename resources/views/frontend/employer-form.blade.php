<form action="{{ route('search') }}" method="POST">
    @csrf
    <input type="hidden" name="type" value="employer">
    <div class="form-row">
        <div class="form-group col-md-2 offset-md-1">
            {{-- <label>{{ trans('cruds.user.fields.destination_id') }}</label>--}}
            <select
                class="form-control {{ $errors->has('destination_id') ? 'is-invalid' : '' }}"
                name="destination_id" id="destination_id">
                <option value disabled {{ old('destination_id', null) === null ? 'selected' : '' }}>{{ trans('Destination(Japan only)') }}</option>
                @foreach($search_destinations as $key => $label)
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

        <div class="form-group col-md-2">
            {{--                                    <label>{{ trans('cruds.user.fields.visa_type') }}</label>--}}
            <select class="form-control {{ $errors->has('visa_type') ? 'is-invalid' : '' }}"
                    name="visa_type" id="visa_type">
                <option value disabled {{ old('visa_type', null) === null ? 'selected' : '' }}>{{ trans('Visa Type') }}</option>
                @foreach($search_visas as $key => $label)
                    <option
                        value="{{ $key }}" {{ old('visa_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @if($errors->has('visa_type'))
                <div class="invalid-feedback">
                    {{ $errors->first('visa_type') }}
                </div>
            @endif
        </div>

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

        <div class="form-group col-md-2">
            {{--                                     <label>{{ trans('cruds.user.fields.city_id') }}</label>--}}
            <select class="form-control {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                    name="city_id" id="city_id">
                <option value disabled {{ old('city_id', null) === null ? 'selected' : '' }}>{{ trans('forms.area') }}</option>
                @foreach($search_areas as $key => $label)
                    <option
                        value="{{ $key }}" {{ old('city_id', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @if($errors->has('city_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('city_id') }}
                </div>
            @endif
        </div>


        <div class="form-group col-md-2">
            <button type="submit"
                    class="btn btn-main">
                Search Now
            </button>
        </div>
    </div>
</form>
