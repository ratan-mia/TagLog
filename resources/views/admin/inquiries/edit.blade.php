@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.inquiry.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.inquiries.update", [$inquiry->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="user_id">{{ trans('cruds.inquiry.fields.user') }}</label>
                    <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                        @foreach($users as $id => $user)
                            <option value="{{ $id }}" {{ ($inquiry->user ? $inquiry->user->id : old('user_id')) == $id ? 'selected' : '' }}>{{ $user }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.inquiry.fields.user_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="agent_id">{{ trans('cruds.inquiry.fields.agent') }}</label>
                    <select class="form-control select2 {{ $errors->has('agent') ? 'is-invalid' : '' }}" name="agent_id" id="agent_id">
                        @foreach($agents as $id => $agent)
                            <option value="{{ $id }}" {{ ($inquiry->agent ? $inquiry->agent->id : old('agent_id')) == $id ? 'selected' : '' }}>{{ $agent }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.inquiry.fields.agent_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="name">{{ trans('cruds.inquiry.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $inquiry->name) }}">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.inquiry.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="country_id">{{ trans('cruds.inquiry.fields.country') }}</label>
                    <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                        @foreach($countries as $id => $country)
                            <option value="{{ $id }}" {{ ($inquiry->country ? $inquiry->country->id : old('country_id')) == $id ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.inquiry.fields.country_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="address">{{ trans('cruds.inquiry.fields.address') }}</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $inquiry->address) }}">
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.inquiry.fields.address_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="inquiry">{{ trans('cruds.inquiry.fields.inquiry') }}</label>
                    <textarea class="form-control {{ $errors->has('inquiry') ? 'is-invalid' : '' }}" name="inquiry" id="inquiry">{{ old('inquiry', $inquiry->inquiry) }}</textarea>
                    @if($errors->has(''))
                        <div class="invalid-feedback">
                            {{ $errors->first('') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.inquiry.fields.inquiry_helper') }}</span>
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
