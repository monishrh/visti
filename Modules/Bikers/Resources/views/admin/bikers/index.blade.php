@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('bikers::bikers.title.bikers') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('bikers::bikers.title.bikers') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.bikers.biker.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('bikers::bikers.button.create biker') }}
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
                                <th>City</th>
                                <th>Area</th>
                                 <th>First Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                 <th>Driving Liecense No.</th>
                                <th>Driving Liecense</th>
                                <th>Status</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($bikers)): ?>
                            <?php foreach ($bikers as $biker): ?>
                            <tr>
                                <?php 
                                    $areas = DB::table('region__cities')->where('id', '=',$biker->city_id)->get();
                                     $areas1 = DB::table('region__areas')->where('id', '=',$biker->area_id)->get();
                                 ?>
                                   <td>{{ $areas[0]->city_name }}</td>
                                 <td>{{ $areas1[0]->area_name }}</td>
                                <td> {{ $biker->first_name }}</td>
                                <td> {{ $biker->email }}</td>
                                  <td> {{ $biker->phone }}</td>
                                  <td> {{ $biker->dl }}</td>
                                   <td>    
                                <img width="50"  src="{{URL::asset($biker->dl_img)}}">
                                    </td>
                                     <?php if($biker->status==1){
                                  echo' <td style="color:green">Active</td>';}
                                  else{
                                    echo' <td style="color:red">Inactive</td>';
                                }?>
                                <td>
                                    <a href="{{ route('admin.bikers.biker.edit', [$biker->id]) }}">
                                        {{ $biker->created_at }}
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.bikers.biker.edit', [$biker->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.bikers.biker.destroy', [$biker->id]) }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                 <th>City</th>
                                <th>Area</th>
                                 <th>First Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                 <th>Driving Liecense No.</th>
                                <th>Driving Liecense</th>
                                <th>Status</th>
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
        <dd>{{ trans('bikers::bikers.title.create biker') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.bikers.biker.create') ?>" }
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
