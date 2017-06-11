@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{!! asset('css/main_style.css') !!}">

    @stop
@section('content')
    @include('front.products.navbar')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="lead">Shop</h2>
                <a href="/" class="lead btn btn-success" style="width:  100%">All products</a>
                <hr>
                <!-- Кнопки, объединенные в группу с помощью класса .btn-group -->
                    <div class="btn-group-vertical form-group" style="width: 100%">
                        <!-- Обычные кнопки -->
                        @foreach($categories as $item)
                            @if($item->isRoot() && $item->isLeaf())
                                <a href="{{ route('products.index' , ['category' => request('category') , 'sort' => request('sort'), 'min' => request('min'), 'max' => request('max'), 'category' => $item->id]) }}" class="btn btn-warning form-control">{{$item->descriptions->category}}<span class="pull-right">{!! $item->products->count() !!}</span></a>
                            @endif
                        <!-- Кнопка с выпадающим меню -->
                            @if($item->isRoot() && !$item->isLeaf())
                                <div class="btn-group">
                                    <a href="products/?category={{ $item->id }}" data-toggle="dropdown" class="btn btn-info dropdown-toggle">
                                        {{$item->descriptions->category}}
                                        <span class="pull-right">{!! $item->products->count() !!}</span>
                                        <span class="caret"></span>
                                    </a>
                                    <!-- Выпадающее меню -->
                                    <ul class="dropdown-menu">
                                    @foreach($item->children as $child)
                                        <!-- Пункты меню -->
                                            <li><a href="products/?category={{ $item->id }}">{!! $child->descriptions->category !!}</a></li>

                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endforeach
                    </div>

                <div class="form-group">
                    <a href="{{ route('products.index' , ['category' => request('category') ,'min' => request('min'), 'max' => request('max'),'sort' => 'asc']) }}" class="label label-primary">Ascending</a>
                    <a href="{{ route('products.index' , ['category' => request('category') , 'min' => request('min'), 'max' => request('max'),'sort' => 'desc']) }}" class="label label-danger">Descending</a>
                </div>
                <hr>
                <form action="{{ route('products.index' , ['category' => request('category')]) }}" method="get">
                    <div class="form-group">
                        <label for="minPrice">Min price : </label>
                        <input type="number" name="min" value="@if(request()->has('min')){{ request('min') }}@endif" id="minPrice" class="form-control" required >
                    </div>
                    <div class="form-group">
                        <label for="maxPrice">Max price : </label>
                        <input type="number" name="max" value="@if(request()->has('max')){{ request('max') }}@endif" id="maxPrice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success from-control">filter</button>
                    </div>
                    @if(request()->has('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                        @endif
                    @if(request()->has('sort'))
                        <input type="hidden" name="sort" value="{{request('sort')}}">
                        @endif
                </form>
            </div>
            <div class="col-md-9">
                <div class="row" style="min-height: 600px">
                    <div class="container">
                        <div class="pricing-table pricing-three-column row">
                            @foreach($products as $product)
                                <div class="plan col-sm-4 col-lg-4" style=" max-height: 380px;  height: 380px;">
                                    <a href="{!! url('product') .'/'. $product->id !!}">
                                        <div class="plan-name-bronze" style="background-image: url(@if($product->image) {!! $product->image !!} @endif ); background-size: cover; object-fit: cover; min-height: 50px; height: 50%;" >
                                            <span> {!! $product->created_at !!}</span>
                                        </div>
                                    </a>
                                    <ul>
                                        <li class="plan-feature">{!! $product->name !!}</li>
                                        <li class="plan-feature">Price : {!! $product->price !!}</li>
                                        @if(!empty($product->options->storage))
                                        <li class="plan-feature">{!! $product->options->storage !!} mb Disk Space</li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>
    </div>
@endsection