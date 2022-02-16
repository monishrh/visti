<div class="box-body">
     <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <div class="box-body">
                      <?php if($newi->status==0){ ?>
                 <div class="row">

                              <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                    {!! Form::label('amount', trans('Insurance Amount')) !!}
                                    {!! Form::text('amount', old('amount'), ['class' => 'form-control', 'placeholder' => trans('Insurance Amount')]) !!}
                                    {!! $errors->first('amount', '<span class="help-block">:message</span>') !!}
                         
                                <input type="hidden" name="status" value="1">
                           </div>
                       </div>
                     <?php }  else{ ?>
                        <div class="row">

                             <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('videos13') ? ' has-error' : '' }}">
                                    {!! Form::label('videos13', trans('Upload Insurance')) !!}
                                    {!! Form::file('videos13', old('videos13'), ['class' => 'form-control', 'placeholder' => trans('Upload Insurance')]) !!}
                                    {!! $errors->first('videos13', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                                <input type="hidden" name="status" value="2">
                           </div>
                       </div>
                     <?php } ?>
                   </div>
               </div>
           </div>
       </div>
       

