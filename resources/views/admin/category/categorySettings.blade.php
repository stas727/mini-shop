@extends('layouts.admin')
@section('css')
    <link href="{!! asset('assets/admin/css/plugins/iCheck/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/admin/css/plugins/chosen/bootstrap-chosen.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/admin/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}" rel="stylesheet">
@endsection
@section('content')
    @include('admin.includes.messages')
    <div class="wrapper wrapper-content animated fadeInRight">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Категории</a></li>
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Создание и удаление категорий
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h2>Категории</h2>
                            </div>
                            <div class="ibox-content">
                                <div class="form-group">
                                    <form action="" method="POST">
                                    </form>
                                </div>
                                @include('admin.category.category')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Создание и удаление подкатегорий</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h2>Подкатегории</h2>
                            </div>
                            <div class="ibox-content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hr-line-dashed"></div>
@endsection
@section('scripts')
    <script src="{!! asset('vendor/laravel-filemanager/js/lfm.js')!!}"></script>
    <script src="{!! asset('assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/js/plugins/chosen/chosen.jquery.js') !!}"></script>
    <script src="{!! asset('assets/admin/js/plugins/nestable/jquery.nestable.js') !!}"></script>
    <script src="{!! asset('/js/ajax/category.js') !!}"></script>
    <script src="{!! asset('assets/admin/js/user/settings.js') !!}"></script>
@stop