@extends('layouts.admin')
@section('content')
    @can('inquiry_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.inquiries.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.inquiry.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.inquiry.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Inquiry">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.agent') }}
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.inquiry.fields.inquiry') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($inquiries as $key => $inquiry)
                        <tr data-entry-id="{{ $inquiry->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $inquiry->id ?? '' }}
                            </td>
                            <td>
                                {{ $inquiry->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $inquiry->agent->name ?? '' }}
                            </td>
                            <td>
                                {{ $inquiry->name ?? '' }}
                            </td>
                            <td>
                                {{ $inquiry->country->name ?? '' }}
                            </td>
                            <td>
                                {{ $inquiry->address ?? '' }}
                            </td>
                            <td>
                                {{ $inquiry->inquiry ?? '' }}
                            </td>
                            <td>
                                @can('inquiry_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.inquiries.show', $inquiry->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('inquiry_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.inquiries.edit', $inquiry->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('inquiry_delete')
                                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                @can('inquiry_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.inquiries.massDestroy') }}",
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
                pageLength: 50,
            });
            $('.datatable-Inquiry:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
