@extends('layouts.admin')
@section('content')
@can('agent_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.agents.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.agent.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.agent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Agent">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.map') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.interview_period') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.total_expense') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.language_level') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.destination') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.industry') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.employers') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.leaving_period') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.workers_sent') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.banner_titile') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.banner_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.agent.fields.sliders') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agents as $key => $agent)
                        <tr data-entry-id="{{ $agent->id ?? ''}}">
                            <td>

                            </td>
                            <td>
                                {{ $agent->id ?? '' }}
                            </td>
                            <td>
                                {{ $agent->name ?? '' }}
                            </td>
                            <td>
                                {{ $agent->email ?? '' }}
                            </td>
                            <td>
                                {{ $agent->phone ?? '' }}
                            </td>
                            <td>
                                {{ $agent->map ?? '' }}
                            </td>
                            <td>
                                {{ $agent->interview_period ?? '' }}
                            </td>
                            <td>
                                {{ $agent->total_expense ?? '' }}
                            </td>
                            <td>
                                {{ $agent->language_level ?? '' }}
                            </td>
                            <td>
                                @foreach($agent->destinations as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($agent->industries as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($agent->employers as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $agent->leaving_period ?? '' }}
                            </td>
                            <td>
                                {{ $agent->workers_sent ?? '' }}
                            </td>
                            <td>
                                @if($agent->logo)
                                    <a href="{{ $agent->logo->getUrl() }}" target="_blank">
                                        <img src="{{ $agent->logo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $agent->banner_titile ?? '' }}
                            </td>
                            <td>
                                @if($agent->banner_image)
                                    <a href="{{ $agent->banner_image->getUrl() }}" target="_blank">
                                        <img src="{{ $agent->banner_image->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @foreach($agent->sliders as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        <img src="{{ $media->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('agent_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.agents.show', $agent->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('agent_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.agents.edit', $agent->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('agent_delete')
                                    <form action="{{ route('admin.agents.destroy', $agent->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('agent_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.agents.massDestroy') }}",
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
  $('.datatable-Agent:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
