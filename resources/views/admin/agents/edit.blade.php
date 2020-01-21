@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.agent.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.agents.update", [$agent->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.agent.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $agent->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.agent.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $agent->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.agent.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $agent->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.phone_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="address">{{ trans('cruds.agent.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $agent->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="latitude">{{ trans('cruds.agent.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', $agent->location->latitude) }}">
                @if($errors->has('latitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('latitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="longitude">{{ trans('cruds.agent.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', $agent->location->longitude) }}">
                @if($errors->has('longitude'))
                    <div class="invalid-feedback">
                        {{ $errors->first('longitude') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.longitude_helper') }}</span>
            </div>

            <div class="form-group {{ $errors->has('city_id') ? 'has-error' : '' }}">
                <label for="city">{{ trans('cruds.agent.fields.city') }}</label>
                <select name="city_id" id="city" class="form-control select2">
                    @foreach($cities as $id => $city)
                        <option value="{{ $id }}" {{ (isset($agent) && $agent->city ? $agent->city->id : old('city_id')) == $id ? 'selected' : '' }}>{{ $city }}</option>
                    @endforeach
                </select>
                @if($errors->has('city_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('city_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group">
                <label for="countries">{{ trans('cruds.employer.fields.countries') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('countries') ? 'is-invalid' : '' }}" name="countries[]" id="countries" multiple>
                    @foreach($countries as $id => $countries)
                        <option value="{{ $id }}" {{ (in_array($id, old('countries', [])) || $agent->countries->contains($id)) ? 'selected' : '' }}>{{ $countries }}</option>
                    @endforeach
                </select>
                @if($errors->has('countries'))
                    <div class="invalid-feedback">
                        {{ $errors->first('countries') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.countries_helper') }}</span>
            </div>


            <div class="form-group">
                <label for="overview">{{ trans('cruds.agent.fields.overview') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('overview') ? 'is-invalid' : '' }}" name="overview" id="overview">{!! old('overview', $agent->overview) !!}</textarea>
                @if($errors->has('overview'))
                    <div class="invalid-feedback">
                        {{ $errors->first('overview') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.overview_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="map">{{ trans('cruds.agent.fields.map') }}</label>
                <textarea class="form-control {{ $errors->has('map') ? 'is-invalid' : '' }}" name="map" id="map">{{ old('map', $agent->map) }}</textarea>
                @if($errors->has('map'))
                    <div class="invalid-feedback">
                        {{ $errors->first('map') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.map_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.agent.fields.interview_period') }}</label>
                <select class="form-control {{ $errors->has('interview_period') ? 'is-invalid' : '' }}" name="interview_period" id="interview_period">
                    <option value disabled {{ old('interview_period', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Agent::INTERVIEW_PERIOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('interview_period', $agent->interview_period) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('interview_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('interview_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.interview_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_expense">{{ trans('cruds.agent.fields.total_expense') }}</label>
                <input class="form-control {{ $errors->has('total_expense') ? 'is-invalid' : '' }}" type="number" name="total_expense" id="total_expense" value="{{ old('total_expense', $agent->total_expense) }}" step="0.01">
                @if($errors->has('total_expense'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_expense') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.total_expense_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.agent.fields.language_level') }}</label>
                <select class="form-control {{ $errors->has('language_level') ? 'is-invalid' : '' }}" name="language_level" id="language_level">
                    <option value disabled {{ old('language_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Agent::LANGUAGE_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('language_level', $agent->language_level) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('language_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.language_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="destinations">{{ trans('cruds.agent.fields.destination') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('destinations') ? 'is-invalid' : '' }}" name="destinations[]" id="destinations" multiple>
                    @foreach($destinations as $id => $destination)
                        <option value="{{ $id }}" {{ (in_array($id, old('destinations', [])) || $agent->destinations->contains($id)) ? 'selected' : '' }}>{{ $destination }}</option>
                    @endforeach
                </select>
                @if($errors->has('destinations'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destinations') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.destination_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="industries">{{ trans('cruds.agent.fields.industry') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('industries') ? 'is-invalid' : '' }}" name="industries[]" id="industries" multiple>
                    @foreach($industries as $id => $industry)
                        <option value="{{ $id }}" {{ (in_array($id, old('industries', [])) || $agent->industries->contains($id)) ? 'selected' : '' }}>{{ $industry }}</option>
                    @endforeach
                </select>
                @if($errors->has('industries'))
                    <div class="invalid-feedback">
                        {{ $errors->first('industries') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.industry_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="visas">{{ trans('cruds.agent.fields.visa') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('visas') ? 'is-invalid' : '' }}" name="visas[]" id="visas" multiple>
                    @foreach($visas as $id => $visa)
                        <option value="{{ $id }}" {{ (in_array($id, old('visas', [])) || $agent->visas->contains($id)) ? 'selected' : '' }}>{{ $visa }}</option>
                    @endforeach
                </select>
                @if($errors->has('visas'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visas') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.visa_helper') }}</span>
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="employers">{{ trans('cruds.agent.fields.employer') }}</label>--}}
{{--                <div style="padding-bottom: 4px">--}}
{{--                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>--}}
{{--                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>--}}
{{--                </div>--}}
{{--                <select class="form-control select2 {{ $errors->has('employers') ? 'is-invalid' : '' }}" name="employers[]" id="employers" multiple>--}}
{{--                    @foreach($employers as $id => $employer)--}}
{{--                        <option value="{{ $id }}" {{ (in_array($id, old('employers', [])) || $agent->employers->contains($id)) ? 'selected' : '' }}>{{ $employer }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                @if($errors->has('employers'))--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('employers') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <span class="help-block">{{ trans('cruds.agent.fields.employer_helper') }}</span>--}}
{{--            </div>--}}

            <div class="form-group">
                <label for="employers">{{ trans('cruds.agent.fields.employers') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('employers') ? 'is-invalid' : '' }}" name="employers[]" id="employers" multiple>
                    @foreach($employers as $id => $employers)
                        <option value="{{ $id }}" {{ (in_array($id, old('employers', [])) || $agent->employers->contains($id)) ? 'selected' : '' }}>{{ $employers }}</option>
                    @endforeach
                </select>
                @if($errors->has('employers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.employers_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.agent.fields.leaving_period') }}</label>
                <select class="form-control {{ $errors->has('leaving_period') ? 'is-invalid' : '' }}" name="leaving_period" id="leaving_period">
                    <option value disabled {{ old('leaving_period', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Agent::LEAVING_PERIOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('leaving_period', $agent->leaving_period) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('leaving_period'))
                    <div class="invalid-feedback">
                        {{ $errors->first('leaving_period') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.leaving_period_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="workers_sent">{{ trans('cruds.agent.fields.workers_sent') }}</label>
                <input class="form-control {{ $errors->has('workers_sent') ? 'is-invalid' : '' }}" type="number" name="workers_sent" id="workers_sent" value="{{ old('workers_sent', $agent->workers_sent) }}" step="1">
                @if($errors->has('workers_sent'))
                    <div class="invalid-feedback">
                        {{ $errors->first('workers_sent') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.workers_sent_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.agent.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_titile">{{ trans('cruds.agent.fields.banner_titile') }}</label>
                <input class="form-control {{ $errors->has('banner_titile') ? 'is-invalid' : '' }}" type="text" name="banner_titile" id="banner_titile" value="{{ old('banner_titile', $agent->banner_titile) }}">
                @if($errors->has('banner_titile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_titile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.banner_titile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_image">{{ trans('cruds.agent.fields.banner_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('banner_image') ? 'is-invalid' : '' }}" id="banner_image-dropzone">
                </div>
                @if($errors->has('banner_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.banner_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_text">{{ trans('cruds.agent.fields.banner_text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('banner_text') ? 'is-invalid' : '' }}" name="banner_text" id="banner_text">{!! old('banner_text', $agent->banner_text) !!}</textarea>
                @if($errors->has('banner_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.banner_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sliders">{{ trans('cruds.agent.fields.sliders') }}</label>
                <div class="needsclick dropzone {{ $errors->has('sliders') ? 'is-invalid' : '' }}" id="sliders-dropzone">
                </div>
                @if($errors->has('sliders'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sliders') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.agent.fields.sliders_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.agents.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1024,
      height: 1024
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($agent) && $agent->logo)
      var file = {!! json_encode($agent->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $agent->logo->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.bannerImageDropzone = {
    url: '{{ route('admin.agents.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="banner_image"]').remove()
      $('form').append('<input type="hidden" name="banner_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="banner_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($agent) && $agent->banner_image)
      var file = {!! json_encode($agent->banner_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $agent->banner_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="banner_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    var uploadedSlidersMap = {}
Dropzone.options.slidersDropzone = {
    url: '{{ route('admin.agents.storeMedia') }}',
    maxFilesize: 64, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 64,
      width: 1920,
      height: 1080
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="sliders[]" value="' + response.name + '">')
      uploadedSlidersMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedSlidersMap[file.name]
      }
      $('form').find('input[name="sliders[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($agent) && $agent->sliders)
      var files =
        {!! json_encode($agent->sliders) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="sliders[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
/ Google Map Suggestion
<script>
    function initMap() {
        var input = document.getElementById('address');

        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            // document.getElementById('address').value = place.formatted_address;
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD33mG6FBa2qlnMV7VnASFAdgBg2EQeDZ8&libraries=places&callback=initMap" async defer></script>
@endsection
