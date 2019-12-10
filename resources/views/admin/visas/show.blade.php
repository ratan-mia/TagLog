@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.visa.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.id') }}
                        </th>
                        <td>
                            {{ $visa->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.name') }}
                        </th>
                        <td>
                            {{ $visa->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.type') }}
                        </th>
                        <td>
                            {{ $visa->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.countries_without_visa') }}
                        </th>
                        <td>
                            {{ App\Visa::COUNTRIES_WITHOUT_VISA_SELECT[$visa->countries_without_visa] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.duration') }}
                        </th>
                        <td>
                            {{ $visa->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.work_permit') }}
                        </th>
                        <td>
                            {{ App\Visa::WORK_PERMIT_RADIO[$visa->work_permit] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.working_limit') }}
                        </th>
                        <td>
                            {{ $visa->working_limit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.industries') }}
                        </th>
                        <td>
                            {{ App\Visa::INDUSTRIES_SELECT[$visa->industries] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.language_traning') }}
                        </th>
                        <td>
                            {{ App\Visa::LANGUAGE_TRANING_RADIO[$visa->language_traning] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.training_duration') }}
                        </th>
                        <td>
                            {{ $visa->training_duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.visa.fields.countries_restrictred') }}
                        </th>
                        <td>
                            {{ App\Visa::COUNTRIES_RESTRICTRED_SELECT[$visa->countries_restrictred] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.visas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection