<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">
                            	 <?php 
                                    $areas = DB::table('vehiclem__brands')->where('id', '=',$bmodel->brand_id)->get();
                                 ?>
                              
                                 
                              <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }}">
                                    {!! Form::label('city_id', trans('Select Brand')) !!}
                                        <select class="form-control" name="brand_id"  >
                                           
                                           <option value="{{$areas[0]->id}}">--- {{ $areas[0]->brand_name }}---</option>
                                           <?php foreach ($brand as $value): ?>
                                                    <option value="{{ $value->id }}">{{ $value->brand_name}} </option>
                                                <?php endforeach; ?>
                                            
                                        </select>
                                </div>
                           </div>
                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('model_name') ? ' has-error' : '' }}">
                                    {!! Form::label('model_name', trans('Model Name')) !!}
                                    {!! Form::text('model_name', old('model_name',$bmodel->model_name), ['class' => 'form-control', 'placeholder' => trans('Model Name')]) !!}
                                    {!! $errors->first('model_name', '<span class="help-block">:message</span>') !!}
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

