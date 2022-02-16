@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('worktimings::timings.title.timings') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('worktimings::timings.title.timings') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
              <!--   <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.worktimings.timing.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('worktimings::timings.button.create timing') }}
                    </a>
                </div> -->
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
                                <th>Gaurage Name</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($timings)): ?>
                            <?php foreach ($timings as $timing): ?>
                            <tr>
                                <td>{{ $timing->id }}</td>
                                 <?php 
                                    $areas = DB::table('stores__stores')->where('id', '=', $timing->store_id)->get();?>
                                <td>{{ $areas[0]->gaurage_name }}</td>
                                <td>Open:{{ $timing->monstart }}<br>Close:{{ $timing->monend }}<br>
                                 <?php if($timing->monstatus==1){?>
                                   <p style="color: green">Open</p>
                                  <?php } else{ ?>
                                      <p style="color: red">Closed</p>
                                   <?php } ?>
                                </td>
                                <td>Open:{{ $timing->tuestart }}<br>Close:{{ $timing->tueend }}<br>
                                 <?php if($timing->tuestatus==1){?>
                                   <p style="color: green">Open</p>
                                  <?php } else{ ?>
                                      <p style="color: red">Closed</p>
                                   <?php } ?></td>
                                <td>Open:{{ $timing->wedstart }}<br>Close:{{ $timing->wedend }}<br>
                                 <?php if($timing->wedstatus==1){?>
                                   <p style="color: green">Open</p>
                                  <?php } else{ ?>
                                      <p style="color: red">Closed</p>
                                   <?php } ?></td>
                                <td>Open:{{ $timing->thustart }}<br>Close:{{ $timing->thuend }}<br>
                                 <?php if($timing->thustatus==1){?>
                                   <p style="color: green">Open</p>
                                  <?php } else{ ?>
                                      <p style="color: red">Closed</p>
                                   <?php } ?></td>
                                <td>Open:{{ $timing->fristart }}<br>Close:{{ $timing->friend }}<br>
                                 <?php if($timing->fristatus==1){?>
                                   <p style="color: green">Open</p>
                                  <?php } else{ ?>
                                      <p style="color: red">Closed</p>
                                   <?php } ?></td>
                                <td>Open:{{ $timing->satstart }}<br>Close:{{ $timing->satend }}<br>
                                 <?php if($timing->satstatus==1){?>
                                   <p style="color: green">Open</p>
                                  <?php } else{ ?>
                                      <p style="color: red">Closed</p>
                                   <?php } ?></td>
                                <td>Open:{{ $timing->sunstart }}<br>Close:{{ $timing->sunend }}
                                <br>
                                 <?php if($timing->sunstatus==1){?>
                                   <p style="color: green">Open</p>
                                  <?php } else{ ?>
                                      <p style="color: red">Closed</p>
                                   <?php } ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                  <th>ID</th>
                                <th>Gaurage Name</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
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
        <dd>{{ trans('worktimings::timings.title.create timing') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.worktimings.timing.create') ?>" }
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
