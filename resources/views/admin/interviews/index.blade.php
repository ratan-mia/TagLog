@extends('layouts.admin')
@section('content')
    @can('interview_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.interviews.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.interview.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.interview.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Interview">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.visa_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.industry') }}
                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.agent') }}
                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.employer') }}
                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.interview_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.interview.fields.result') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($interviews as $key => $interview)
                        <tr data-entry-id="{{ $interview->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $interview->id ?? '' }}
                            </td>
                            <td>
                                {{ App\Interview::VISA_TYPE_SELECT[$interview->visa_type] ?? '' }}
                            </td>
                            <td>
                                {{ $interview->user->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Interview::INDUSTRY_SELECT[$interview->industry] ?? '' }}
                            </td>
                            <td>
                                {{ App\Interview::AGENT_SELECT[$interview->agent] ?? '' }}
                            </td>
                            <td>
                                {{ App\Interview::EMPLOYER_SELECT[$interview->employer] ?? '' }}
                            </td>
                            <td>
                                {{ $interview->interview_date ?? '' }}
                            </td>
                            <td>
                                {{ $interview->start_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Interview::RESULT_SELECT[$interview->result] ?? '' }}
                            </td>
                            <td>
                                @can('interview_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.interviews.show', $interview->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('interview_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.interviews.edit', $interview->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('interview_delete')
                                    <form action="{{ route('admin.interviews.destroy', $interview->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                @can('interview_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.interviews.massDestroy') }}",
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
            $('.datatable-Interview:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
