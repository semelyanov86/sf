@can('operation_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.operations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.operation.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.operation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-categoryOperations">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.operation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.operation.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.operation.fields.done_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.operation.fields.source_account') }}
                        </th>
                        <th>
                            {{ trans('cruds.operation.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.operation.fields.category') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($operations as $key => $operation)
                        <tr data-entry-id="{{ $operation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $operation->id ?? '' }}
                            </td>
                            <td>
                                {{ $operation->amount ?? '' }}
                            </td>
                            <td>
                                {{ $operation->done_at ?? '' }}
                            </td>
                            <td>
                                {{ $operation->source_account->name ?? '' }}
                            </td>
                            <td>
                                {{ Domains\Operations\Models\Operation::TYPE_SELECT[$operation->type] ?? '' }}
                            </td>
                            <td>
                                {{ $operation->category->name ?? '' }}
                            </td>
                            <td>
                                @can('operation_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.operations.show', $operation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('operation_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.operations.edit', $operation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('operation_delete')
                                    <form action="{{ route('admin.operations.destroy', $operation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('operation_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.operations.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-categoryOperations:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
