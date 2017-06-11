@extends('layouts.admin')
@section('css')
    <link href="{!! asset('assets/admin/css/plugins/jasny/jasny-bootstrap.min.css') !!}" rel="stylesheet">
    <style>
        .prImg {
            position: relative;
        }

        .closeImg {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 24px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 5px;
            transition: all 0.5s;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .closeImg:hover {
            background-color: rgba(0, 0, 0, 0.9);
            cursor: pointer;
        }
    </style>
    <style>
        #file-6 {
            display: none;
        }

        #sortable img {
            float: left;
            width: 100%;
            display: block;
            margin: 0 0 10px 0;
            max-height: 180px;
            object-fit: cover;
        }
        .prImg img{
            object-fit: cover;
        }
        #sortable div {

            display: inline-block;
            float: left;
            margin: 5px 5px;
            min-height: 300px;
            max-height: 335px;
        }

        #sortable div div {
            display: block;
            width: 250px;
            padding: 5px;

        }

        #sortable div div button, #sortable div div textarea {
            display: block;
            width: 100%;
        }

        #sortable div div textarea {
            margin-bottom: 10px;

        }

        .fileUpload label {

        }

        textarea {

        }
    </style>
    <style>
        .imgFon {
            width: 100%;
        }

        .prImg {
            position: relative;
        }

        .prImg img {
            width: 226px;
            height: 226px;
        }

        .closeImg {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 24px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 5px;
            transition: all 0.5s;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        .closeImg:hover {
            background-color: rgba(0, 0, 0, 0.9);
            cursor: pointer;
        }

        .altLight {
            background: rgb(190, 222, 190);
        }

        .imgElement {
            float: left;
            padding: 5px;
        }
    </style>
@stop
@section('content')
    @include('Admin.includes.messages')
    <form action="/admin/main" method="post">
        {!! csrf_field() !!}
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion"
                                             href="tabs_panels.html#collapseOne" style="cursor:pointer;">
                                            <h4 class="panel-title">
                                                <a>Баннер</a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="row animated fadeInRight">
                                                    <div class="col-md-12">
                                                        <div class="ibox float-e-margins">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="images">
                                                                        <div class="imgElement">
                                                                            <div class="prImg">
                                                                                <input type="hidden"
                                                                                       name="link[]"
                                                                                       value="@if(!empty($images[0]->link)){!! url($images[0]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                                <img src="@if(!empty($images[0]->link)){!! url($images[0]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                     style="margin: 0 auto; cursor: pointer"
                                                                                     class="img-responsive lfm "
                                                                                     alt="">
                                                                                <i class="fa fa-times closeImg delete"
                                                                                   aria-hidden="true"></i>
                                                                                <label for="">Alt:</label>
                                                                                <input type="text" name="alt[]"
                                                                                       class="form-control"
                                                                                       value="@if(!empty($images[0]->alt)){!! $images[0]->alt !!}@endif">
                                                                            </div>
                                                                        </div>
                                                                        <div class="imgElement">
                                                                            <div class="prImg">
                                                                                <input type="hidden"
                                                                                       name="link[]"
                                                                                       value="@if(!empty($images[1]->link)){!! url($images[1]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                                <img src="@if(!empty($images[1]->link)){!! url($images[1]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                     style="margin: 0 auto; cursor: pointer"
                                                                                     class="img-responsive lfm "
                                                                                     alt="">
                                                                                <i class="fa fa-times closeImg delete"
                                                                                   aria-hidden="true"></i>
                                                                                <label for="">Alt:</label>
                                                                                <input type="text" name="alt[]"
                                                                                       class="form-control"
                                                                                       value="@if(!empty($images[1]->alt)){!! $images[1]->alt !!}@endif">
                                                                            </div>
                                                                        </div>
                                                                        <div class="imgElement">
                                                                            <div class="prImg">
                                                                                <input type="hidden"
                                                                                       name="link[]"
                                                                                       value="@if(!empty($images[2]->link)){!! url($images[2]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                                <img src="@if(!empty($images[2]->link)){!! url($images[2]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                     style="margin: 0 auto; cursor: pointer"
                                                                                     class="img-responsive lfm "
                                                                                     alt="">
                                                                                <i class="fa fa-times closeImg delete"
                                                                                   aria-hidden="true"></i>
                                                                                <label for="">Alt:</label>
                                                                                <input type="text" name="alt[]"
                                                                                       class="form-control"
                                                                                       value="@if(!empty($images[2]->alt)){!! $images[2]->alt !!}@endif">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ibox-content">
                                                                        <div class="panel panel-default">
                                                                            <div class="panel-heading">
                                                                                <i class="fa fa-info-circle"></i> Настройки
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="form-group">
                                                                                    <label for="title">Мета заголовок :</label>
                                                                                    <input id="title" name="meta_title" type="text" placeholder="Title" class="form-control" value="@if(!empty($main->meta_title)){!! $main->meta_title !!}@endif" />
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="meta_key">Meta ключи :</label>
                                                                                    <input id="meta_key" name="meta_key" type="text" placeholder="Meta keys" class="form-control" value="@if(!empty($main->meta_key)){!! $main->meta_key !!}@endif" />
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="meta_desk">Meta описание :</label>
                                                                                    <input id="meta_desk" name="meta_description" type="text" placeholder="Meta Description" class="form-control" value="@if(!empty($main->meta_description)){!! $main->meta_description !!}@endif" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="tabs-container">
                                                                        <div class="tab-content">
                                                                            <div class="panel-body">

                                                                                <div class="row">
                                                                                    <div class="col-md-12 form-group">
                                                                                        <label for="title_1">Заголовок:</label>
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               name="title_1"
                                                                                               value="@if(!empty($main->title_1)){!! $main->title_1 !!}@endif"
                                                                                               id="title_1">
                                                                                    </div>
                                                                                    <div class="col-md-12 form-group">
                                                                                        <label for="desc_1">Описание:</label>
                                                                                        <textarea
                                                                                                id="desc_1"
                                                                                                cols="30"
                                                                                                rows="10"
                                                                                                class="form-control"
                                                                                                name="desc_1">@if(!empty($main->desc_1)){!! $main->desc_1 !!}@endif</textarea>
                                                                                    </div>
                                                                                    <div class="col-md-12 form-group">
                                                                                        <label for="desc_2">Описание:</label>
                                                                                        <textarea
                                                                                                id="desc_2"
                                                                                                cols="30"
                                                                                                rows="10"
                                                                                                class="form-control"
                                                                                                name="desc_2">@if(!empty($main->desc_2)){!! $main->desc_2 !!}@endif</textarea>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion"
                                             href="tabs_panels.html#collapseTwo" style="cursor:pointer;">
                                            <h5 class="panel-title">
                                                <a>Блок 1</a>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="row animated fadeInRight">
                                                    <div class="col-md-12">
                                                        <div class="ibox float-e-margins">
                                                            <div>
                                                                <div class="col-lg-6">
                                                                    <div class="imgElement">
                                                                        <div class="prImg">
                                                                            <input type="hidden"
                                                                                   name="link[]"
                                                                                   value="@if(!empty($images[3]->link)){!! url($images[3]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                            <img src="@if(!empty($images[3]->link)){!! url($images[3]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                 style="margin: 0 auto; cursor: pointer"
                                                                                 class="img-responsive lfm "
                                                                                 alt="">
                                                                            <i class="fa fa-times closeImg delete"
                                                                               aria-hidden="true"></i>
                                                                            <label for="">Alt:</label>
                                                                            <input type="text" name="alt[]"
                                                                                   class="form-control"
                                                                                   value="@if(!empty($images[3]->alt)){!! $images[3]->alt !!}@endif">
                                                                        </div>
                                                                    </div>
                                                                    <div class="imgElement">
                                                                        <div class="prImg">
                                                                            <input type="hidden"
                                                                                   name="link[]"
                                                                                   value="@if(!empty($images[4]->link)){!! url($images[4]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                            <img src="@if(!empty($images[4]->link)){!! url($images[4]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                 style="margin: 0 auto; cursor: pointer"
                                                                                 class="img-responsive lfm "
                                                                                 alt="">
                                                                            <i class="fa fa-times closeImg delete"
                                                                               aria-hidden="true"></i>
                                                                            <label for="">Alt:</label>
                                                                            <input type="text" name="alt[]"
                                                                                   class="form-control"
                                                                                   value="@if(!empty($images[4]->alt)){!! $images[4]->alt !!}@endif">
                                                                        </div>
                                                                    </div>
                                                                    <div class="imgElement">
                                                                        <div class="prImg">
                                                                            <input type="hidden"
                                                                                   name="link[]"
                                                                                   value="@if(!empty($images[5]->link)){!! url($images[5]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                            <img src="@if(!empty($images[5]->link)){!! url($images[5]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                 style="margin: 0 auto; cursor: pointer"
                                                                                 class="img-responsive lfm "
                                                                                 alt="">
                                                                            <i class="fa fa-times closeImg delete"
                                                                               aria-hidden="true"></i>
                                                                            <label for="">Alt:</label>
                                                                            <input type="text" name="alt[]"
                                                                                   class="form-control"
                                                                                   value="@if(!empty($images[5]->alt)){!! $images[5]->alt !!}@endif">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="tabs-container">
                                                                        <div class="tab-content">
                                                                            <div class="panel-body">
                                                                                <div class="ibox float-e-margins">
                                                                                    <div class="ibox-content profile-content">
                                                                                        <div class="user-button">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12 form-group">
                                                                                                    <label for="title_2">Заголовок:</label>
                                                                                                    <input type="text"
                                                                                                           class="form-control"
                                                                                                           name="title_2"
                                                                                                           value="@if(!empty($main->title_2)){!! $main->title_2 !!}@endif"
                                                                                                           id="title_3">
                                                                                                </div>
                                                                                                <div class="col-md-12 form-group">
                                                                                                    <label for="desc_3">Описание:</label>
                                                                                                    <textarea
                                                                                                            id="desc_3"
                                                                                                            cols="30"
                                                                                                            rows="10"
                                                                                                            class="form-control"
                                                                                                            name="desc_3">@if(!empty($main->desc_3)){!! $main->desc_3 !!}@endif</textarea>
                                                                                                </div>
                                                                                                <div class="col-md-12 form-group">
                                                                                                    <label for="desc_4">Описание:</label>
                                                                                                    <textarea
                                                                                                            id="desc_4"
                                                                                                            cols="30"
                                                                                                            rows="10"
                                                                                                            class="form-control"
                                                                                                            name="desc_4">@if(!empty($main->desc_4)){!! $main->desc_4 !!}@endif</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion"
                                             href="tabs_panels.html#collapseThree" style="cursor:pointer;">
                                            <h4 class="panel-title">
                                                <a>Блок 2</a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="row animated fadeInRight">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="imgElement">
                                                                    <div class="prImg">
                                                                        <input type="hidden"
                                                                               name="link[]"
                                                                               value="@if(!empty($images[6]->link)){!! url($images[6]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                        <img src="@if(!empty($images[6]->link)){!! url($images[6]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                             style="margin: 0 auto; cursor: pointer"
                                                                             class="img-responsive lfm "
                                                                             alt="">
                                                                        <i class="fa fa-times closeImg delete"
                                                                           aria-hidden="true"></i>
                                                                        <label for="">Alt:</label>
                                                                        <input type="text"
                                                                               name="alt[]"
                                                                               class="form-control"
                                                                               value="@if(!empty($images[6]->alt)){!! $images[6]->alt !!}@endif">
                                                                    </div>
                                                                </div>
                                                                <div class="imgElement">
                                                                    <div class="prImg">
                                                                        <input type="hidden"
                                                                               name="link[]"
                                                                               value="@if(!empty($images[7]->link)){!! url($images[7]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                        <img src="@if(!empty($images[7]->link)){!! url($images[7]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                             style="margin: 0 auto; cursor: pointer"
                                                                             class="img-responsive lfm "
                                                                             alt="">
                                                                        <i class="fa fa-times closeImg delete"
                                                                           aria-hidden="true"></i>
                                                                        <label for="">Alt:</label>
                                                                        <input type="text"
                                                                               name="alt[]"
                                                                               class="form-control"
                                                                               value="@if(!empty($images[7]->alt)){!! $images[7]->alt !!}@endif">
                                                                    </div>
                                                                </div>
                                                                <div class="imgElement">
                                                                    <div class="prImg">
                                                                        <input type="hidden"
                                                                               name="link[]"
                                                                               value="@if(!empty($images[8]->link)){!! url($images[8]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                        <img src="@if(!empty($images[8]->link)){!! url($images[8]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                             style="margin: 0 auto; cursor: pointer"
                                                                             class="img-responsive lfm "
                                                                             alt="">
                                                                        <i class="fa fa-times closeImg delete"
                                                                           aria-hidden="true"></i>
                                                                        <label for="">Alt:</label>
                                                                        <input type="text"
                                                                               name="alt[]"
                                                                               class="form-control"
                                                                               value="@if(!empty($images[8]->alt)){!! $images[8]->alt !!}@endif">
                                                                    </div>
                                                                </div>
                                                                <div class="imgElement">
                                                                    <div class="prImg">
                                                                        <input type="hidden"
                                                                               name="link[]"
                                                                               value="@if(!empty($images[9]->link)){!! url($images[9]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                        <img src="@if(!empty($images[9]->link)){!! url($images[9]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                             style="margin: 0 auto; cursor: pointer"
                                                                             class="img-responsive lfm "
                                                                             alt="">
                                                                        <i class="fa fa-times closeImg delete"
                                                                           aria-hidden="true"></i>
                                                                        <label for="">Alt:</label>
                                                                        <input type="text"
                                                                               name="alt[]"
                                                                               class="form-control"
                                                                               value="@if(!empty($images[9]->alt)){!! $images[9]->alt !!}@endif">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="tabs-container">
                                                                    <div class="tab-content">
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12 form-group">
                                                                                    <label for="title_3">Заголовок:</label>
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           name="title_3"
                                                                                           value="@if(!empty($main->title_3)){!! $main->title_3 !!}@endif"
                                                                                           id="title_3">
                                                                                </div>
                                                                                <div class="col-md-12 form-group">
                                                                                    <label for="desc_5">Описание:</label>
                                                                                    <textarea
                                                                                            id="desc_5"
                                                                                            cols="30"
                                                                                            rows="10"
                                                                                            class="form-control"
                                                                                            name="desc_5">@if(!empty($main->desc_5)){!! $main->desc_5 !!}@endif</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" data-toggle="collapse" data-parent="#accordion"
                                             href="tabs_panels.html#collapseFour" style="cursor:pointer;">
                                            <h4 class="panel-title">
                                                <a>Блок 3</a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="row animated fadeInRight">
                                                    <div class="col-md-12">
                                                        <div class="ibox float-e-margins">
                                                            <div>
                                                                <div class="ibox-content profile-content">
                                                                    <div class="user-button">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="imgElement">
                                                                                    <div class="prImg">
                                                                                        <input type="hidden"
                                                                                               name="link[]"
                                                                                               value="@if(!empty($images[10]->link)){!! url($images[10]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                                        <img src="@if(!empty($images[10]->link)){!! url($images[10]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                             style="margin: 0 auto; cursor: pointer"
                                                                                             class="img-responsive lfm "
                                                                                             alt="">
                                                                                        <i class="fa fa-times closeImg delete"
                                                                                           aria-hidden="true"></i>
                                                                                        <label for="">Alt:</label>
                                                                                        <input type="text" name="alt[]"
                                                                                               class="form-control"
                                                                                               value="@if(!empty($images[10]->alt)){!! $images[10]->alt !!}@endif">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="imgElement">
                                                                                    <div class="prImg">
                                                                                        <input type="hidden"
                                                                                               name="link[]"
                                                                                               value="@if(!empty($images[11]->link)){!! url($images[11]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                                        <img src="@if(!empty($images[11]->link)){!! url($images[11]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                             style="margin: 0 auto; cursor: pointer"
                                                                                             class="img-responsive lfm "
                                                                                             alt="">
                                                                                        <i class="fa fa-times closeImg delete"
                                                                                           aria-hidden="true"></i>
                                                                                        <label for="">Alt:</label>
                                                                                        <input type="text" name="alt[]"
                                                                                               class="form-control"
                                                                                               value="@if(!empty($images[11]->alt)){!! $images[11]->alt !!}@endif">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="imgElement">
                                                                                    <div class="prImg">
                                                                                        <input type="hidden"
                                                                                               name="link[]"
                                                                                               value="@if(!empty($images[12]->link)){!! url($images[12]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif">
                                                                                        <img src="@if(!empty($images[12]->link)){!! url($images[12]->link) !!}@else{!! url('images/no_uploaded.png') !!}@endif"
                                                                                             style="margin: 0 auto; cursor: pointer"
                                                                                             class="img-responsive lfm "
                                                                                             alt="">
                                                                                        <i class="fa fa-times closeImg delete"
                                                                                           aria-hidden="true"></i>
                                                                                        <label for="">Alt:</label>
                                                                                        <input type="text" name="alt[]"
                                                                                               class="form-control"
                                                                                               value="@if(!empty($images[12]->alt)){!! $images[12]->alt !!}@endif">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="tabs-container">
                                                                                    <div class="tab-content">
                                                                                        <div class="panel-body">
                                                                                            <div class="ibox float-e-margins">
                                                                                                <div class="ibox-content profile-content">
                                                                                                    <div class="user-button">
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12 form-group">
                                                                                                                <label for="title_4">Заголовок:</label>
                                                                                                                <input type="text"
                                                                                                                       class="form-control"
                                                                                                                       name="title_4"
                                                                                                                       value="@if(!empty($main->title_4)){!! $main->title_4 !!}@endif"
                                                                                                                       id="title_3">
                                                                                                            </div>
                                                                                                            <div class="col-md-12 form-group">
                                                                                                                <label for="desc_6">Описание:</label>
                                                                                                                <textarea
                                                                                                                        id="desc_6"
                                                                                                                        cols="30"
                                                                                                                        rows="10"
                                                                                                                        class="form-control"
                                                                                                                        name="desc_6">@if(!empty($main->desc_6)){!! $main->desc_6 !!}@endif</textarea>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm btn-block"> Сохранить
                </button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{!! asset('assets/admin/js/plugins/jasny/jasny-bootstrap.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/editor/ckeditor.js') !!}"></script>

    <script src="{!! asset('vendor/laravel-filemanager/js/lfm.js')!!}"></script>
    <script>

        $(document).ready(function () {
            CKEDITOR.replace('desc_1');
            CKEDITOR.replace('desc_2');
            CKEDITOR.replace('desc_3');
            CKEDITOR.replace('desc_4');
            CKEDITOR.replace('desc_5');
            CKEDITOR.replace('desc_6');
        });
        $('.lfm').on('click', function () {
            element = $(this);
        });


        $('.lfm').filemanager('image');
        var lfm = function (options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };


        lfm({type: 'image', prefix: 'prefix'}, function (url, path) {
            element.parent().find('i').show();
            element.parent().find('img').attr('src', url);
            element.parent().find("input[type=hidden]").val(url);
        });
        $('.delete').on('click', function () {
            $(this).hide();
            $(this).parent().find('img').attr('src', '{!! url('images/no_uploaded.png') !!}');
            $(this).parent().find("input[type=hidden]").val('{!! url('images/no_uploaded.png') !!}');
        })
    </script>
@stop