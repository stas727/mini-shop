@extends('layouts.app')
@section('css')
    <style>
        /*********************************************
    			Call Bootstrap
*********************************************/

        @import url("bootstrap-override.css");
        @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");

        /*********************************************
                        Theme Elements
        *********************************************/

        .gold {
            color: #FFBF00;
        }

        /*********************************************
                            PRODUCTS
        *********************************************/

        .product {
            border: 1px solid #dddddd;
            height: 321px;
        }

        .product > img {
            max-width: 230px;
        }

        .product-rating {
            font-size: 20px;
            margin-bottom: 25px;
        }

        .product-title {
            font-size: 20px;
        }

        .product-desc {
            font-size: 14px;
        }

        .product-price {
            font-size: 22px;
        }

        .product-stock {
            color: #74DF00;
            font-size: 20px;
            margin-top: 10px;
        }

        .product-info {
            margin-top: 50px;
        }

        /*********************************************
                            VIEW
        *********************************************/

        .content-wrapper {
            max-width: 1140px;
            background: #fff;
            margin: 0 auto;
            margin-top: 25px;
            margin-bottom: 10px;
            border: 0px;
            border-radius: 0px;
        }

        .container-fluid {
            max-width: 1140px;
            margin: 0 auto;
        }

        .view-wrapper {
            float: right;
            max-width: 70%;
            margin-top: 25px;
        }

        .container {
            padding-left: 0px;
            padding-right: 0px;
            max-width: 100%;
        }

        /*********************************************
                        ITEM
        *********************************************/

        .service1-items {
            padding: 0px 0 0px 0;
            float: left;
            position: relative;
            overflow: hidden;
            max-width: 100%;
            height: 321px;
            width: 130px;
        }

        .service1-item {
            height: 107px;
            width: 120px;
            display: block;
            float: left;
            position: relative;
            padding-right: 20px;
            border-right: 1px solid #DDD;
            border-top: 1px solid #DDD;
            border-bottom: 1px solid #DDD;
        }

        .service1-item > img {
            max-height: 110px;
            max-width: 110px;
            opacity: 0.6;
            transition: all .2s ease-in;
            -o-transition: all .2s ease-in;
            -moz-transition: all .2s ease-in;
            -webkit-transition: all .2s ease-in;
        }

        .service1-item > img:hover {
            cursor: pointer;
            opacity: 1;
        }

        .service-image-left {
            padding-right: 50px;
        }

        .service-image-right {
            padding-left: 50px;
        }

        .service-image-left > center > img, .service-image-right > center > img {
            max-height: 155px;
        }

    </style>
    <style>
        body {
            padding-top: 20px
        }

        .pricing-table .plan {
            margin-left: 0px;
            border-radius: 5px;
            text-align: center;
            background-color: #f3f3f3;
            -moz-box-shadow: 0 0 6px 2px #b0b2ab;
            -webkit-box-shadow: 0 0 6px 2px #b0b2ab;
            box-shadow: 0 0 6px 2px #b0b2ab;
        }

        .plan:hover {
            background-color: #fff;
            -moz-box-shadow: 0 0 12px 3px #b0b2ab;
            -webkit-box-shadow: 0 0 12px 3px #b0b2ab;
            box-shadow: 0 0 12px 3px #b0b2ab;
        }

        .plan {
            padding: 20px;
            margin-left: 0px;
            color: #ff;
            background-color: #5e5f59;
            -moz-border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }

        .plan-name-bronze {
            padding: 20px;
            color: #fff;
            background-color: #665D1E;
            -moz-border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }

        .plan-name-silver {
            padding: 20px;
            color: #fff;
            background-color: #C0C0C0;
            -moz-border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }

        .plan-name-gold {
            padding: 20px;
            color: #fff;
            background-color: #FFD700;
            -moz-border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }

        .pricing-table-bronze {
            padding: 20px;
            color: #fff;
            background-color: #f89406;
            -moz-border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            border-radius: 5px 5px 0 0;
        }

        .pricing-table .plan .plan-name span {
            font-size: 20px;

        }

        .pricing-table .plan ul {
            list-style: none;
            margin: 0;
            -moz-border-radius: 0 0 5px 5px;
            -webkit-border-radius: 0 0 5px 5px;
            border-radius: 0 0 5px 5px;
        }

        .pricing-table .plan ul li.plan-feature {
            padding: 15px 10px;
            border-top: 1px solid #c5c8c0;
            margin-right: 35px;
        }

        .pricing-three-column {
            margin: 0 auto;
            width: 80%;
        }

        .pricing-variable-height .plan {
            float: none;
            margin-left: 2%;
            vertical-align: bottom;
            display: inline-block;
            zoom: 1;
            *display: inline;
        }

        .plan-mouseover .plan-name {
            background-color: #4e9a06 !important;
        }

        .btn-plan-select {
            padding: 8px 25px;
            font-size: 18px;
        }
    </style>
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
                            <a href="{{ route('products.index' , ['category' => request('category') , 'sort' => request('sort'), 'min' => request('min'), 'max' => request('max'), 'category' => $item->id]) }}"
                               class="btn btn-warning form-control">{{$item->descriptions->category}}<span
                                        class="pull-right">{!! $item->products->count() !!}</span></a>

                        @endif
                    <!-- Кнопка с выпадающим меню -->
                        @if($item->isRoot() && !$item->isLeaf())
                            <div class="btn-group">
                                <a href="products/?category={{ $item->id }}" data-toggle="dropdown"
                                   class="btn btn-info dropdown-toggle">
                                    {{$item->descriptions->category}}
                                    <span class="pull-right">{!! $item->products->count() !!}</span>
                                    <span class="caret"></span>
                                </a>
                                <!-- Выпадающее меню -->
                                <ul class="dropdown-menu">
                                @foreach($item->children as $child)
                                    <!-- Пункты меню -->
                                        <li>
                                            <a href="products/?category={{ $item->id }}">{!! $child->descriptions->category !!}</a>
                                        </li>

                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @endforeach

                </div>


                {{-- <nav class="navbar navbar-inverse">
                     <div class="container-fluid">

                         <ul class="nav navbar-nav">
                             @foreach($categories as $item)
                                 <li @if($item->isRoot())class="dropdown"@endif>
                                     @if(!$item->isLeaf())
                                         <a @if($item->isRoot()) class="dropdown-toggle"
                                            @endif href="/store/categories/{{ $item->id }}">
                                             {{ $item->descriptions->category }}
                                             @if($item->isRoot()) <span class="caret"></span> @endif
                                         </a>
                                     @else
                                         <a href="products/?category={{ $item->id }}">{{$item->descriptions->category}}</a>
                                     @endif
                                     @if($item->isRoot() && !$item->isLeaf())
                                         <ul class="dropdown-menu">
                                             @foreach($item->children as $child)
                                                 <li>
                                                     <a href="">{{$child->descriptions->category}}</a>
                                                 </li>
                                             @endforeach
                                         </ul>
                                     @endif
                                 </li>
                             @endforeach
                         </ul>
                         </div>

                 </nav>--}}
                <div class="form-group">
                    <a href="{{ route('products.index' , ['category' => request('category') ,'min' => request('min'), 'max' => request('max'),'sort' => 'asc']) }}"
                       class="label label-primary">Ascending</a>
                    <a href="{{ route('products.index' , ['category' => request('category') , 'min' => request('min'), 'max' => request('max'),'sort' => 'desc']) }}"
                       class="label label-danger">Descending</a>
                </div>
                <hr>
                <form action="{{ route('products.index' , ['category' => request('category')]) }}" method="get">
                    <div class="form-group">
                        <label for="minPrice">Min price : </label>
                        <input type="number" name="min" value="@if(request()->has('min')){{ request('min') }}@endif"
                               id="minPrice" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="maxPrice">Max price : </label>
                        <input type="number" name="max" value="@if(request()->has('max')){{ request('max') }}@endif"
                               id="maxPrice" class="form-control" required>
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

                    <div class="content-wrapper">
                        <div class="item-container">
                            <div class="container">

                                <div class="product col-md-3 service-image-left">

                                    <img id="item-display" src="@if($product->image) {!! $product->image !!} @endif"
                                         alt=""></img>

                                </div>


                                <div class="col-md-7">
                                    <div class="product-title">@if($product->name) {!! $product->name !!} @endif</div>
                                    <div class="product-desc">The Corsair Gaming Series GS600 is the ideal
                                        price/performance choice for mid-spec gaming PC
                                    </div>
                                    <div class="product-rating"><i class="fa fa-star gold"></i> <i
                                                class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i
                                                class="fa fa-star gold"></i> <i class="fa fa-star-o"></i></div>
                                    <hr>
                                    <div class="product-price">@if($product->price) {!! $product->price !!} @endif</div>
                                    <div class="product-stock">In Stock</div>
                                    <hr>
                                    <div class="btn-group cart">
                                        <button type="button" class="btn btn-success">
                                            Add to cart
                                        </button>
                                    </div>
                                    <div class="btn-group wishlist">
                                        <button type="button" class="btn btn-danger">
                                            Add to wishlist
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="col-md-12 product-info">
                                <ul id="myTab" class="nav nav-tabs nav_tabs">

                                    <li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>
                                    <li><a href="#service-two" data-toggle="tab">PRODUCT INFO</a></li>
                                    <li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="service-one">

                                        <section class="container product-info">
                                            @if($product->description) {!! $product->description !!} @endif
                                        </section>

                                    </div>
                                    <div class="tab-pane fade" id="service-two">

                                        <section class="container product-info">
                                            @if($product->description) {!! $product->description !!} @endif
                                        </section>

                                    </div>
                                    <div class="tab-pane fade" id="service-three">
                                        <section class="container product-info">
                                            @if($product->description) {!! $product->description !!} @endif
                                        </section>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center">

                </div>
                <h2>Похожие товары :</h2>
                <div class="container">

                    <div class="pricing-table pricing-three-column row">
                        @if(!empty($products))
                            @foreach($products as $product)
                                <div class="plan col-sm-4 col-lg-4" style=" max-height: 380px;  height: 380px;">
                                    <a href="{!! url('product') .'/'. $product->id !!}">
                                        <div class="plan-name-bronze"
                                             style="background-image: url(@if($product->image) {!! $product->image !!} @endif ); background-size: cover; object-fit: cover; min-height: 50px; height: 50%;">
                                            <span> {!! $product->created_at !!}</span>
                                        </div>
                                    </a>
                                    <ul>
                                        <li class="plan-feature">{!! $product->name !!}</li>
                                        <li class="plan-feature">Price : {!! $product->price !!}</li>
                                        @if(!empty($product->options->storage))
                                            <li class="plan-feature">{!! $product->options->storage !!} mb Disk Space
                                            </li>
                                        @endif
                                        {{--<li class="plan-feature"><a href="{!! url('product') .'/'. $product->id !!}" class="btn btn-primary btn-plan-select"><i class="icon-white icon-ok"></i> Select</a></li>--}}
                                    </ul>
                                </div>
                            @endforeach
                        @endif
                    </div>
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
@section('scripts')

@stop