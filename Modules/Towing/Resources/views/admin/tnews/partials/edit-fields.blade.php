<div class="box-body">
  <div class="row">
              <div class="col-sm-4">
                              <div class="form-group{{ $errors->has('vendor_id') ? ' has-error' : '' }}">
                                    {!! Form::label('vendor_id', trans('Assign Towing Vendors')) !!}
                                        <select class="form-control" name="vendor_id"  >
                                           
                                           <option value="">--- Select Vendor---</option>
                                           <?php foreach ($vendor as $value): ?>
                                                    <option value="{{ $value->id }}">{{ $value->name}}- {{ $value->city_id}}-{{ $value->city_id}} </option>
                                                <?php endforeach; ?>
                                            
                                        </select>
                                </div>
                                <input type="hidden" name="status" value="1">
                           </div>
                       </div>
</div>
