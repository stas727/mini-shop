@extends('layouts.admin')
@section('content')
    @include('admin.includes.messages')
    <div class="container">
        <div class="col-lg-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> Info
                </div>
                <div class="panel-body">
                    <p>Parse http://planeta.kh.ua</p>
                </div>

            </div>
            <h1>Categories</h1>
            <form action="{!! url(config('const.ADMIN_URL') . '/parser/category') !!}">
                <select name="category" id="" class="form-control m-b">
                    @if(!empty($brands))
                        @foreach($brands as $category)
                            <option value="{!! $category[1] !!}">{!! $category[1] !!}</option>
                        @endforeach
                    @endif
                </select>
                <button type="submit" class="btn btn-success form-control">Get</button>
            </form>
        </div>
    </div>
@endsection