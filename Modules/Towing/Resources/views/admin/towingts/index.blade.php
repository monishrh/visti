@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('towing::towingts.title.towingts') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('towing::towingts.title.towingts') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.towing.towingt.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('towing::towingts.button.create towingt') }}
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

                                <th>Type Name</th>
                                <th>Base Price</th>
                                <th>Price 1KM-10KM</th>
                                 <th>Price 10KM-15KM</th>
                                 <th>Price 15KM-20KM</th>
                                 <th>Price 20KM-25KM</th>
                                  <th>Price > 25KM</th>
                                    <th>Image</th>
                                    <th>Rate Card</th>
                               
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($towingts)): ?>
                            <?php foreach ($towingts as $towingt): ?>
                            <tr>
                                <td>{{ $towingt->typename }}</td>
                                 <td>{{ $towingt->bprice }}</td>
                                  <td>{{ $towingt->price1_10 }}</td>
                                   <td>{{ $towingt->price10_15 }}</td>
                                    <td>{{ $towingt->price15_20 }}</td>
                                    <td>{{ $towingt->price20_25 }}</td>
                                     <td>{{ $towingt->price25 }}</td>
                                  <td>    
                                <img width="50"  src="{{URL::asset($towingt->img)}}">
                                    </td>
                                    <td>    
                                <img width="50"  src="{{URL::asset($towingt->ratecard)}}">
                                    </td>
                              
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.towing.towingt.edit', [$towingt->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.towing.towingt.destroy', [$towingt->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                 <th>Type Name</th>
                                <th>Base Price</th>
                                <th>Price 1KM-10KM</th>
                                 <th>Price 10KM-15KM</th>
                                  <th>Price 15KM-20KM</th>
                                 <th>Price 20KM-25KM</th>
                                  <th>Price > 25KM</th>
                                    <th>Image</th>
                                    <th>Rate Card</th>
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
        <dd>{{ trans('towing::towingts.title.create towingt') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.towing.towingt.create') ?>" }
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
