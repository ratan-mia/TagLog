@extends('layouts.admin')
@section('content')
@can('employer_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.employers.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.employer.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.employer.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Employer">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.recruiting_workers') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.countries') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.agents') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.industries') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.monthly_salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.working_hours') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.days_off') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.banner_titile') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.banner_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.gallery') }}
                        </th>
                        <th>
                            {{ trans('cruds.employer.fields.sliders') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employers as $key => $employer)
                        <tr data-entry-id="{{ $employer->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $employer->id ?? '' }}
                            </td>
                            <td>
                                {{ $employer->name ?? '' }}
                            </td>
                            <td>
                                {{ $employer->email ?? '' }}
                            </td>
                            <td>
                                {{ $employer->phone ?? '' }}
                            </td>
                            <td>
                                {{ $employer->recruiting_workers ?? '' }}
                            </td>
                            <td>
                                @foreach($employer->countries as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($employer->agents as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($employer->industries as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $employer->monthly_salary ?? '' }}
                            </td>
                            <td>
                                {{ $employer->working_hours ?? '' }}
                            </td>
                            <td>
                                {{ $employer->days_off ?? '' }}
                            </td>
                            <td>
                                @if($employer->logo)
                                    <a href="{{ $employer->logo->getUrl() }}" target="_blank">
                                        <img src="{{ $employer->logo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $employer->banner_titile ?? '' }}
                            </td>
                            <td>
                                @if($employer->banner_image)
                                    <a href="{{ $employer->banner_image->getUrl() }}" target="_blank">
                                        <img src="{{ $employer->banner_image->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @foreach($employer->gallery as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($employer->sliders as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('employer_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.employers.show', $employer->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('employer_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.employers.edit', $employer->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('employer_delete')
                                    <form action="{{ route('admin.employers.destroy', $employer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('employer_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.employers.massDestroy') }}",
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
    pageLength: 100,
  });
  $('.datatable-Employer:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection