<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                   <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('typename') ? ' has-error' : '' }}">
                                    {!! Form::label('typename', trans('Type Name')) !!}
                                    {!! Form::text('typename', old('typename'), ['class' => 'form-control', 'placeholder' => trans('Type Name')]) !!}
                                    {!! $errors->first('typename', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>	
                                
                        
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('bprice') ? ' has-error' : '' }}">
                                    {!! Form::label('bprice', trans('Base Price')) !!}
                                    {!! Form::text('bprice', old('bprice'), ['class' => 'form-control', 'placeholder' => trans('Base Price')]) !!}
                                    {!! $errors->first('bprice', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('price1_10') ? ' has-error' : '' }}">
                                    {!! Form::label('price1_10', trans('Price 1KM-10KM')) !!}
                                    {!! Form::text('price1_10', old('price1_10'), ['class' => 'form-control', 'placeholder' => trans('Price 1KM-10KM')]) !!}
                                    {!! $errors->first('price1_10', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('price10_15') ? ' has-error' : '' }}">
                                    {!! Form::label('price10_15', trans('Price 10KM-15KM')) !!}
                                    {!! Form::text('price10_15', old('price10_15'), ['class' => 'form-control', 'placeholder' => trans('Price 10KM-15KM')]) !!}
                                    {!! $errors->first('price10_15', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('price15_20') ? ' has-error' : '' }}">
                                    {!! Form::label('price15_20', trans('Price 15KM-20KM')) !!}
                                    {!! Form::text('price15_20', old('price15_20'), ['class' => 'form-control', 'placeholder' => trans('Price 10KM-15KM')]) !!}
                                    {!! $errors->first('price15_20', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('price20_25') ? ' has-error' : '' }}">
                                    {!! Form::label('price20_25', trans('Price 20KM-25KM')) !!}
                                    {!! Form::text('price20_25', old('price20_25'), ['class' => 'form-control', 'placeholder' => trans('Price 20KM-25KM')]) !!}
                                    {!! $errors->first('price20_25', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                               <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('price25') ? ' has-error' : '' }}">
                                    {!! Form::label('price25', trans('Price > 25KM')) !!}
                                    {!! Form::text('price25', old('price25'), ['class' => 'form-control', 'placeholder' => trans('Price > 25KM')]) !!}
                                    {!! $errors->first('price25', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos16') ? ' has-error' : '' }}">
                                    {!! Form::label('videos16', trans('Upload Image')) !!}
                                    {!! Form::file('videos16', old('videos16'), ['class' => 'form-control', 'placeholder' => trans('Upload Image')]) !!}
                                    {!! $errors->first('videos16', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos15') ? ' has-error' : '' }}">
                                    {!! Form::label('videos15', trans('Upload Rate Card')) !!}
                                    {!! Form::file('videos15', old('videos15'), ['class' => 'form-control', 'placeholder' => trans('Upload Rate Card')]) !!}
                                    {!! $errors->first('videos15', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                         
                            
                        </div>
                        </div>
                    </div>
                </div>
   	</div>
</div>




