<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">
                              <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                                    {!! Form::label('city_id', trans('Select City')) !!}
                                        <select class="form-control" name="city_id"  >
                                           
                                           <option value="">--- Select City---</option>
                                           <?php foreach ($city as $value): ?>
                                                    <option value="{{ $value->id }}">{{ $value->city_name}} </option>
                                                <?php endforeach; ?>
                                            
                                        </select>
                                </div>
                           </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('area_name') ? ' has-error' : '' }}">
                                    {!! Form::label('area_name', trans('Area Name')) !!}
                                    {!! Form::text('area_name', old('area_name'), ['class' => 'form-control', 'placeholder' => trans('Area Name')]) !!}
                                    {!! $errors->first('area_name', '<span class="help-block">:message</span>') !!}
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
