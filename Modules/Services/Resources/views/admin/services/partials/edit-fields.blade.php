<div class="box-body">
    <p>
      <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {!! Form::label('name', trans('Service Name')) !!}
                                    {!! Form::text('name', old('name',$service->name), ['class' => 'form-control', 'placeholder' => trans('Service Name ')]) !!}
                                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                    {!! Form::label('description', trans('Description')) !!}
                                    {!! Form::text('description', old('description',$service->description), ['class' => 'form-control', 'placeholder' => trans('Description')]) !!}
                                    {!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                               <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('service_charge') ? ' has-error' : '' }}">
                                    {!! Form::label('service_charge', trans('Service Charge')) !!}
                                    {!! Form::text('service_charge', old('service_charge',$service->service_charge), ['class' => 'form-control', 'placeholder' => trans('Service Charge')]) !!}
                                    {!! $errors->first('service_charge', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                               <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('minimum_charge') ? ' has-error' : '' }}">
                                    {!! Form::label('minimum_charge', trans('Minimum Charges')) !!}
                                    {!! Form::text('minimum_charge', old('minimum_charge',$service->minimum_charge), ['class' => 'form-control', 'placeholder' => trans('Minimum Charges')]) !!}
                                    {!! $errors->first('minimum_charge', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
    </p>
</div>
