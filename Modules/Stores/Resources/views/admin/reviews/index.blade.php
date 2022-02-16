@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('stores::reviews.title.reviews') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('stores::reviews.title.reviews') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
               <!--  <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.stores.reviews.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('stores::reviews.button.create reviews') }}
                    </a>
                </div> -->
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
                                <th>Store</th>
                                <th>Cutomer Name</th>
                                <th>Review</th>
                                <th>Rating</th>
                                <th>{{ trans('core::core.table.created at') }}</th>
                             
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($reviews)): ?>
                            <?php foreach ($reviews as $reviews): ?>
                            <tr>
                                 <?php 
                                    $areas = DB::table('stores__stores')->where('id', '=',$reviews->store_id)->get();
                                    $areas1 = DB::table('users')->where('id', '=',$reviews->user_id)->get();
                                 ?>
                                <td>{{ $reviews->id }}</td>
                                 <td>{{ $areas[0]->gaurage_name }}</td>
                                  <td>{{ $areas[0]->first_name  }}</td>
                                   <td>{{ $reviews->review }}</td>
                                    <td>{{ $reviews->rating }}</td>
                                <td>
                                    <a href="{{ route('admin.stores.reviews.edit', [$reviews->id]) }}">
                                        {{ $reviews->created_at }}
                                    </a>
                                </td>
                              
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                 <th>ID</th>
                                <th>Store</th>
                                <th>Cutomer Name</th>
                                <th>Review</th>
                                <th>Rating</th>
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
        <dd>{{ trans('stores::reviews.title.create reviews') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.stores.reviews.create') ?>" }
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
