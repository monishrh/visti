@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('stores::stores.title.stores') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('stores::stores.title.stores') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.stores.stores.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('stores::stores.button.create stores') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                  <th>ID</th>
                                <th>City Name</th>
                                <th>Area Name</th>
                                <th>Gaurage Name</th>
                                <th>Address</th>
                                <th>Icon</th>
                                <th>banner</th>
                                <th>Service charge</th>
                                <th>Phone Number</th>
                                 <th>Alternate Contact</th>
                              
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($stores)): ?>
                            <?php foreach ($stores as $stores): ?>
                            <tr>    <?php 
                                    $areas = DB::table('region__cities')->where('id', '=',$stores->city_id)->get();
                                     $areas1 = DB::table('region__areas')->where('id', '=',$stores->area_id)->get();
                                 ?>
                              
                                 <td>{{ $stores->id }}</td>
                                <td>{{ $areas[0]->city_name }}</td>
                                 <td>{{ $areas1[0]->area_name }}</td>
                                 <td>{{ $stores->gaurage_name }}</td>
                                  <td>{{ $stores->address }}</td>
                                    <td>    
                                <img width="100"  src="{{URL::asset($stores->icon)}}">
                                    </td>
                                      <td>    
                                <img width="100"  src="{{URL::asset($stores->banner)}}">
                                    </td>
                                    <td> <iframe src="{{ URL::asset($stores->price) }}">
</iframe> 
<a href="{{ URL::asset($stores->price) }}" target="_blank">View</a></td>
                                     
                                      <td>{{ $stores->phone_number }}</td>
                                      <td>{{ $stores->aphone_number }}</td>
                                <td>
                                    <a href="{{ route('admin.stores.stores.edit', [$stores->id]) }}">
                                        {{ $stores->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.stores.stores.edit', [$stores->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.stores.stores.destroy', [$stores->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>City Name</th>
                                <th>Area Name</th>
                                <th>Gaurage Name</th>
                                <th>Address</th>
                                <th>Icon</th>
                                <th>banner</th>
                                <th>Service charge</th>
                                <th>Phone Number</th>
                                 <th>Alternate Contact</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th>{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('stores::stores.title.create stores') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.stores.stores.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
