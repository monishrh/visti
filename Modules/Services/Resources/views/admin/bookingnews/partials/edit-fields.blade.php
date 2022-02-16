


<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                      <?php if($bookingnew->status==0){ ?>
                 <div class="row">

                            <div class="col-sm-4">
                              <div class="form-group{{ $errors->has('bikerpickup') ? ' has-error' : '' }}">
                                    {!! Form::label('bikerpickup', trans('Assign Biker for Pickup')) !!}
                                        <select class="form-control" name="bikerpickup"  >
                                           
                                           <option value="">--- Select Biker---</option>
                                           <?php foreach ($bikers as $value): ?>
                                                    <option value="{{ $value->id }}">{{ $value->first_name}} {{ $value->last_name}} </option>
                                                <?php endforeach; ?>
                                            
                                        </select>
                                </div>
                                <input type="hidden" name="status" value="1">
                           </div>
                       </div>
                     <?php }  else{ ?>
                        <div class="row">

                           
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('payment') ? ' has-error' : '' }}">
                                    {!! Form::label('description', trans('Payment')) !!}
                                    {!! Form::text('payment', old('payment'), ['class' => 'form-control', 'placeholder' => trans('Payment')]) !!}
                                    {!! $errors->first('payment', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                                <div class="col-sm-4">
                               <div class="form-group{{ $errors->has('payment_status') ? ' has-error' : '' }}">
                                    {!! Form::label('payment_status', trans('Select Payment Status')) !!}
                                        <select class="form-control" name="payment_status"  >
                                           
                                           <option value="">--- Select Payment Status---</option>
                                        <option value="1">Cash</option>
                                        <option value="0">Online</option>                                                 
                                        </select>
                                </div>
                                 </div>
                                <input type="hidden" name="status" value="2">
                           </div>
                       </div>
                     <?php } ?>
                   </div>
               </div>
           </div>
       </div>
       
