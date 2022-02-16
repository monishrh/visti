@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Towing Orders') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Towing Orders') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
               
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
                                <th>Booking ID</th>
                                <th>Customer Details</th>
                                <th>Booking Details</th>
                                <th>RC</th>
                                <th>Payment</th>
                                <th>Pickup Address</th>
                                <th>Drop Address</th>
                                 <th>Vendor Details</th>
                               <th>Status</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($tnews)): ?>
                            <?php foreach ($tnews as $tnew): ?>
                            <tr>
                                <td>  {{ $tnew->id }}</td>
                                    <td>Customer Name:{{ $tnew->user['first_name']}}<br>
                                    Phone:{{ $tnew->user['phone']}}</td>
                                     <?php 
                                    $areas = DB::table('towing__towingts')->where('id', '=',$tnew->type)->get();
                                    
                                 ?>
                                    <td>Type:{{$areas[0]->typename }}<br>
                                        Booking Date/Time:{{ $tnew->bdate }}/{{ $tnew->dtime }}</td>
                                        <td> <img width="100"  src="{{URL::asset($tnew->rc)}}"></td>
                                          <td>  {{ $tnew->payment }}</td>
                                           <td>  {{ $tnew->paddress }}</td>
                                           <td>  {{ $tnew->daddress }}</td>
                                     <td> Name: {{ $tnew->vendor['name'] }}<br>
                                        Phone:{{ $tnew->vendor['phone'] }}</td> 
                                           <?php if($tnew->status==0){
                                  echo' <td style="color:green">New Booking</td>';}
                                  elseif($tnew->status==1){
                                    echo' <td style="color:green">Assigned</td>';
                                }  elseif($tnew->status==2){
                                    echo' <td style="color:green">Completed</td>';
                                }
                                 elseif($tnew->status==4){
                                    echo' <td style="color:red">Cancelled</td>';
                                } ?>
                                <td>
                                    <?php if($tnew->status==0){ ?>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.towing.tnew.edit', [$tnew->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil">Assign</i></a>
                                           {!! Form::open(['route' => ['admin.towing.tnew.cancel'], 'method' => 'post']) !!}
                                         <input type="hidden" name="id" value="{{$tnew->id}}">
                                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-close"></i>Cancel</button></a>
                                         {!! Form::close() !!}
                                       <!--  <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.towing.tnew.destroy', [$tnew->id]) }}"><i class="fa fa-trash"></i></button> -->
                                    </div>
                                <?php }elseif($tnew->status==1){ ?>
                                     {!! Form::open(['route' => ['admin.towing.tnew.change'], 'method' => 'post']) !!}
                                         <input type="hidden" name="id" value="{{$tnew->id}}">
                                        <button type="submit" class="btn btn-sucess btn-flat"><i class="fa fa-upload"></i>Update</button></a>
                                         {!! Form::close() !!}
                                <?php } else{ ?>
                                    <p>N/A</p>
                                
                                <?php } ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr> <th>Booking ID</th>
                                <th>Customer Details</th>
                                <th>Booking Details</th>
                                <th>Payment</th>
                                <th>Pickup Address</th>
                                <th>Drop Address</th>
                                 <th>Vendor Details</th>
                                   <th>Status</th>
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
        <dd>{{ trans('towing::tnews.title.create tnew') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.towing.tnew.create') ?>" }
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
