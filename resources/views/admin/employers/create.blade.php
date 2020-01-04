@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.employer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.employers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.employer.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.employer.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.employer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.phone_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="address">{{ trans('cruds.employer.fields.address') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{!! old('address') !!}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.employer.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="recruiting_workers">{{ trans('cruds.employer.fields.recruiting_workers') }}</label>
                <input class="form-control {{ $errors->has('recruiting_workers') ? 'is-invalid' : '' }}" type="number" name="recruiting_workers" id="recruiting_workers" value="{{ old('recruiting_workers') }}" step="1">
                @if($errors->has('recruiting_workers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('recruiting_workers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.recruiting_workers_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="countries">{{ trans('cruds.employer.fields.countries') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('countries') ? 'is-invalid' : '' }}" name="countries[]" id="countries" multiple>
                    @foreach($countries as $id => $countries)
                        <option value="{{ $id }}" {{ in_array($id, old('countries', [])) ? 'selected' : '' }}>{{ $countries }}</option>
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
                <label for="agents">{{ trans('cruds.employer.fields.agents') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('agents') ? 'is-invalid' : '' }}" name="agents[]" id="agents" multiple>
                    @foreach($agents as $id => $agents)
                        <option value="{{ $id }}" {{ in_array($id, old('agents', [])) ? 'selected' : '' }}>{{ $agents }}</option>
                    @endforeach
                </select>
                @if($errors->has('agents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.agents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="industries">{{ trans('cruds.employer.fields.industries') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('industries') ? 'is-invalid' : '' }}" name="industries[]" id="industries" multiple>
                    @foreach($industries as $id => $industries)
                        <option value="{{ $id }}" {{ in_array($id, old('industries', [])) ? 'selected' : '' }}>{{ $industries }}</option>
                    @endforeach
                </select>
                @if($errors->has('industries'))
                    <div class="invalid-feedback">
                        {{ $errors->first('industries') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.industries_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_salary">{{ trans('cruds.employer.fields.monthly_salary') }}</label>
                <input class="form-control {{ $errors->has('monthly_salary') ? 'is-invalid' : '' }}" type="number" name="monthly_salary" id="monthly_salary" value="{{ old('monthly_salary') }}" step="0.01">
                @if($errors->has('monthly_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.monthly_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="working_hours">{{ trans('cruds.employer.fields.working_hours') }}</label>
                <input class="form-control {{ $errors->has('working_hours') ? 'is-invalid' : '' }}" type="number" name="working_hours" id="working_hours" value="{{ old('working_hours') }}" step="1">
                @if($errors->has('working_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('working_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.working_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="days_off">{{ trans('cruds.employer.fields.days_off') }}</label>
                <input class="form-control {{ $errors->has('days_off') ? 'is-invalid' : '' }}" type="number" name="days_off" id="days_off" value="{{ old('days_off') }}" step="1">
                @if($errors->has('days_off'))
                    <div class="invalid-feedback">
                        {{ $errors->first('days_off') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.days_off_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.employer.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_titile">{{ trans('cruds.employer.fields.banner_titile') }}</label>
                <input class="form-control {{ $errors->has('banner_titile') ? 'is-invalid' : '' }}" type="text" name="banner_titile" id="banner_titile" value="{{ old('banner_titile', '') }}">
                @if($errors->has('banner_titile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_titile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.banner_titile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_image">{{ trans('cruds.employer.fields.banner_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('banner_image') ? 'is-invalid' : '' }}" id="banner_image-dropzone">
                </div>
                @if($errors->has('banner_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.banner_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner_text">{{ trans('cruds.employer.fields.banner_text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('banner_text') ? 'is-invalid' : '' }}" name="banner_text" id="banner_text">{!! old('banner_text') !!}</textarea>
                @if($errors->has('banner_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.banner_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery">{{ trans('cruds.employer.fields.gallery') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
                </div>
                @if($errors->has('gallery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.gallery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sliders">{{ trans('cruds.employer.fields.sliders') }}</label>
                <div class="needsclick dropzone {{ $errors->has('sliders') ? 'is-invalid' : '' }}" id="sliders-dropzone">
                </div>
                @if($errors->has('sliders'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sliders') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.employer.fields.sliders_helper') }}</span>
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
    url: '{{ route('admin.employers.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
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
@if(isset($employer) && $employer->logo)
      var file = {!! json_encode($employer->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $employer->logo->getUrl('thumb') }}')
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
    url: '{{ route('admin.employers.storeMedia') }}',
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
@if(isset($employer) && $employer->banner_image)
      var file = {!! json_encode($employer->banner_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $employer->banner_image->getUrl('thumb') }}')
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
    url: '{{ route('admin.employers.storeMedia') }}',
    maxFilesize: 64, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 64,
      width: 1600,
      height: 1600
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
@if(isset($employer) && $employer->gallery)
      var files =
        {!! json_encode($employer->gallery) !!}
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
    url: '{{ route('admin.employers.storeMedia') }}',
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
@if(isset($employer) && $employer->sliders)
      var files =
        {!! json_encode($employer->sliders) !!}
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
