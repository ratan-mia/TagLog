@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.interview.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.interviews.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.id') }}
                        </th>
                        <td>
                            {{ $interview->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.visa_type') }}
                        </th>
                        <td>
                            {{ App\Interview::VISA_TYPE_SELECT[$interview->visa_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.user') }}
                        </th>
                        <td>
                            {{ $interview->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.industry') }}
                        </th>
                        <td>
                            {{ App\Interview::INDUSTRY_SELECT[$interview->industry] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.agent') }}
                        </th>
                        <td>
                            {{ App\Interview::AGENT_SELECT[$interview->agent] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.employer') }}
                        </th>
                        <td>
                            {{ App\Interview::EMPLOYER_SELECT[$interview->employer] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.interview_date') }}
                        </th>
                        <td>
                            {{ $interview->interview_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.start_date') }}
                        </th>
                        <td>
                            {{ $interview->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.result') }}
                        </th>
                        <td>
                            {{ App\Interview::RESULT_SELECT[$interview->result] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.interview.fields.contact_to_taglog') }}
                        </th>
                        <td>
                            {!! $interview->contact_to_taglog !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.interviews.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>



@endsection
