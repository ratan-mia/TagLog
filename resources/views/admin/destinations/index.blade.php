@extends('layouts.admin')
@section('content')
@can('destination_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.destinations.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.destination.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.destination.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Destination">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.language') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.currency') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.address') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.flag') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.gallery') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.industries') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.employers') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.agents') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.hourly_salary') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.monthly_salary') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.yearly_salary') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.safe_medicine') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.healthcare') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.taxi_available') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.safety') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.politics') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.insurance') }}
                    </th>
                    <th>
                        {{ trans('cruds.destination.fields.documents') }}
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
@can('destination_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.destinations.massDestroy') }}",
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
    ajax: "{{ route('admin.destinations.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'language', name: 'language' },
{ data: 'currency', name: 'currency' },
{ data: 'address', name: 'address' },
{ data: 'flag', name: 'flag', sortable: false, searchable: false },
{ data: 'gallery', name: 'gallery', sortable: false, searchable: false },
{ data: 'industries', name: 'industries' },
{ data: 'employers', name: 'employers' },
{ data: 'agents', name: 'agents' },
{ data: 'hourly_salary', name: 'hourly_salary' },
{ data: 'monthly_salary', name: 'monthly_salary' },
{ data: 'yearly_salary', name: 'yearly_salary' },
{ data: 'safe_medicine', name: 'safe_medicine' },
{ data: 'healthcare', name: 'healthcare' },
{ data: 'taxi_available', name: 'taxi_available' },
{ data: 'safety', name: 'safety' },
{ data: 'politics', name: 'politics' },
{ data: 'insurance', name: 'insurance' },
{ data: 'documents', name: 'documents', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  $('.datatable-Destination').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection