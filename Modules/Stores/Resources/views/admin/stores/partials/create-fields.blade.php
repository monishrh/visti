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
                                                    <option value="{{ $value->id }}">{{ $value->city_name}} </option>
                                                <?php endforeach; ?>
                                            
                                        </select>
                                </div>
                           </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }}">
                                    {!! Form::label('area_id', trans('Select Area')) !!}
                                   {!! Form::select('area_id',[''=>'--- Select Area---'],null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('gaurage_name') ? ' has-error' : '' }}">
                                    {!! Form::label('gaurage_name', trans('Store Name')) !!}
                                    {!! Form::text('gaurage_name', old('gaurage_name'), ['class' => 'form-control', 'placeholder' => trans('Store Name')]) !!}
                                    {!! $errors->first('gaurage_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    {!! Form::label('address', trans('Address')) !!}
                                    {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => trans('Address')]) !!}
                                    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                                    {!! Form::label('lat', trans('Lattitude')) !!}
                                    {!! Form::text('lat', old('lat'), ['class' => 'form-control', 'placeholder' => trans('Lattitude')]) !!}
                                    {!! $errors->first('lat', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('longi') ? ' has-error' : '' }}">
                                    {!! Form::label('longi', trans('Longitude')) !!}
                                    {!! Form::text('longi', old('longi'), ['class' => 'form-control', 'placeholder' => trans('Longitude')]) !!}
                                    {!! $errors->first('longi', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos13') ? ' has-error' : '' }}">
                                    {!! Form::label('videos13', trans('Upload Icon')) !!}
                                    {!! Form::file('videos13', old('videos13'), ['class' => 'form-control', 'placeholder' => trans('Upload Icon')]) !!}
                                    {!! $errors->first('videos13', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos14') ? ' has-error' : '' }}">
                                    {!! Form::label('videos14', trans('Upload banner')) !!}
                                    {!! Form::file('videos14', old('videos14'), ['class' => 'form-control', 'placeholder' => trans('Upload banner')]) !!}
                                    {!! $errors->first('videos14', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos15') ? ' has-error' : '' }}">
                                    {!! Form::label('videos15', trans('Upload Price')) !!}
                                    {!! Form::file('videos15', old('videos15'), ['class' => 'form-control', 'placeholder' => trans('Upload Price')]) !!}
                                    {!! $errors->first('videos15', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                    {!! Form::label('phone_number', trans('Phone Number')) !!}
                                    {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control', 'placeholder' => trans('Phone Number')]) !!}
                                    {!! $errors->first('phone_number', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('aphone_number') ? ' has-error' : '' }}">
                                    {!! Form::label('aphone_number', trans('Alternate Contact')) !!}
                                    {!! Form::text('aphone_number', old('aphone_number'), ['class' => 'form-control', 'placeholder' => trans('Alternate Contact')]) !!}
                                    {!! $errors->first('aphone_number', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                        <h2>Owner Details</h2>
                            <div class="row">
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    {!! Form::label('first_name', trans('First Name')) !!}
                                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => trans('First Name')]) !!}
                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    {!! Form::label('first_name', trans('Last Name')) !!}
                                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => trans('First Name')]) !!}
                                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
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
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {!! Form::label('password', trans('Password')) !!}
                                    {!! Form::text('password', old('password'), ['class' => 'form-control', 'placeholder' => trans('Password')]) !!}
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                            </div>
                        </div>
                     </div>
                    </div>
                </div>
        	</div>
     </div>




