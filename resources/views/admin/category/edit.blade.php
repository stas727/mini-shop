@extends('layouts.admin')
@section('css')
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

        .altLight {
            background: rgb(190, 222, 190);
        }
    </style>
    @stop
@section('content')
    @include('Admin.includes.messages')
    <form action="{!! url('admin/category/update') !!}" method="post" class="form-horizontal" enctype="multipart/form-data">
{!! csrf_field() !!}
        <input type="hidden" name="category_id" value="{!! $category_description->id !!}">
        <div class="wrapper wrapper-content animated fadeInRight">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Seo</a></li>
                <li><a data-toggle="tab" href="#menu1">Основное</a></li>
                {{--     <li><a data-toggle="tab" href="#menu2">Теги</a></li>
                     <li><a data-toggle="tab" href="#menu3">Другое</a></li>--}}
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                                    <div class="form-group has-success">
                                        <label for="meta_title" class="col-lg-2 control-label">Title :</label>
                                        <div class="col-lg-10">
                                            <input id="meta_title" name="meta_title" type="text" placeholder="Title"
                                                   class="form-control"
                                                   value="@if(!empty($category_description->meta_title)) {!! $category_description->meta_title !!} @endif"/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group has-success">
                                        <label for="meta_keys" class="col-lg-2 control-label">Meta Keys :</label>
                                        <div class="col-lg-10">
                                            <input id="meta_keys" name="meta_keys" type="text"
                                                   placeholder="Meta keys" class="form-control"
                                                   value="@if(!empty($category_description->meta_keys)) {!! $category_description->meta_keys !!} @endif"/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group has-success">
                                        <label for="meta_description" class="col-lg-2 control-label">Meta Description
                                            :</label>
                                        <div class="col-lg-10">
                                            <input id="meta_description" name="meta_description" type="text"
                                                   placeholder="Meta Description" class="form-control"
                                                   value="@if(!empty($category_description->meta_description)) {!! $category_description->meta_description !!} @endif"/>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group has-success">
                                        <label for="meta_desk" class="col-lg-2 control-label">Url :</label>
                                        <div class="col-lg-10">
                                            <input id="url" name="url" type="text" placeholder="url" class="form-control"
                                                   value="@if(!empty($category_description->url)) {!! $category_description->url !!} @endif"/>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="ibox float-e-margins">
                                <div class="ibox-content">
                                    <div class="form-group text-center prImg"
                                         style="width: 100%;">
                                        <input type="hidden"
                                               name="image"
                                               value="@if(!empty($category_description->image)){!! url($category_description->image) !!}@endif">
                                        <img src="@if(!empty($category_description->image)){!! url($category_description->image) !!}@else {!! url('images/no_uploaded.png') !!} @endif"
                                             style=" margin: 0 auto; cursor: pointer"
                                             class="img-responsive lfm "
                                             alt="">
                                        <i class="fa fa-times closeImg delete"
                                           aria-hidden="true"></i>
                                    </div>

                                    <br>
                                    <div class="form-group has-success">
                                        <label for="meta_title" class="col-lg-2 control-label">Alt :</label>
                                        <input type="text" class="form-control" name="alt"
                                               placeholder="alt для изображения"
                                               value="@if(!empty($category_description->alt)){!! $category_description->alt !!}@endif">
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="category" class="col-lg-2 control-label">Название категории (en):</label>
                                        <input type="text" class="form-control" name="category" id="category"
                                               placeholder="Название категории (en)"
                                               value="@if(!empty($category_description->category)){!! $category_description->category !!}@endif">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-success form-control">Save</button>
    </form>

@endsection
@section('scripts')
    <script src="{!! asset('vendor/laravel-filemanager/js/lfm.js')!!}"></script>
    <script>
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
            console.log(path);
            element.parent().find('i').show();
            element.parent().find('img').attr('src', path);
            element.parent().find("input[type=hidden]").val(path);
        });

        $('.delete').on('click', function () {
            $(this).hide();
            $(this).parent().find('img').attr('src', '{!! url('images/no_uploaded.png') !!}');
            $(this).parent().find("input[name=image]").val('');
        });

    </script>
@stop