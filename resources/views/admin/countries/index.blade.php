@extends('layouts.admin')
@section('content')
@can('country_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.countries.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.country.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.country.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Country">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.country.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.short_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.language') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.currency') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.religion') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.safe_food') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.safe_medicine') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.taxi_available') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.flag') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.gallery') }}
                        </th>
                        <th>
                            {{ trans('cruds.country.fields.additional_files') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($countries as $key => $country)
                        <tr data-entry-id="{{ $country->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $country->id ?? '' }}
                            </td>
                            <td>
                                {{ $country->name ?? '' }}
                            </td>
                            <td>
                                {{ $country->short_code ?? '' }}
                            </td>
                            <td>
                                {{ App\Country::LANGUAGE_SELECT[$country->language] ?? '' }}
                            </td>
                            <td>
                                {{ App\Country::CURRENCY_SELECT[$country->currency] ?? '' }}
                            </td>
                            <td>
                                {{ $country->religion ?? '' }}
                            </td>
                            <td>
                                {{ App\Country::SAFE_FOOD_RADIO[$country->safe_food] ?? '' }}
                            </td>
                            <td>
                                {{ App\Country::SAFE_MEDICINE_RADIO[$country->safe_medicine] ?? '' }}
                            </td>
                            <td>
                                {{ App\Country::TAXI_AVAILABLE_RADIO[$country->taxi_available] ?? '' }}
                            </td>
                            <td>
                                @if($country->flag)
                                    <a href="{{ $country->flag->getUrl() }}" target="_blank">
                                        <img src="{{ $country->flag->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @foreach($country->gallery as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($country->additional_files as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('country_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.countries.show', $country->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('country_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.countries.edit', $country->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('country_delete')
                                    <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('country_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.countries.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  $('.datatable-Country:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection