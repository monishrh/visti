<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                       <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                                    {!! Form::label('state_id', trans('Select City')) !!}
                                        <select class="form-control" name="city_id"  >
                                           
                                           <option value="">--- Select---</option>
                                           <?php foreach ($city as $value): ?>
                                                    <option value="{{ $value->city_name }}">{{ $value->city_name}} </option>
                                                <?php endforeach; ?>
                                            
                                        </select>
                                </div>
                           </div>
                          
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {!! Form::label('name', trans('Vendor Name')) !!}
                                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => trans('Vendor Name')]) !!}
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                                
                        
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::label('email', trans('Email')) !!}
                                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => trans('Email')]) !!}
                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    {!! Form::label('phone', trans('Phone Number')) !!}
                                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => trans('Phone Number')]) !!}
                                    {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                           
                            <input type="hidden" name="password" value="1234">
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    {!! Form::label('address', trans('Address')) !!}
                                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => trans('Address')]) !!}
                                    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos15') ? ' has-error' : '' }}">
                                    {!! Form::label('videos15', trans('Upload Document')) !!}
                                    {!! Form::file('videos15', old('videos15'), ['class' => 'form-control', 'placeholder' => trans('Upload Document')]) !!}
                                    {!! $errors->first('videos15', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    {!! Form::label('status', trans('Status')) !!}
                                    <br>
                                    {!! Form::label('status', trans('Enable')) !!}
                                    {!! Form::radio('status', 1, ['class' => 'form-control']) !!}
                                    {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
                                    &nbsp;&nbsp;
                                    {!! Form::label('status', trans('disable')) !!}
                                    {!! Form::radio('status', 0, ['class' => 'form-control']) !!}
                                    {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
   	</div>
</div>



