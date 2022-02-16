@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Insurance') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Insurance') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
               <!--  <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.insurance.newi.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('insurance::newis.button.create newi') }}
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
                                 <th>Customer Info.</th>
                                   <th>Vehicle Type</th>
                                     <th>RC</th>
                                       <th>Previous Insurance</th>
                                         <th>Amount</th>
                                          <th>Documents</th>
<th>Status</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($newis)): ?>
                            <?php foreach ($newis as $newi): ?>
                            <tr>
                                <td>{{ $newi->id }}</td>
                                  <td>Customer Name:{{ $newi->user['first_name']}}<br>
                                    Phone:{{ $newi->user['phone']}}</td>

                                <td>{{ $newi->vehicletype }}</td>
                                 <td>    
                                <img width="100"  src="{{URL::asset($newi->rc)}}">
                                    </td>
                                      <td>    
                                <img width="100"  src="{{URL::asset($newi->pinsurance)}}">
                                    </td>
                                     <td>Payment:Rs.{{ $newi->amount }}<br>
                                      Payment Status:
                                      <?php if($newi->pstatus==1){
                                  echo' <p style="color:green">Paid</p>';
                              }
                                  else{
                                  echo' <p style="color:red">Not Paid</p>';
                                  }?></td>
                                    
                                     <?php if(isset($newi->doc)){ ?>
                                         <td>    
                                <img width="100"  src="{{URL::asset($newi->doc)}}">
                                    </td>
                                <?php }else{ ?>
                                    <td>N/A</td>
                                <?php } ?>
                                  <?php if($newi->status==0){
                                          echo' <td style="color:yellow">New Booking</td>';
                              }
                              elseif($newi->status==1){
                                  echo' <td style="color:orange">Ongoing</td>';
                              } elseif($newi->status==2){
                                  echo' <td style="color:green">Completed</td>';
                              }
                              else
                              {
                                 echo' <td style="color:red">Cancelled</td>';
                              }
                                ?>
                              <?php if($newi->status==0){ ?>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.insurance.newi.edit', [$newi->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i>Upadate</a>
                                         {!! Form::open(['route' => ['admin.insurance.newi.cancel'], 'method' => 'post']) !!}
                                         <input type="hidden" name="id" value="{{$newi->id}}">
                                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-close"></i>Cancel</button></a>
                                         {!! Form::close() !!}
                                    </div>
                                 </td>
                             <?php } elseif ($newi->status==1) { ?>
                                    <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.insurance.newi.edit', [$newi->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i>Upload Insurance</a>
                                       
                                    </div>
                                 </td>
                             <?php } else{?>
                                <td>N/A</td>
                            <?php } ?>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                 <th>Customer Info.</th>
                                   <th>Vehicle Type</th>
                                     <th>RC</th>
                                       <th>Previous Insurance</th>
                                         <th>Amount</th>
                                          <th>Documents</th>
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
        <dd>{{ trans('insurance::newis.title.create newi') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.insurance.newi.create') ?>" }
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
