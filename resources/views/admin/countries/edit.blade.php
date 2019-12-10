@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.country.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.countries.update", [$country->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.country.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $country->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="short_code">{{ trans('cruds.country.fields.short_code') }}</label>
                <input class="form-control {{ $errors->has('short_code') ? 'is-invalid' : '' }}" type="text" name="short_code" id="short_code" value="{{ old('short_code', $country->short_code) }}" required>
                @if($errors->has('short_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('short_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.short_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.country.fields.language') }}</label>
                <select class="form-control {{ $errors->has('language') ? 'is-invalid' : '' }}" name="language" id="language">
                    <option value disabled {{ old('language', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Country::LANGUAGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('language', $country->language) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.language_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.country.fields.currency') }}</label>
                <select class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency" id="currency">
                    <option value disabled {{ old('currency', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Country::CURRENCY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('currency', $country->currency) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="religion">{{ trans('cruds.country.fields.religion') }}</label>
                <textarea class="form-control {{ $errors->has('religion') ? 'is-invalid' : '' }}" name="religion" id="religion">{{ old('religion', $country->religion) }}</textarea>
                @if($errors->has('religion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('religion') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.religion_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.country.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $country->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.country.fields.safe_food') }}</label>
                @foreach(App\Country::SAFE_FOOD_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('safe_food') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="safe_food_{{ $key }}" name="safe_food" value="{{ $key }}" {{ old('safe_food', $country->safe_food) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="safe_food_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('safe_food'))
                    <div class="invalid-feedback">
                        {{ $errors->first('safe_food') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.safe_food_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="food">{{ trans('cruds.country.fields.food') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('food') ? 'is-invalid' : '' }}" name="food" id="food">{!! old('food', $country->food) !!}</textarea>
                @if($errors->has('food'))
                    <div class="invalid-feedback">
                        {{ $errors->first('food') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.food_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.country.fields.safe_medicine') }}</label>
                @foreach(App\Country::SAFE_MEDICINE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('safe_medicine') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="safe_medicine_{{ $key }}" name="safe_medicine" value="{{ $key }}" {{ old('safe_medicine', $country->safe_medicine) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="safe_medicine_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('safe_medicine'))
                    <div class="invalid-feedback">
                        {{ $errors->first('safe_medicine') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.safe_medicine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="health_insurance">{{ trans('cruds.country.fields.health_insurance') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('health_insurance') ? 'is-invalid' : '' }}" name="health_insurance" id="health_insurance">{!! old('health_insurance', $country->health_insurance) !!}</textarea>
                @if($errors->has('health_insurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('health_insurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.health_insurance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="healthcare">{{ trans('cruds.country.fields.healthcare') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('healthcare') ? 'is-invalid' : '' }}" name="healthcare" id="healthcare">{!! old('healthcare', $country->healthcare) !!}</textarea>
                @if($errors->has('healthcare'))
                    <div class="invalid-feedback">
                        {{ $errors->first('healthcare') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.healthcare_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.country.fields.taxi_available') }}</label>
                @foreach(App\Country::TAXI_AVAILABLE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('taxi_available') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="taxi_available_{{ $key }}" name="taxi_available" value="{{ $key }}" {{ old('taxi_available', $country->taxi_available) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="taxi_available_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('taxi_available'))
                    <div class="invalid-feedback">
                        {{ $errors->first('taxi_available') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.taxi_available_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transport">{{ trans('cruds.country.fields.transport') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('transport') ? 'is-invalid' : '' }}" name="transport" id="transport">{!! old('transport', $country->transport) !!}</textarea>
                @if($errors->has('transport'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transport') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.transport_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="culture">{{ trans('cruds.country.fields.culture') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('culture') ? 'is-invalid' : '' }}" name="culture" id="culture">{!! old('culture', $country->culture) !!}</textarea>
                @if($errors->has('culture'))
                    <div class="invalid-feedback">
                        {{ $errors->first('culture') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.culture_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="politics">{{ trans('cruds.country.fields.politics') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('politics') ? 'is-invalid' : '' }}" name="politics" id="politics">{!! old('politics', $country->politics) !!}</textarea>
                @if($errors->has('politics'))
                    <div class="invalid-feedback">
                        {{ $errors->first('politics') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.politics_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="flag">{{ trans('cruds.country.fields.flag') }}</label>
                <div class="needsclick dropzone {{ $errors->has('flag') ? 'is-invalid' : '' }}" id="flag-dropzone">
                </div>
                @if($errors->has('flag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.flag_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery">{{ trans('cruds.country.fields.gallery') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
                </div>
                @if($errors->has('gallery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.gallery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="additional_files">{{ trans('cruds.country.fields.additional_files') }}</label>
                <div class="needsclick dropzone {{ $errors->has('additional_files') ? 'is-invalid' : '' }}" id="additional_files-dropzone">
                </div>
                @if($errors->has('additional_files'))
                    <div class="invalid-feedback">
                        {{ $errors->first('additional_files') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.country.fields.additional_files_helper') }}</span>
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
    Dropzone.options.flagDropzone = {
    url: '{{ route('admin.countries.storeMedia') }}',
    maxFilesize: 64, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 64,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="flag"]').remove()
      $('form').append('<input type="hidden" name="flag" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="flag"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($country) && $country->flag)
      var file = {!! json_encode($country->flag) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $country->flag->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="flag" value="' + file.file_name + '">')
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
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.countries.storeMedia') }}',
    maxFilesize: 64, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 64,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($country) && $country->gallery)
      var files =
        {!! json_encode($country->gallery) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
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
<script>
    var uploadedAdditionalFilesMap = {}
Dropzone.options.additionalFilesDropzone = {
    url: '{{ route('admin.countries.storeMedia') }}',
    maxFilesize: 1024, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1024
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="additional_files[]" value="' + response.name + '">')
      uploadedAdditionalFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAdditionalFilesMap[file.name]
      }
      $('form').find('input[name="additional_files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($country) && $country->additional_files)
          var files =
            {!! json_encode($country->additional_files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="additional_files[]" value="' + file.file_name + '">')
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
@endsection