<div class="box-body">
        <div class="col-sm-4">
                              <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    {!! Form::label('user_id', trans('Select User')) !!}
                                        <select class="form-control" name="user_id"  >
                                           
                                           <option value="">--- Select User---</option>
                                           <?php foreach ($user as $value): ?>
                                                    <option value="{{ $value->user_id }}">{{ $value->first_name}} {{ $value->last_name}} </option>
                                                <?php endforeach; ?>
                                            
                                        </select>
                                </div>
                                <input type="hidden" name="type" value="1">
                           </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                    {!! Form::label('amount', trans('Amount')) !!}
                                    {!! Form::text('amount', old('amount'), ['class' => 'form-control', 'placeholder' => trans('Amount')]) !!}
                                    {!! $errors->first('amount', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
</div>
