@extends('layouts.admin')
@section('content')
@can('visa_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.visas.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.visa.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.visa.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Visa">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.countries_without_visa') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.duration') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.work_permit') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.working_limit') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.industries') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.language_traning') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.training_duration') }}
                    </th>
                    <th>
                        {{ trans('cruds.visa.fields.countries_restrictred') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>


    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('visa_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.visas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.visas.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'type', name: 'type' },
{ data: 'countries_without_visa', name: 'countries_without_visa' },
{ data: 'duration', name: 'duration' },
{ data: 'work_permit', name: 'work_permit' },
{ data: 'working_limit', name: 'working_limit' },
{ data: 'industries', name: 'industries' },
{ data: 'language_traning', name: 'language_traning' },
{ data: 'training_duration', name: 'training_duration' },
{ data: 'countries_restrictred', name: 'countries_restrictred' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  $('.datatable-Visa').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection