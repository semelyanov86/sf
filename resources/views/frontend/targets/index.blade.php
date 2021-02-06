@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('target_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.targets.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.target.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.target.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Target">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.target.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.target.fields.target_category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.target.fields.currency') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.target.fields.account_from') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.target.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.target.fields.target_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.target.fields.target_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.target.fields.target_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.target.fields.amount') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($targets as $key => $target)
                                    <tr data-entry-id="{{ $target->id }}">
                                        <td>
                                            {{ $target->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $target->target_category->target_category_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $target->currency->code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $target->account_from->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $target->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $target->target_type ? \Domains\Targets\Enums\TypeSelectEnum::fromValue((int) $target->target_type)?->description : '' }}
                                        </td>
                                        <td>
                                            {{ $target->target_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ Domains\Targets\Models\Target::TARGET_STATUS_RADIO[$target->target_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $target->amount ?? '' }}
                                        </td>
                                        <td>
                                            @can('target_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.targets.show', $target->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('target_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.targets.edit', $target->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('target_delete')
                                                <form action="{{ route('frontend.targets.destroy', $target->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('target_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.targets.massDestroy') }}",
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
  let table = $('.datatable-Target:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
