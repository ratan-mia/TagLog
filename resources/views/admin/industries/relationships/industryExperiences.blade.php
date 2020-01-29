@can('experience_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.experiences.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.experience.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.experience.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Experience">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.agent') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.destination') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.visa_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.application_period') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.expenses_paid') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.language_level') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.agent_rating') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.agent_feedback') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.employer') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.industry') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.emloyment_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.employment_period') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.monthly_salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.monthly_living_expenses') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.accommodation_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.weekly_working_hours') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.monthly_days_off') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.next_year_opportunity') }}
                        </th>
                        <th>
                            {{ trans('cruds.experience.fields.employer_rating') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($experiences as $key => $experience)
                        <tr data-entry-id="{{ $experience->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $experience->id ?? '' }}
                            </td>
                            <td>
                                {{ $experience->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $experience->agent->name ?? '' }}
                            </td>
                            <td>
                                {{ $experience->destination->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Experience::VISA_TYPE_SELECT[$experience->visa_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Experience::APPLICATION_PERIOD_SELECT[$experience->application_period] ?? '' }}
                            </td>
                            <td>
                                {{ $experience->expenses_paid ?? '' }}
                            </td>
                            <td>
                                {{ App\Experience::LANGUAGE_LEVEL_SELECT[$experience->language_level] ?? '' }}
                            </td>
                            <td>
                                {{ $experience->agent_rating ?? '' }}
                            </td>
                            <td>
                                {{ $experience->agent_feedback ?? '' }}
                            </td>
                            <td>
                                {{ $experience->employer->name ?? '' }}
                            </td>
                            <td>
                                {{ $experience->industry->name ?? '' }}
                            </td>
                            <td>
                                {{ $experience->emloyment_date ?? '' }}
                            </td>
                            <td>
                                {{ $experience->employment_period ?? '' }}
                            </td>
                            <td>
                                {{ $experience->monthly_salary ?? '' }}
                            </td>
                            <td>
                                {{ $experience->monthly_living_expenses ?? '' }}
                            </td>
                            <td>
                                {{ App\Experience::ACCOMMODATION_TYPE_SELECT[$experience->accommodation_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Experience::WEEKLY_WORKING_HOURS_SELECT[$experience->weekly_working_hours] ?? '' }}
                            </td>
                            <td>
                                {{ $experience->monthly_days_off ?? '' }}
                            </td>
                            <td>
                                {{ App\Experience::NEXT_YEAR_OPPORTUNITY_RADIO[$experience->next_year_opportunity] ?? '' }}
                            </td>
                            <td>
                                {{ $experience->employer_rating ?? '' }}
                            </td>
                            <td>
                                @can('experience_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.experiences.show', $experience->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('experience_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.experiences.edit', $experience->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('experience_delete')
                                    <form action="{{ route('admin.experiences.destroy', $experience->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('experience_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.experiences.massDestroy') }}",
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
  $('.datatable-Experience:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
