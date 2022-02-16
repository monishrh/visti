<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                      <?php if($newbookings->status==0){ ?>
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
                              <div class="form-group{{ $errors->has('bikerdrop') ? ' has-error' : '' }}">
                                    {!! Form::label('bikerdrop', trans('Assign Biker for Delivery')) !!}
                                        <select class="form-control" name="bikerdrop"  >
                                           
                                           <option value="">--- Select Biker---</option>
                                           <?php foreach ($bikers as $value): ?>
                                                    <option value="{{ $value->id }}">{{ $value->first_name}} {{ $value->last_name}} </option>
                                                <?php endforeach; ?>
                                            
                                        </select>
                                </div>
                                <input type="hidden" name="status" value="5">
                           </div>
                       </div>
                     <?php } ?>
                   </div>
               </div>
           </div>
       </div>
       
