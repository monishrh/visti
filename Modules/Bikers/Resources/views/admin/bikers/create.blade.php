@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('bikers::bikers.title.create biker') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.bikers.biker.index') }}">{{ trans('bikers::bikers.title.bikers') }}</a></li>
        <li class="active">{{ trans('bikers::bikers.title.create biker') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.bikers.biker.store'], 'method' => 'post','files' => 'true']) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('bikers::admin.bikers.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.bikers.biker.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.bikers.biker.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
        });
    </script>
       <script type="text/javascript">
      $("select[name='city_id']").change(function(){
          var v_id = $(this).val();
          var token = $("input[name='_token']").val();
          $.ajax({
              url: "<?php echo route('admin.stores.stores.points1') ?>",
              method: 'POST',
              data: {v_id:v_id, _token:token},
              success: function(data) {
                $("select[name='area_id '").html('');
                $("select[name='area_id'").html(data.options);
              }
          });
      });
     
    </script>
@endpush
