@extends('layouts.admin')
@section('css')

    <link href="{!! asset('assets/admin/css/plugins/summernote/summernote.css') !!}" rel="stylesheet">
    <link href="{!! asset('assets/admin/css/plugins/summernote/summernote-bs3.css') !!}" rel="stylesheet">

    <link href="{!! asset('assets/admin/css/plugins/datapicker/datepicker3.css') !!}" rel="stylesheet">
@stop
@section('content')
    @include('admin.includes.messages')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">

        <div class="row">
            <div class="col-lg-12">
                <div class="tabs-container">
                    <div class="tab-content">
                        <form action="{!! url(\Illuminate\Support\Facades\Config::get('const.ADMIN_URL')) . '/product/save' !!}" method="POST" enctype="multipart/form-data">
                            @if(!empty($product->id))
                                <input type="hidden" name="id" value="{!! $product->id !!}">
                            @endif
                            {!! csrf_field() !!}
                            <div class="panel-body">

                                <fieldset class="form-horizontal">
                                    <div class="form-group"><label class="col-sm-2 control-label">Name:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" name="name" placeholder="Product name" value="@if(!empty(old('name'))){!! old('name') !!}@else @if(!empty($product->name)){!! $product->name !!}@endif @endif"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Price:</label>
                                        <div class="col-sm-10"><input type="text" class="form-control" name="price" placeholder="160.00" value="@if(!empty(old('price'))){!! old('price') !!}@else @if(!empty($product->price)){!! $product->price !!}@endif @endif"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Description:</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" id="description" cols="30" rows="10">@if(old('description')){!! old('description') !!}@else @if(!empty($product->description)){!! $product->description !!}@endif @endif</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Operation System:</label>
                                        <div class="col-sm-10">
                                        <select class="form-control" name="operation_system">
                                            <option value="ios">Ios</option>
                                            <option value="Android">Android</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Storage:</label>
                                        <div class="col-sm-10"><input type="text" name="storage" class="form-control" placeholder="storage" value="@if(old('storage')){!! old('storage') !!}@else @if(!empty($product->options->storage)){!! $product->options->storage !!}@endif @endif"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Ram:</label>
                                        <div class="col-sm-10"><input type="text" name="ram" class="form-control" placeholder="ram" value="@if(old('ram')){!! old('ram') !!}@else @if(!empty($product->options->ram)){!! $product->options->ram !!}@endif @endif"></div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Category:</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="category_id">
                                                @if(!empty($categories))
                                                    @foreach($categories as $category)
                                                <option value="{!! $category->id !!}">{!! $category->descriptions->category !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                        <button type="submit" class="btn btn-success form-control">save</button>


                                </fieldset>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{!! asset('assets/admin/js/plugins/summernote/summernote.min.js') !!}"></script>
    <script src="{!! asset('assets/admin/editor/ckeditor.js') !!}"></script>
    <!-- Data picker -->
    <script src="{!! asset('assets/admin/js/plugins/datapicker/bootstrap-datepicker.js') !!}"></script>

    <script>
        $(document).ready(function(){
            CKEDITOR.replace( 'description' );
            $('.summernote').summernote();

            $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });
    </script>
@stop