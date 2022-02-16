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
                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    {!! Form::label('phone', trans('Phone Number')) !!}
                                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => trans('Phone Number')]) !!}
                                    {!! $errors->first('phone', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {!! Form::label('password', trans('Password')) !!}
                                    {!! Form::text('password', old('password'), ['class' => 'form-control', 'placeholder' => trans('Password')]) !!}
                                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('dl') ? ' has-error' : '' }}">
                                    {!! Form::label('dl', trans('Driving Licence No.')) !!}
                                    {!! Form::text('dl', old('dl'), ['class' => 'form-control', 'placeholder' => trans('Driving Licence No.')]) !!}
                                    {!! $errors->first('dl', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos15') ? ' has-error' : '' }}">
                                    {!! Form::label('videos15', trans('Upload DL Image')) !!}
                                    {!! Form::file('videos15', old('videos15'), ['class' => 'form-control', 'placeholder' => trans('Upload DL Image')]) !!}
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


