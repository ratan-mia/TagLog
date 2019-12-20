@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="country_id">{{ trans('cruds.user.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                    @foreach($countries as $id => $country)
                        <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
                @if($errors->has('country_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="nationality_id">{{ trans('cruds.user.fields.nationality') }}</label>
                <select class="form-control select2 {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality_id" id="nationality_id">
                    @foreach($nationalities as $id => $nationality)
                        <option value="{{ $id }}" {{ old('nationality_id') == $id ? 'selected' : '' }}>{{ $nationality }}</option>
                    @endforeach
                </select>
                @if($errors->has('nationality_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nationality_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.nationality_helper') }}</span>
            </div>



            <div class="form-group">
                <label for="city">{{ trans('cruds.user.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_birth">{{ trans('cruds.user.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}">
                @if($errors->has('date_of_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.gender') }}</label>
                @foreach(App\User::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.education_level') }}</label>
                <select class="form-control {{ $errors->has('education_level') ? 'is-invalid' : '' }}" name="education_level" id="education_level">
                    <option value disabled {{ old('education_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\User::EDUCATION_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('education_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('education_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.education_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.language_level') }}</label>
                <select class="form-control {{ $errors->has('language_level') ? 'is-invalid' : '' }}" name="language_level" id="language_level">
                    <option value disabled {{ old('language_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\User::LANGUAGE_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('language_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('language_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.language_level_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.user.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', '') }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="skype">{{ trans('cruds.user.fields.skype') }}</label>
                <input class="form-control {{ $errors->has('skype') ? 'is-invalid' : '' }}" type="text" name="skype" id="skype" value="{{ old('skype', '') }}">
                @if($errors->has('skype'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skype') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.skype_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="destination_country_id">{{ trans('cruds.user.fields.destination_country') }}</label>
                <select class="form-control select2 {{ $errors->has('destination_country') ? 'is-invalid' : '' }}" name="destination_country_id" id="destination_country_id">
                    @foreach($destination_countries as $id => $destination_country)
                        <option value="{{ $id }}" {{ old('destination_country_id') == $id ? 'selected' : '' }}>{{ $destination_country }}</option>
                    @endforeach
                </select>
                @if($errors->has('destination_country_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('destination_country_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.destination_country_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.visa_type') }}</label>
                <select class="form-control {{ $errors->has('visa_type') ? 'is-invalid' : '' }}" name="visa_type" id="visa_type">
                    <option value disabled {{ old('visa_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($visas as $key => $label)
                        <option value="{{ $key }}" {{ old('visa_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('visa_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visa_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.visa_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expected_industries">{{ trans('cruds.user.fields.expected_industries') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('expected_industries') ? 'is-invalid' : '' }}" name="expected_industries[]" id="expected_industries" multiple>
                    @foreach($expected_industries as $id => $expected_industries)
                        <option value="{{ $id }}" {{ in_array($id, old('expected_industries', [])) ? 'selected' : '' }}>{{ $expected_industries }}</option>
                    @endforeach
                </select>
                @if($errors->has('expected_industries'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expected_industries') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.expected_industries_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="expected_salary">{{ trans('cruds.user.fields.expected_salary') }}</label>
                <input class="form-control {{ $errors->has('expected_salary') ? 'is-invalid' : '' }}" type="number" name="expected_salary" id="expected_salary" value="{{ old('expected_salary') }}" step="0.01">
                @if($errors->has('expected_salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('expected_salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.expected_salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_leaving">{{ trans('cruds.user.fields.date_of_leaving') }}</label>
                <input class="form-control date {{ $errors->has('date_of_leaving') ? 'is-invalid' : '' }}" type="text" name="date_of_leaving" id="date_of_leaving" value="{{ old('date_of_leaving') }}">
                @if($errors->has('date_of_leaving'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_leaving') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.date_of_leaving_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="employer_id">{{ trans('cruds.user.fields.employer') }}</label>
                <select class="form-control select2 {{ $errors->has('employer') ? 'is-invalid' : '' }}" name="employer_id" id="employer_id">
                    @foreach($employers as $id => $employer)
                        <option value="{{ $id }}" {{ old('employer_id') == $id ? 'selected' : '' }}>{{ $employer }}</option>
                    @endforeach
                </select>
                @if($errors->has('employer_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('employer_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.employer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agents_id">{{ trans('cruds.user.fields.agents') }}</label>
                <select class="form-control select2 {{ $errors->has('agents') ? 'is-invalid' : '' }}" name="agents_id" id="agents_id">
                    @foreach($agents as $id => $agents)
                        <option value="{{ $id }}" {{ old('agents_id') == $id ? 'selected' : '' }}>{{ $agents }}</option>
                    @endforeach
                </select>
                @if($errors->has('agents_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agents_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.agents_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="indurstry_id">{{ trans('cruds.user.fields.indurstry') }}</label>
                <select class="form-control select2 {{ $errors->has('indurstry') ? 'is-invalid' : '' }}" name="indurstry_id" id="indurstry_id">
                    @foreach($indurstries as $id => $indurstry)
                        <option value="{{ $id }}" {{ old('indurstry_id') == $id ? 'selected' : '' }}>{{ $indurstry }}</option>
                    @endforeach
                </select>
                @if($errors->has('indurstry_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('indurstry_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.indurstry_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profile_picture">{{ trans('cruds.user.fields.profile_picture') }}</label>
                <div class="needsclick dropzone {{ $errors->has('profile_picture') ? 'is-invalid' : '' }}" id="profile_picture-dropzone">
                </div>
                @if($errors->has('profile_picture'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile_picture') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.profile_picture_helper') }}</span>
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
    Dropzone.options.profilePictureDropzone = {
    url: '{{ route('admin.users.storeMedia') }}',
    maxFilesize: 8, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8,
      width: 1600,
      height: 1600
    },
    success: function (file, response) {
      $('form').find('input[name="profile_picture"]').remove()
      $('form').append('<input type="hidden" name="profile_picture" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profile_picture"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($user) && $user->profile_picture)
      var file = {!! json_encode($user->profile_picture) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $user->profile_picture->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile_picture" value="' + file.file_name + '">')
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
