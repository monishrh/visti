@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('appusers::uservehis.title.uservehis') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('appusers::uservehis.title.uservehis') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
              
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="data-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                  <th>Customer Name</th>
                                  <th>Brand</th>
                                   <th>Model</th>
                                   <th>Bike Number</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                             
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($uservehis)): ?>
                            <?php foreach ($uservehis as $uservehi): ?>
                            <tr>
                                <td>{{ $uservehi->id }}</td>
                                <td>{{ $uservehi->user['first_name'] }} {{ $uservehi->user['last_name'] }}</td>
                                <td> {{ $uservehi->brand1['brand_name']}}</td>
                                 <td> {{ $uservehi->model1['model_name'] }}</td>
                                 <td> {{ $uservehi->bike_number }}</td>
                                <td>
                                    <a href="{{ route('admin.appusers.uservehi.edit', [$uservehi->id]) }}">
                                        {{ $uservehi->created_at }}
                                    </a>
                                </td>
                              
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                 <th>ID</th>
                                  <th>Customer Name</th>
                                  <th>Brand</th>
                                   <th>Model</th>
                                   <th>Bike Number</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                             
                            </tr>
                            </tfoot>
                        </table>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('appusers::uservehis.title.create uservehi') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.appusers.uservehi.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@endpush
