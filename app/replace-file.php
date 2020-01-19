<!-- Advance Search -->
<div class="advance-search">
    <h4 class="search-title">Find Sending Organizations in your area</h4>
    <form action="{{ route('search') }}" method="GET">

        <div class="form-row">
            <div class="form-group col-md-2 offset-md-1">
                {{-- <label>{{ trans('cruds.user.fields.destination_id') }}</label>--}}
                <select
                    class="form-control {{ $errors->has('destination_id') ? 'is-invalid' : '' }}"
                    name="destination_id" id="destination_id">
                    <option value disabled {{ old('destination_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
                    <option value disabled {{ old('visa_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
                {{-- <label>{{ trans('cruds.user.fields.country_id') }}</label>--}}
                <select class="form-control {{ $errors->has('country_id') ? 'is-invalid' : '' }}"
                        name="country_id" id="country_id">
                    <option value disabled {{ old('country_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($search_countries as $key => $label)
                    <option
                        value="{{ $key }}" {{ old('country_id', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('country_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('country_id') }}
                </div>
                @endif
            </div>

            <div class="form-group col-md-2">
                {{--                                     <label>{{ trans('cruds.user.fields.city_id') }}</label>--}}
                <select class="form-control {{ $errors->has('city_id') ? 'is-invalid' : '' }}"
                        name="city_id" id="city_id">
                    <option value disabled {{ old('city_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($search_cities as $key => $label)
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

</div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Advance Search -->
