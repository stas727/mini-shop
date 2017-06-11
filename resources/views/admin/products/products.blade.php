@extends('layouts.admin')
@section('css')
    <link href="{!! asset('assets/admin/css/plugins/footable/footable.core.css') !!}" rel="stylesheet">
@stop
@section('content')
    @include('admin.includes.messages')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Simple FooTable with pagination, sorting and filter</h5>
                </div>
                <div class="ibox-content">
                    <div class="col-lg-10">
                        <input type="text" class="form-control input-sm m-b-xs" id="filter"
                               placeholder="Search in table">
                    </div>
                    <div class="col-lg-2">

                        <a href="{!! url(\Illuminate\Support\Facades\Config::get('const.ADMIN_URL') . '/product/create') !!}"
                           class="btn btn-success">Create</a>
                    </div>
                    <table class="footable table table-stripped" data-page-size="8" data-filter=#filter>
                        <thead>
                        <tr>
                            <th data-toggle="true">Product Name</th>
                            <th data-hide="phone">Category</th>
                            <th data-hide="all">Description</th>
                            <th data-hide="phone">Price</th>
                            <th data-hide="phone,tablet">Ram</th>
                            <th data-hide="phone">Storage</th>
                            <th data-hide="phone">Image</th>
                            <th class="text-right" data-sort-ignore="true">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(!empty($products))
                            @foreach($products as $product)
                                <tr class="gradeX">
                                    <td>
                                        {!! $product->name !!}
                                    </td>
                                    <td>
                                        @if(!empty($product->category->descriptions->category))
                                            {!! $product->category->descriptions->category !!}
                                        @endif
                                    </td>
                                    <td>
                                        <?= mb_substr($product->description, 10) ?>
                                    </td>
                                    <td>
                                        {!! $product->price !!}
                                    </td>
                                    <td>
                                        @if(!empty($product->options->ram))
                                            {!! $product->options->ram !!}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($product->options->storage))
                                            {!! $product->options->storage !!}
                                        @endif
                                    </td>
                                    <td>
                                        {!! $product->image !!}
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="id" value="{!! $product->id !!}">
                                            <a class="btn-white btn btn-xs delete">Delete</a>
                                            <a class="btn-white btn btn-xs"
                                               href="{!! url(\Illuminate\Support\Facades\Config::get('const.ADMIN_URL') . '/product/edit') . '/' . $product->id !!}">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="5">
                                <ul class="pagination pull-right" style="display: none"></ul>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {!! $products->links() !!}
@endsection
@section('scripts')
    <script src="{!! asset('assets/admin/js/plugins/footable/footable.all.min.js') !!}"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function () {

            $('.footable').footable();


            $(".delete").on('click', function () {
                var token, id_product;
                token = $("input[name=_token]").val()
                id_product = $(this).parent().find("input[name=id]").val();
                parent = $(this)
                console.log(parent);
                $.ajax({
                    url: 'product/delete',
                    type: 'POST',
                    data: {id: id_product, _token: token},
                    success: function (data) {
                        parent.closest('tr').remove();
                        parent = '';
                    },
                    error: function (xhr, textStatus) {
                        $('.message').html("<div class='content-message'><i class='fa fa-exclamation-circle fa-4x'></i> <h2>Ошибка удаления</h2> <p>Попробуйте обновить страницу.</p></div>");
                        setTimeout(function () {
                            $('#subcategory').html("");
                        }, 3000);
                    }
                });

            });
        });


    </script>
@stop