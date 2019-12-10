@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.destination.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.destinations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.id') }}
                        </th>
                        <td>
                            {{ $destination->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.name') }}
                        </th>
                        <td>
                            {{ $destination->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.language') }}
                        </th>
                        <td>
                            {{ App\Destination::LANGUAGE_SELECT[$destination->language] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.currency') }}
                        </th>
                        <td>
                            {{ $destination->currency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.address') }}
                        </th>
                        <td>
                            {{ $destination->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.flag') }}
                        </th>
                        <td>
                            @if($destination->flag)
                                <a href="{{ $destination->flag->getUrl() }}" target="_blank">
                                    <img src="{{ $destination->flag->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.gallery') }}
                        </th>
                        <td>
                            @foreach($destination->gallery as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.industries') }}
                        </th>
                        <td>
                            {{ App\Destination::INDUSTRIES_SELECT[$destination->industries] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.employers') }}
                        </th>
                        <td>
                            {{ $destination->employers }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.agents') }}
                        </th>
                        <td>
                            {{ App\Destination::AGENTS_SELECT[$destination->agents] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.hourly_salary') }}
                        </th>
                        <td>
                            {{ $destination->hourly_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.monthly_salary') }}
                        </th>
                        <td>
                            {{ $destination->monthly_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.yearly_salary') }}
                        </th>
                        <td>
                            {{ $destination->yearly_salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.safe_medicine') }}
                        </th>
                        <td>
                            {{ App\Destination::SAFE_MEDICINE_RADIO[$destination->safe_medicine] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.healthcare') }}
                        </th>
                        <td>
                            {{ $destination->healthcare }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.taxi_available') }}
                        </th>
                        <td>
                            {{ App\Destination::TAXI_AVAILABLE_RADIO[$destination->taxi_available] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.safety') }}
                        </th>
                        <td>
                            {{ $destination->safety }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.culture') }}
                        </th>
                        <td>
                            {!! $destination->culture !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.politics') }}
                        </th>
                        <td>
                            {{ $destination->politics }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.insurance') }}
                        </th>
                        <td>
                            {{ $destination->insurance }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.destination.fields.documents') }}
                        </th>
                        <td>
                            @if($destination->documents)
                                <a href="{{ $destination->documents->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.destinations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>


    </div>
</div>
@endsection