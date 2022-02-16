@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('bookings::newbookings.title.newbookings') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('bookings::newbookings.title.newbookings') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
               <?php if($role=="Admin"){?> 
                {!! Form::open(['route' => ['admin.bookings.newbookings.export_data'], 'method' => 'post']) !!}
                 <div class="col-sm-3">
                                <div class="form-group{{ $errors->has('fdate') ? ' has-error' : '' }}">
                                    {!! Form::label('fdate', trans('Date')) !!}
                                    {!! Form::date('fdate', old('fdate'), ['class' => 'form-control', 'placeholder' => trans('Date')]) !!}
                                    {!! $errors->first('fdate', '<span class="help-block">:message</span>') !!}
                                </div>
                 </div>
              <!--   <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('tdate') ? ' has-error' : '' }}">
                                    {!! Form::label('tdate', trans('To Date')) !!}
                                    {!! Form::date('tdate', old('tdate'), ['class' => 'form-control', 'placeholder' => trans('To Date')]) !!}
                                    {!! $errors->first('tdate', '<span class="help-block">:message</span>') !!}
                                </div>
                </div> -->
  <div class="btn-group" style="margin: 0 15px 15px 0;padding-top: 23px">

                     <button type="submit" class="btn btn-primary btn-flat">{{ trans('Download Report') }}</button>
              </div>
                  {!! Form::close() !!}
            <?php } ?> 
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
                                <th>Store Name</th>
                                <!-- <th>Brand</th>
                                <th>Model</th>
                                <th>Bike Number</th> -->
                                <th>Vehicle Details</th>
                                <th>Status</th>
                                <th>Biker-Pickup</th>
                                <!-- <th>Images</th> -->
                                <th>Biker-drop</th>
                                <!--  <th>Bill Image</th> -->
                                <th>Payment Details</th>
                                <th>Review & Rating</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                                  
                                 <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                          
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($newbookings)): ?>
                            <?php foreach ($newbookings as $newbookings): ?>
                            <tr>
                                <td>{{ $newbookings->id }}</td>
                                 <td>Customer Name:{{ $newbookings->user['first_name']}}<br>
                                    Phone:{{ $newbookings->user['phone']}}</td>
                                 <td>{{ $newbookings->store['gaurage_name'] }}</td>
                                  <td>
                                     brand:{{ $newbookings->brand1['brand_name'] }}<br>
                                    model:{{ $newbookings->model1['model_name'] }}<br>
                                    KM Reading Pickup:{{ $newbookings->kmr }}<br>
                                     KM Reading Drop:{{ $newbookings->kmrd }}<br>
                                   
                                    Vehicle Number:{{ $newbookings->bike_number }}
                                  </td>
                                    <?php if($newbookings->status==0){
                                  echo' <td style="color:green">New Order</td>';}
                                  elseif($newbookings->status==1){
                                    echo' <td style="color:green">Assigned for pickup</td>';
                                }  elseif($newbookings->status==2){
                                    echo' <td style="color:green">Pickup Done</td>';
                                }
                                 elseif($newbookings->status==3){
                                    echo' <td style="color:green">Recived at Store</td>';
                                }
                                 elseif($newbookings->status==4){
                                    echo' <td style="color:green">Ready for delivery</td>';
                                }
                                 elseif($newbookings->status==5){
                                    echo' <td style="color:green">Delivery Assigned</td>';
                                }
                                 elseif($newbookings->status==6){
                                    echo' <td style="color:green">Out for delivery</td>';
                                }
                                 elseif($newbookings->status==7){
                                    echo' <td style="color:green">Deilvered</td>';
                                }
                                 elseif($newbookings->status==8){
                                    echo' <td style="color:red">Cancelled</td>';
                                }
                                ?>
                                    <td>Biker Name:{{ $newbookings->bikerpickup1['first_name'] }} {{ $newbookings->bikerpickup1['last_name'] }}<br>
                                        Contact:{{$newbookings->bikerpickup1['phone'] }}
                                   
                                  </td>
                                    </td>
                                 <!--    <td>
                                    <img width="50"  src="{{URL::asset( $newbookings->image1)}}">
                                      <img width="50"  src="{{URL::asset( $newbookings->image2)}}">
                                        <img width="50"  src="{{URL::asset( $newbookings->image3)}}">
                                          <img width="50"  src="{{URL::asset( $newbookings->image4)}}">
                                  </td> -->
                                   <td>
                                    Biker Name:{{ $newbookings->bikerdrop1['first_name'] }} {{ $newbookings->bikerdrop1['last_name'] }}<br>
                                        Contact:{{$newbookings->bikerdrop1['phone'] }}
                                   
                                  </td>
                                <!--   <td>   <img width="100"  src="{{URL::asset( $newbookings->billimage)}}"></t -->
                                     <td>Payment:{{ $newbookings->payment }}<br>
                                        Payment after adding commission:{{ $newbookings->billpayment }}<br>
                                   Payment Status:
                                      <?php if($newbookings->payment_status==1){
                                  echo' <p style="color:green">Paid</p>';
                              }
                                  else{
                                  echo' <p style="color:red">Not Paid</p>';
                                  }?>
                                  </td>
                                    <td>Review:{{ $newbookings->review }}<br>
                                   Rating:{{ $newbookings->rating }}
                                  </td>
                                <td>
                                    <a href="{{ route('admin.bookings.newbookings.edit', [$newbookings->id]) }}">
                                        {{ $newbookings->created_at }}
                                    </a>
                                </td>
                                <?php if($newbookings->status==0){ ?>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.bookings.newbookings.edit', [$newbookings->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i>Assign</a>
                                         {!! Form::open(['route' => ['admin.bookings.newbookings.cancel'], 'method' => 'post']) !!}
                                         <input type="hidden" name="id" value="{{$newbookings->id}}">
                                        <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-close"></i>Cancel</button></a>
                                         {!! Form::close() !!}
                                    </div>
                                 </td>
                            <?php } elseif($newbookings->status==3){ ?>
                                <td>

                                     <div class="btn-group">
                                      <a href="{{ route('admin.bookings.newbookings.view', [$newbookings->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i>View</a>
                                        </div>
                                 </td>
                            <?php }  elseif($newbookings->status==2){ ?>
                                <td>

                                     <div class="btn-group">
                                      <a href="{{ route('admin.bookings.newbookings.view', [$newbookings->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i>View</a>
                                        </div>
                                 </td>
                            <?php } elseif($newbookings->status==4){ ?>
                                <td>

                                   <div class="btn-group">
                                     <a href="{{ route('admin.bookings.newbookings.edit', [$newbookings->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i>Assign</a>
                                      <a href="{{ route('admin.bookings.newbookings.view', [$newbookings->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i>View</a>
                                        </div>
                                 </td>
                            <?php } elseif($newbookings->status==5){ ?>
                                <td>

                                     <div class="btn-group">
                                      <a href="{{ route('admin.bookings.newbookings.view', [$newbookings->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i>View</a>
                                        </div>
                                 </td>
                            <?php } elseif($newbookings->status==6){ ?>
                                <td>

                                     <div class="btn-group">
                                      <a href="{{ route('admin.bookings.newbookings.view', [$newbookings->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i>View</a>
                                        </div>
                                 </td>
                            <?php } elseif($newbookings->status==7){ ?>
                                <td>

                                     <div class="btn-group">
                                      <a href="{{ route('admin.bookings.newbookings.view', [$newbookings->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-eye"></i>View</a>
                                        </div>
                                 </td>
                            <?php }
                              else { ?>
                                     <td>-NA-</td>
                                  <?php } ?>
                            
                           </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Booking ID</th>
                                <th>Customer Details</th>
                                <th>Store Name</th>
                                <th>Vehicle Details</th>
                                <th>Status</th>
                                <th>Biker-Pickup</th>
                              <!--   <th>Images</th> -->
                                <th>Biker-drop</th>
                              <!--   <th>Bill Image</th> -->
                                <th>Payment Details</th>
                                <th>Review & Rating</th>
                                
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
        <dd>{{ trans('bookings::newbookings.title.create newbookings') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.bookings.newbookings.create') ?>" }
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
