@extends('layouts.master')
@section('content')
    <!-- Top content -->
    <div class="top-content">
        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    {{--                    <div class="col-md-2"></div>--}}
                    <div class="col-md-8 offset-md-2 form-box registration">
                        <form role="form" action="{{ route('user.work-preference') }}" method="POST"
                              class="registration-form">
                            @csrf
                            <div class="form-top">
                                <div class="form-top-left">
                                    @if (url()->previous() == 'http://127.0.0.1:8000/register')
                                        <h3>Step 2 / 3</h3>
                                    @endif
                                    <h4>Work Preference:</h4>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-briefcase"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <!--Work Preference(Technical Intern Trainee-->
                                <!--Expected Destination Area-->

                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label text-md-right"
                                                for="destination_area">{{ trans('cruds.user.fields.destination_area') }}</label>
                                            <div class="col-md-6">
                                            <select
                                                class="form-control {{ $errors->has('destination') ? 'is-invalid' : '' }}"
                                                name="destination_area" id="destination_area">
                                                @foreach($destination_areas as $id => $destination_area)
                                                    <option
                                                        value="{{ $id }}" {{ ($user->destination_area ? $user->area->id : old('destination_area')) == $id ? 'selected' : '' }}>{{ $destination_area }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('destination_area'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('destination_area') }}
                                                </div>
                                            @endif
                                            <span
                                                class="help-block">{{ trans('cruds.user.fields.destination_area_helper') }}</span>
                                        </div>
                                        </div>




                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="expected_industries">{{ trans('cruds.user.fields.expected_industries') }}</label>

                                    <div class="col-md-6">
                                        <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                              style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                            <span class="btn btn-info btn-xs deselect-all"
                                                  style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                        </div>
                                        <select
                                            class="form-control select2 {{ $errors->has('expected_industries') ? 'is-invalid' : '' }}"
                                            name="expected_industries[]" id="expected_industries" multiple>
                                            @foreach($expected_industries as $id => $expected_industries)
                                                <option
                                                    value="{{ $id }}" {{ (in_array($id, old('expected_industries', [])) || $user->industries->contains($id)) ? 'selected' : '' }}>{{ $expected_industries }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('expected_industries'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('expected_industries') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.user.fields.expected_industries_helper') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="expected_salary">{{ trans('cruds.user.fields.expected_salary') }}
                                        ($)</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control {{ $errors->has('expected_salary') ? 'is-invalid' : '' }}"
                                            type="number" name="expected_salary" id="expected_salary"
                                            value="{{ old('expected_salary') }}" step="0.01">
                                        @if($errors->has('expected_salary'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('expected_salary') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.user.fields.expected_salary_helper') }}</span>
                                    </div>
                                </div>

                                <!--Date of Leaving-->
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right"
                                           for="date_of_leaving">{{ trans('cruds.user.fields.date_of_leaving_register') }}</label>
                                    <div class="col-md-6">
                                        <input
                                            class="form-control date {{ $errors->has('date_of_leaving') ? 'is-invalid' : '' }}"
                                            type="text" name="date_of_leaving" id="date_of_leaving"
                                            value="{{ old('date_of_leaving') }}">
                                        @if($errors->has('date_of_leaving'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('date_of_leaving') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.user.fields.date_of_leaving_helper') }}</span>
                                    </div>
                                </div>

                                {{--                                <button type="submit" class="btn btn-next taglog-button">Next</button>--}}


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-next">
                                            {{ __('Next') }}
                                        </button>


                                    </div>
                                </div>
                        </form>
                    </div>
                    {{--    Step 1 End--}}
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.conditional').conditionize();
        });
    </script>
@endsection
