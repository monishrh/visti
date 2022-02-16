@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('Newbookings') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('Newbookings') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            
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
                                <th>Service Name</th>
                                
                                <th>Biker-Pickup</th>
                                 <th>Payment Details</th>
                                <th>Review & Rating</th>
                                 <th>Status</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($bookingnews)): ?>
                            <?php foreach ($bookingnews as $bookingnew): ?>
                            <tr>
                                <td>{{$bookingnew->id}}</td>
                                  <td>Customer Name:{{ $bookingnew->user['first_name']}}<br>
                                    Phone:{{ $bookingnew->user['phone']}}</td>
                               
                                     <?php if($bookingnew->service_id==1){
                                          echo' <td style="color:green">Towing</td>';
                              }
                              else{
                                  echo' <td style="color:green">Petrol</td>';
                              }?>
                                   
                                    
                                   <td>Biker Name:{{ $bookingnew->bikerpickup1['first_name'] }} {{ $bookingnew->bikerpickup1['last_name'] }}<br>
                                        Contact:{{$bookingnew->bikerpickup1['phone'] }}
                                   
                                  </td>
                                   <td>Fuel Cost:Rs.{{ $bookingnew->payment }}<br>
                                     Service Charge:Rs.{{ $bookingnew->s_charge }}<br> 
                                   Payment Status:
                                      <?php if($bookingnew->payment_status==1){
                                  echo' <p style="color:green">Paid</p>';
                              }
                                  else{
                                  echo' <p style="color:red">Not Paid</p>';
                                  }?>
                                  </td>
                                   <td>Review:{{ $bookingnew->review }}<br>
                                   Rating:{{ $bookingnew->rating }}
                                  </td>
                              
                                       <?php if($bookingnew->status==0){
                                          echo' <td style="color:yellow">New Booking</td>';
                              }
                              elseif($bookingnew->status==1){
                                  echo' <td style="color:orange">Assigned</td>';
                              } elseif($bookingnew->status==2){
                                  echo' <td style="color:green">Ongoing</td>';
                              }elseif($bookingnew->status==3){
                                 echo' <td style="color:green">Completed</td>';
                               }
                               else{
                                echo' <td style="color:red">Cancelled</td>';
                            }
                                ?>
                                <td>
                                    <a href="{{ route('admin.services.bookingnew.edit', [$bookingnew->id]) }}">
                                        {{ $bookingnew->created_at }}
                                    </a>
                                </td>

                             
                                      <?php if($bookingnew->status==0){?>
                                      <td> <div class="btn-group">
                                        <a href="{{ route('admin.services.bookingnew.edit', [$bookingnew->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i>Assign</a>
                                       {!! Form::open(['route' => ['admin.services.bookingnew.cancel'], 'method' => 'post']) !!}
                                         <input type="hidden" name="id" value="{{$bookingnew->id}}">
                                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-close"></i>Cancel</button></a>
                                         {!! Form::close() !!}
                                    </div> </td>
                                <?php }else{ ?>
                                <td>N/A</td>
                               <?php } ?>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer Details</th>
                                <th>Service Name</th>
                                <th>Biker-Pickup</th>
                                 <th>Payment Details</th>
                                <th>Review & Rating</th>
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
        <dd>{{ trans('services::bookingnews.title.create bookingnew') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.services.bookingnew.create') ?>" }
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
