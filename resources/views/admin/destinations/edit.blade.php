@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.destination.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.destinations.update", [$destination->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.destination.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $destination->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.destination.fields.language') }}</label>
                <select class="form-control {{ $errors->has('language') ? 'is-invalid' : '' }}" name="language" id="language">
                    <option value disabled {{ old('language', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Destination::LANGUAGE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('language', $destination->language) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.language_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="currency">{{ trans('cruds.destination.fields.currency') }}</label>
                <input class="form-control {{ $errors->has('currency') ? 'is-invalid' : '' }}" type="text" name="currency" id="currency" value="{{ old('currency', $destination->currency) }}">
                @if($errors->has('currency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('currency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.destination.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $destination->address) }}">
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="flag">{{ trans('cruds.destination.fields.flag') }}</label>
                <div class="needsclick dropzone {{ $errors->has('flag') ? 'is-invalid' : '' }}" id="flag-dropzone">
                </div>
                @if($errors->has('flag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.flag_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery">{{ trans('cruds.destination.fields.gallery') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
                </div>
                @if($errors->has('gallery'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gallery') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.gallery_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.destination.fields.industries') }}</label>
                <select class="form-control {{ $errors->has('industries') ? 'is-invalid' : '' }}" name="industries" id="industries">
                    <option value disabled {{ old('industries', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Destination::INDUSTRIES_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('industries', $destination->industries) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('industries'))
                    <div class="invalid-feedback">
                        {{ $errors->first('industries') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.industries_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employers">{{ trans('cruds.destination.fields.employers') }}</label>
                <input class="form-control {{ $errors->has('employers') ? 'is-invalid' : '' }}" type="text" name="employers" id="employers" value="{{ old('employers', $destination->employers) }}">
                @if($errors->has('employers'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employers') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.employers_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.destination.fields.agents') }}</label>
                <select class="form-control {{ $errors->has('agents') ? 'is-invalid' : '' }}" name="agents" id="agents">
                    <option value disabled {{ old('agents', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Destination::AGENTS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('agents', $destination->agents) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('agents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.agents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hourly_salary">{{ trans('cruds.destination.fields.hourly_salary') }}</label>
                <input class="form-control {{ $errors->has('hourly_salary') ? 'is-invalid' : '' }}" type="number" name="hourly_salary" id="hourly_salary" value="{{ old('hourly_salary', $destination->hourly_salary) }}" step="0.01">
                @if($errors->has('hourly_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hourly_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.hourly_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="monthly_salary">{{ trans('cruds.destination.fields.monthly_salary') }}</label>
                <input class="form-control {{ $errors->has('monthly_salary') ? 'is-invalid' : '' }}" type="number" name="monthly_salary" id="monthly_salary" value="{{ old('monthly_salary', $destination->monthly_salary) }}" step="0.01">
                @if($errors->has('monthly_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monthly_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.monthly_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="yearly_salary">{{ trans('cruds.destination.fields.yearly_salary') }}</label>
                <input class="form-control {{ $errors->has('yearly_salary') ? 'is-invalid' : '' }}" type="text" name="yearly_salary" id="yearly_salary" value="{{ old('yearly_salary', $destination->yearly_salary) }}">
                @if($errors->has('yearly_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('yearly_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.yearly_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.destination.fields.safe_medicine') }}</label>
                @foreach(App\Destination::SAFE_MEDICINE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('safe_medicine') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="safe_medicine_{{ $key }}" name="safe_medicine" value="{{ $key }}" {{ old('safe_medicine', $destination->safe_medicine) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="safe_medicine_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('safe_medicine'))
                    <div class="invalid-feedback">
                        {{ $errors->first('safe_medicine') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.safe_medicine_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="healthcare">{{ trans('cruds.destination.fields.healthcare') }}</label>
                <textarea class="form-control {{ $errors->has('healthcare') ? 'is-invalid' : '' }}" name="healthcare" id="healthcare">{{ old('healthcare', $destination->healthcare) }}</textarea>
                @if($errors->has('healthcare'))
                    <div class="invalid-feedback">
                        {{ $errors->first('healthcare') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.healthcare_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.destination.fields.taxi_available') }}</label>
                @foreach(App\Destination::TAXI_AVAILABLE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('taxi_available') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="taxi_available_{{ $key }}" name="taxi_available" value="{{ $key }}" {{ old('taxi_available', $destination->taxi_available) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="taxi_available_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('taxi_available'))
                    <div class="invalid-feedback">
                        {{ $errors->first('taxi_available') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.taxi_available_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="safety">{{ trans('cruds.destination.fields.safety') }}</label>
                <textarea class="form-control {{ $errors->has('safety') ? 'is-invalid' : '' }}" name="safety" id="safety">{{ old('safety', $destination->safety) }}</textarea>
                @if($errors->has('safety'))
                    <div class="invalid-feedback">
                        {{ $errors->first('safety') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.safety_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="culture">{{ trans('cruds.destination.fields.culture') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('culture') ? 'is-invalid' : '' }}" name="culture" id="culture">{!! old('culture', $destination->culture) !!}</textarea>
                @if($errors->has('culture'))
                    <div class="invalid-feedback">
                        {{ $errors->first('culture') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.culture_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="politics">{{ trans('cruds.destination.fields.politics') }}</label>
                <textarea class="form-control {{ $errors->has('politics') ? 'is-invalid' : '' }}" name="politics" id="politics">{{ old('politics', $destination->politics) }}</textarea>
                @if($errors->has('politics'))
                    <div class="invalid-feedback">
                        {{ $errors->first('politics') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.politics_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="insurance">{{ trans('cruds.destination.fields.insurance') }}</label>
                <textarea class="form-control {{ $errors->has('insurance') ? 'is-invalid' : '' }}" name="insurance" id="insurance">{{ old('insurance', $destination->insurance) }}</textarea>
                @if($errors->has('insurance'))
                    <div class="invalid-feedback">
                        {{ $errors->first('insurance') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.insurance_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documents">{{ trans('cruds.destination.fields.documents') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documents') ? 'is-invalid' : '' }}" id="documents-dropzone">
                </div>
                @if($errors->has('documents'))
                    <div class="invalid-feedback">
                        {{ $errors->first('documents') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.destination.fields.documents_helper') }}</span>
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
    url: '{{ route('admin.destinations.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 1200,
      height: 800
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
@if(isset($destination) && $destination->flag)
      var file = {!! json_encode($destination->flag) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $destination->flag->getUrl('thumb') }}')
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
    url: '{{ route('admin.destinations.storeMedia') }}',
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
@if(isset($destination) && $destination->gallery)
      var files =
        {!! json_encode($destination->gallery) !!}
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
    Dropzone.options.documentsDropzone = {
    url: '{{ route('admin.destinations.storeMedia') }}',
    maxFilesize: 64, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 64
    },
    success: function (file, response) {
      $('form').find('input[name="documents"]').remove()
      $('form').append('<input type="hidden" name="documents" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="documents"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($destination) && $destination->documents)
      var file = {!! json_encode($destination->documents) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="documents" value="' + file.file_name + '">')
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
@endsection