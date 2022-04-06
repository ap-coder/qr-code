<div class="m-3">
    @can('qr_code_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.qr-codes.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.qrCode.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.qrCode.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-businessPagesQrCodes">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.scans') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.clicks') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.short_link') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.types') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.vcards') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.websites') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.business_pages') }}
                            </th>
                            <th>
                                {{ trans('cruds.qrCode.fields.created_at') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($qrCodes as $key => $qrCode)
                            <tr data-entry-id="{{ $qrCode->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $qrCode->id ?? '' }}
                                </td>
                                <td>
                                    {{ $qrCode->name ?? '' }}
                                </td>
                                <td>
                                    {{ $qrCode->scans ?? '' }}
                                </td>
                                <td>
                                    {{ $qrCode->clicks ?? '' }}
                                </td>
                                <td>
                                    {{ $qrCode->short_link ?? '' }}
                                </td>
                                <td>
                                    @foreach($qrCode->types as $key => $item)
                                        <span class="badge badge-info">{{ $item->title }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($qrCode->vcards as $key => $item)
                                        <span class="badge badge-info">{{ $item->qr_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($qrCode->websites as $key => $item)
                                        <span class="badge badge-info">{{ $item->qr_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($qrCode->business_pages as $key => $item)
                                        <span class="badge badge-info">{{ $item->qr_name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $qrCode->created_at ?? '' }}
                                </td>
                                <td>
                                    @can('qr_code_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.qr-codes.show', $qrCode->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('qr_code_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.qr-codes.edit', $qrCode->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('qr_code_delete')
                                        <form action="{{ route('admin.qr-codes.destroy', $qrCode->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('qr_code_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.qr-codes.massDestroy') }}",
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
  let table = $('.datatable-businessPagesQrCodes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection