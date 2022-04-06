@extends('layouts.admin')
@section('content')
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-QrCode">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('qr_code_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.qr-codes.massDestroy') }}",
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
    ajax: "{{ route('admin.qr-codes.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'scans', name: 'scans' },
{ data: 'clicks', name: 'clicks' },
{ data: 'short_link', name: 'short_link' },
{ data: 'types', name: 'types.title' },
{ data: 'vcards', name: 'vcards.qr_name' },
{ data: 'websites', name: 'websites.qr_name' },
{ data: 'business_pages', name: 'business_pages.qr_name' },
{ data: 'created_at', name: 'created_at' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-QrCode').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection