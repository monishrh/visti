<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
                                    {!! Form::label('c_name', trans('Coupon Name')) !!}
                                    {!! Form::text('c_name', old('c_name'), ['class' => 'form-control', 'placeholder' => trans('Coupon Name')]) !!}
                                    {!! $errors->first('c_name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('c_desc') ? ' has-error' : '' }}">
                                    {!! Form::label('c_desc', trans('Coupon Description')) !!}
                                    {!! Form::text('c_desc', old('c_desc'), ['class' => 'form-control', 'placeholder' => trans('Coupon Description')]) !!}
                                    {!! $errors->first('c_desc', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('c_discount') ? ' has-error' : '' }}">
                                    {!! Form::label('c_discount', trans('Coupon Discount')) !!}
                                    {!! Form::number('c_discount', old('c_discount'), ['class' => 'form-control', 'placeholder' => trans('Coupon Discount')]) !!}
                                    {!! $errors->first('c_discount', '<span class="help-block">:message</span>') !!}
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
