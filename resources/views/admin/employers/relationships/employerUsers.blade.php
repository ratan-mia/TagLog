@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.country') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.date_of_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.education_level') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.facebook') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.skype') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.destination') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.visa_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.industries') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.expected_salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.date_of_leaving') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.employer') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.agents') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.indurstry') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.profile_picture') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                {{ $user->email_verified_at ?? '' }}
                            </td>
                            <td>
                                @foreach($user->roles as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->country->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->city ?? '' }}
                            </td>
                            <td>
                                {{ $user->date_of_birth ?? '' }}
                            </td>
                            <td>
                                {{ App\User::GENDER_RADIO[$user->gender] ?? '' }}
                            </td>
                            <td>
                                {{ App\User::EDUCATION_LEVEL_SELECT[$user->education_level] ?? '' }}
                            </td>
                            <td>
                                {{ $user->phone ?? '' }}
                            </td>
                            <td>
                                {{ $user->facebook ?? '' }}
                            </td>
                            <td>
                                {{ $user->skype ?? '' }}
                            </td>
                            <td>
                                {{ $user->destination->name ?? '' }}
                            </td>
                            <td>
                                {{ App\User::VISA_TYPE_SELECT[$user->visa_type] ?? '' }}
                            </td>
                            <td>
                                @foreach($user->industries as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $user->expected_salary ?? '' }}
                            </td>
                            <td>
                                {{ $user->date_of_leaving ?? '' }}
                            </td>
                            <td>
                                {{ $user->employer->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->agents->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->indurstry->name ?? '' }}
                            </td>
                            <td>
                                @if($user->profile_picture)
                                    <a href="{{ $user->profile_picture->getUrl() }}" target="_blank">
                                        <img src="{{ $user->profile_picture->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.users.edit', $user->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('user_delete')
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
