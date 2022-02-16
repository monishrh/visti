
<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                        <div class="row">
                               <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos13') ? ' has-error' : '' }}">
                                    {!! Form::label('videos13', trans('Upload Image')) !!}
                                    {!! Form::file('videos13', old('videos13'), ['class' => 'form-control', 'placeholder' => trans('Upload Image')]) !!}
                                    {!! $errors->first('videos13', '<span class="help-block">:message</span>') !!}
                                </div>
                               
                                <img width="200" src="{{URL::asset($banner->image1)}}">

                                      </img>
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



