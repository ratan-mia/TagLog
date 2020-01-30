@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.setting.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.setting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.setting.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}">
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.setting.fields.address') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{!! old('address') !!}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.setting.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="philosophy_title">{{ trans('cruds.setting.fields.philosophy_title') }}</label>
                <input class="form-control {{ $errors->has('philosophy_title') ? 'is-invalid' : '' }}" type="text" name="philosophy_title" id="philosophy_title" value="{{ old('philosophy_title', '') }}">
                @if($errors->has('philosophy_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('philosophy_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.philosophy_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="philosophy_sentence">{{ trans('cruds.setting.fields.philosophy_sentence') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('philosophy_sentence') ? 'is-invalid' : '' }}" name="philosophy_sentence" id="philosophy_sentence">{!! old('philosophy_sentence') !!}</textarea>
                @if($errors->has('philosophy_sentence'))
                    <div class="invalid-feedback">
                        {{ $errors->first('philosophy_sentence') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.philosophy_sentence_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="philosophy_image">{{ trans('cruds.setting.fields.philosophy_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('philosophy_image') ? 'is-invalid' : '' }}" id="philosophy_image-dropzone">
                </div>
                @if($errors->has('philosophy_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('philosophy_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.philosophy_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mission_title">{{ trans('cruds.setting.fields.mission_title') }}</label>
                <input class="form-control {{ $errors->has('mission_title') ? 'is-invalid' : '' }}" type="text" name="mission_title" id="mission_title" value="{{ old('mission_title', '') }}">
                @if($errors->has('mission_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mission_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.mission_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mission_sentence">{{ trans('cruds.setting.fields.mission_sentence') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('mission_sentence') ? 'is-invalid' : '' }}" name="mission_sentence" id="mission_sentence">{!! old('mission_sentence') !!}</textarea>
                @if($errors->has('mission_sentence'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mission_sentence') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.mission_sentence_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="business_title">{{ trans('cruds.setting.fields.business_title') }}</label>
                <input class="form-control {{ $errors->has('business_title') ? 'is-invalid' : '' }}" type="text" name="business_title" id="business_title" value="{{ old('business_title', '') }}">
                @if($errors->has('business_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('business_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.business_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="business_sentence">{{ trans('cruds.setting.fields.business_sentence') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('business_sentence') ? 'is-invalid' : '' }}" name="business_sentence" id="business_sentence">{!! old('business_sentence', $setting->business_sentence) !!}</textarea>
                @if($errors->has('business_sentence'))
                    <div class="invalid-feedback">
                        {{ $errors->first('business_sentence') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.business_sentence_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="business_image">{{ trans('cruds.setting.fields.business_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('business_image') ? 'is-invalid' : '' }}" id="business_image-dropzone">
                </div>
                @if($errors->has('business_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('business_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.business_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="map">{{ trans('cruds.setting.fields.map') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('map') ? 'is-invalid' : '' }}" name="map" id="map">{!! old('map') !!}</textarea>
                @if($errors->has('map'))
                    <div class="invalid-feedback">
                        {{ $errors->first('map') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.map_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="slider">{{ trans('cruds.setting.fields.slider') }}</label>
                <div class="needsclick dropzone {{ $errors->has('slider') ? 'is-invalid' : '' }}" id="slider-dropzone">
                </div>
                @if($errors->has('slider'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slider') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.slider_helper') }}</span>
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
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1200,
      height: 800
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
@if(isset($setting) && $setting->logo)
      var file = {!! json_encode($setting->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $setting->logo->getUrl('thumb') }}')
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
    Dropzone.options.philosophyImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="philosophy_image"]').remove()
      $('form').append('<input type="hidden" name="philosophy_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="philosophy_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->philosophy_image)
      var file = {!! json_encode($setting->philosophy_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $setting->philosophy_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="philosophy_image" value="' + file.file_name + '">')
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
    Dropzone.options.businessImageDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="business_image"]').remove()
      $('form').append('<input type="hidden" name="business_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="business_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->business_image)
      var file = {!! json_encode($setting->business_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $setting->business_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="business_image" value="' + file.file_name + '">')
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
    var uploadedSliderMap = {}
Dropzone.options.sliderDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
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
      $('form').append('<input type="hidden" name="slider[]" value="' + response.name + '">')
      uploadedSliderMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedSliderMap[file.name]
      }
      $('form').find('input[name="slider[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($setting) && $setting->slider)
      var files =
        {!! json_encode($setting->slider) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="slider[]" value="' + file.file_name + '">')
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
