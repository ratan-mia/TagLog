@extends('layouts.admin')
@section('content')
@can('setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.settings.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.setting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">

    <div class="card-header">
        {{ trans('cruds.setting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Setting">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.url') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.logo') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.philosophy_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.philosophy_image') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.business_title') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.business_sentence') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.business_image') }}
                    </th>
                    <th>
                        {{ trans('cruds.setting.fields.slider') }}
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
@can('setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.settings.massDestroy') }}",
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
    ajax: "{{ route('admin.settings.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'url', name: 'url' },
{ data: 'logo', name: 'logo', sortable: false, searchable: false },
{ data: 'philosophy_title', name: 'philosophy_title' },
{ data: 'philosophy_image', name: 'philosophy_image', sortable: false, searchable: false },
{ data: 'business_title', name: 'business_title' },
{ data: 'business_sentence', name: 'business_sentence' },
{ data: 'business_image', name: 'business_image', sortable: false, searchable: false },
{ data: 'slider', name: 'slider', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-Setting').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection