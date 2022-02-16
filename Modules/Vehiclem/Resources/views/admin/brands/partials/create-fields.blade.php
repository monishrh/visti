<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                             
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('brand_name') ? ' has-error' : '' }}">
                                    {!! Form::label('brand_name', trans('Brand Name')) !!}
                                    {!! Form::text('brand_name', old('brand_name'), ['class' => 'form-control', 'placeholder' => trans('Brand Name')]) !!}
                                    {!! $errors->first('brand_name', '<span class="help-block">:message</span>') !!}
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

