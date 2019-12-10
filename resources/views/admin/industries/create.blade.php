@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.industry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.industries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.industry.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.industry.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="minimum_salary">{{ trans('cruds.industry.fields.minimum_salary') }}</label>
                <input class="form-control {{ $errors->has('minimum_salary') ? 'is-invalid' : '' }}" type="number" name="minimum_salary" id="minimum_salary" value="{{ old('minimum_salary') }}" step="0.01">
                @if($errors->has('minimum_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('minimum_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.minimum_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="maximum_salary">{{ trans('cruds.industry.fields.maximum_salary') }}</label>
                <input class="form-control {{ $errors->has('maximum_salary') ? 'is-invalid' : '' }}" type="number" name="maximum_salary" id="maximum_salary" value="{{ old('maximum_salary') }}" step="0.01">
                @if($errors->has('maximum_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('maximum_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.maximum_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.industry.fields.education_level') }}</label>
                <select class="form-control {{ $errors->has('education_level') ? 'is-invalid' : '' }}" name="education_level" id="education_level">
                    <option value disabled {{ old('education_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Industry::EDUCATION_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('education_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('education_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.education_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.industry.fields.training_level') }}</label>
                <select class="form-control {{ $errors->has('training_level') ? 'is-invalid' : '' }}" name="training_level" id="training_level">
                    <option value disabled {{ old('training_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Industry::TRAINING_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('training_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('training_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('training_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.training_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.industry.fields.language_course') }}</label>
                @foreach(App\Industry::LANGUAGE_COURSE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('language_course') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="language_course_{{ $key }}" name="language_course" value="{{ $key }}" {{ old('language_course', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="language_course_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('language_course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language_course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.language_course_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.industry.fields.language_course_level') }}</label>
                <select class="form-control {{ $errors->has('language_course_level') ? 'is-invalid' : '' }}" name="language_course_level" id="language_course_level">
                    <option value disabled {{ old('language_course_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Industry::LANGUAGE_COURSE_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('language_course_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('language_course_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language_course_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.language_course_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icon">{{ trans('cruds.industry.fields.icon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('icon') ? 'is-invalid' : '' }}" id="icon-dropzone">
                </div>
                @if($errors->has('icon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.icon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.industry.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_titile">{{ trans('cruds.industry.fields.banner_titile') }}</label>
                <input class="form-control {{ $errors->has('banner_titile') ? 'is-invalid' : '' }}" type="text" name="banner_titile" id="banner_titile" value="{{ old('banner_titile', '') }}">
                @if($errors->has('banner_titile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_titile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.banner_titile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_image">{{ trans('cruds.industry.fields.banner_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('banner_image') ? 'is-invalid' : '' }}" id="banner_image-dropzone">
                </div>
                @if($errors->has('banner_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.banner_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_text">{{ trans('cruds.industry.fields.banner_text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('banner_text') ? 'is-invalid' : '' }}" name="banner_text" id="banner_text">{!! old('banner_text') !!}</textarea>
                @if($errors->has('banner_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.banner_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery">{{ trans('cruds.industry.fields.gallery') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
                </div>
                @if($errors->has('gallery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.gallery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sliders">{{ trans('cruds.industry.fields.sliders') }}</label>
                <div class="needsclick dropzone {{ $errors->has('sliders') ? 'is-invalid' : '' }}" id="sliders-dropzone">
                </div>
                @if($errors->has('sliders'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sliders') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.industry.fields.sliders_helper') }}</span>
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
    Dropzone.options.iconDropzone = {
    url: '{{ route('admin.industries.storeMedia') }}',
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
      $('form').find('input[name="icon"]').remove()
      $('form').append('<input type="hidden" name="icon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="icon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($industry) && $industry->icon)
      var file = {!! json_encode($industry->icon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $industry->icon->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="icon" value="' + file.file_name + '">')
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.industries.storeMedia') }}',
    maxFilesize: 8, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8,
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
@if(isset($industry) && $industry->logo)
      var file = {!! json_encode($industry->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $industry->logo->getUrl('thumb') }}')
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
    url: '{{ route('admin.industries.storeMedia') }}',
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
@if(isset($industry) && $industry->banner_image)
      var file = {!! json_encode($industry->banner_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $industry->banner_image->getUrl('thumb') }}')
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
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.industries.storeMedia') }}',
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
@if(isset($industry) && $industry->gallery)
      var files =
        {!! json_encode($industry->gallery) !!}
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
    var uploadedSlidersMap = {}
Dropzone.options.slidersDropzone = {
    url: '{{ route('admin.industries.storeMedia') }}',
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
@if(isset($industry) && $industry->sliders)
      var files =
        {!! json_encode($industry->sliders) !!}
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
@endsection