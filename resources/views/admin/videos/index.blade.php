@extends('layouts.admin')
@section('content')
@can('video_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.videos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.video.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.video.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Video">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.video.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.video.fields.active') }}
                    </th>
                    <th>
                        {{ trans('cruds.video.fields.qr_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.video.fields.created_by') }}
                    </th>
                    <th>
                        {{ trans('cruds.video.fields.design_colors') }}
                    </th>
                    <th>
                        {{ trans('cruds.designColor.fields.button') }}
                    </th>
                    <th>
                        {{ trans('cruds.video.fields.title') }}
                    </th>
                    <th>
                        {{ trans('cruds.video.fields.social_channels') }}
                    </th>
                    <th>
                        {{ trans('cruds.video.fields.loading_image') }}
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
@can('video_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.videos.massDestroy') }}",
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
    ajax: "{{ route('admin.videos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'active', name: 'active' },
{ data: 'qr_name', name: 'qr_name' },
{ data: 'created_by_name', name: 'created_by.name' },
{ data: 'design_colors_primary', name: 'design_colors.primary' },
{ data: 'design_colors.button', name: 'design_colors.button' },
{ data: 'title', name: 'title' },
{ data: 'social_channels', name: 'social_channels.social_name' },
{ data: 'loading_image', name: 'loading_image', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Video').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection