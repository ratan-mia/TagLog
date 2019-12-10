@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.experience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.id') }}
                        </th>
                        <td>
                            {{ $experience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.user') }}
                        </th>
                        <td>
                            {{ $experience->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.agent') }}
                        </th>
                        <td>
                            {{ $experience->agent->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.destination_country') }}
                        </th>
                        <td>
                            {{ $experience->destination_country->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.visa_type') }}
                        </th>
                        <td>
                            {{ App\Experience::VISA_TYPE_SELECT[$experience->visa_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.application_period') }}
                        </th>
                        <td>
                            {{ App\Experience::APPLICATION_PERIOD_SELECT[$experience->application_period] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.expenses_paid') }}
                        </th>
                        <td>
                            {{ $experience->expenses_paid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.language_level') }}
                        </th>
                        <td>
                            {{ App\Experience::LANGUAGE_LEVEL_SELECT[$experience->language_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.agent_rating') }}
                        </th>
                        <td>
                            {{ $experience->agent_rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.agent_feedback') }}
                        </th>
                        <td>
                            {{ $experience->agent_feedback }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.employer') }}
                        </th>
                        <td>
                            {{ $experience->employer->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.industry') }}
                        </th>
                        <td>
                            {{ $experience->industry->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.emloyment_date') }}
                        </th>
                        <td>
                            {{ $experience->emloyment_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.employment_period') }}
                        </th>
                        <td>
                            {{ $experience->employment_period }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.monthly_salary') }}
                        </th>
                        <td>
                            {{ $experience->monthly_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.monthly_living_expenses') }}
                        </th>
                        <td>
                            {{ $experience->monthly_living_expenses }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.accommodation_type') }}
                        </th>
                        <td>
                            {{ App\Experience::ACCOMMODATION_TYPE_SELECT[$experience->accommodation_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.weekly_working_hours') }}
                        </th>
                        <td>
                            {{ App\Experience::WEEKLY_WORKING_HOURS_SELECT[$experience->weekly_working_hours] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.monthly_days_off') }}
                        </th>
                        <td>
                            {{ $experience->monthly_days_off }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.next_year_opportunity') }}
                        </th>
                        <td>
                            {{ App\Experience::NEXT_YEAR_OPPORTUNITY_RADIO[$experience->next_year_opportunity] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.employer_rating') }}
                        </th>
                        <td>
                            {{ $experience->employer_rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.employer_feedback') }}
                        </th>
                        <td>
                            {!! $experience->employer_feedback !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection