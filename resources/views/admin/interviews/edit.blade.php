@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.interview.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.interviews.update", [$interview->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="user_id">{{ trans('cruds.interview.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                        @foreach($users as $id => $user)
                            <option value="{{ $id }}" {{ ($interview->user ? $interview->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.user_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.interview.fields.visa_type') }}</label>
                    <select class="form-control {{ $errors->has('visa_type') ? 'is-invalid' : '' }}" name="visa_type" id="visa_type">
                        <option value disabled {{ old('visa_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach($visas as $key => $label)
                            <option value="{{ $key }}" {{ old('visa_type', $interview->visa_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.visa_type_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.interview.fields.industry') }}</label>
                    <select class="form-control {{ $errors->has('industry_id') ? 'is-invalid' : '' }}" name="industry_id" id="industry_id">
                        <option value disabled {{ old('industry_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach($industries as $id => $industry)

                            <option value="{{ $id }}" {{ ($interview->industry ? $interview->industry->id : old('industry_id')) == $id ? 'selected' : '' }}>{{ $industry }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.industry_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.interview.fields.agent') }}</label>
                    <select class="form-control {{ $errors->has('agent_id') ? 'is-invalid' : '' }}" name="agent_id" id="agent_id">
                        <option value disabled {{ old('agent', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach($agents as $key => $label)
{{--                            <option value="{{ $key }}" {{ old('agent_id', $interview->agent) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>--}}
                            <option value="{{$key}}" {{ ($interview->agent ? $interview->agent->id : old('agent_id')) == $key ? 'selected' : '' }}> {{$label}} </option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.agent_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.interview.fields.employer') }}</label>
                    <select class="form-control {{ $errors->has('employer_id') ? 'is-invalid' : '' }}" name="employer_id" id="employer_id">
                        <option value disabled {{ old('employer_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach($employers as $key => $label)
{{--                            <option value="{{ $key }}" {{ old('employer_id', $interview->employer) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>--}}
                            <option value="{{$key}}" {{ ($interview->employer ? $interview->employer->id : old('employer_id')) == $key ? 'selected' : '' }}> {{$label}} </option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.employer_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="interview_date">{{ trans('cruds.interview.fields.interview_date') }}</label>
                    <input class="form-control datetime {{ $errors->has('interview_date') ? 'is-invalid' : '' }}" type="text" name="interview_date" id="interview_date" value="{{ old('interview_date', $interview->interview_date) }}" required>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.interview_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="start_date">{{ trans('cruds.interview.fields.start_date') }}</label>
                    <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $interview->start_date) }}">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.start_date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('cruds.interview.fields.result') }}</label>
                    <select class="form-control {{ $errors->has('result') ? 'is-invalid' : '' }}" name="result" id="result">
                        <option value disabled {{ old('result', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Interview::RESULT_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('result', $interview->result) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.result_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="contact_to_taglog">{{ trans('cruds.interview.fields.contact_to_taglog') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('contact_to_taglog') ? 'is-invalid' : '' }}" name="contact_to_taglog" id="contact_to_taglog">{!! old('contact_to_taglog', $interview->contact_to_taglog) !!}</textarea>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.interview.fields.contact_to_taglog_helper') }}</span>
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
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/admin/interviews/ckmedia', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() { reject(genericErrorText) });
                                        xhr.addEventListener('abort', function() { reject() });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', {{ $interview->id ?? 0 }});
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

@endsection
