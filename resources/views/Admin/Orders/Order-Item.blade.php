@extends('layouts.app')
@section('content')

    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Orders</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Item <span style="float: right;"> <a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger btn-sm">
<span class="fa fa-chevron-left"></span> Back</button></a></span></h3>
                        </div>

                        <div class="box-body">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">
                                    <i class="fa fa-refresh"></i> Refresh
                                </button>
                            </div>
                        </div>

                        <div class="box-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                     <th>Image</th>
                                     <th>Product Name</th>
                                     <th>Description</th>
                                     <th>Price</th>
                                     <th>Qty</th>
                                     <th>Size</th>
                                     <th>Type</th>
                                     <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItem as $item)
                                    <tr>
                                        <td><img src="@if($item->type =='meal'){{ $item->image ? '/images/meals/'.$item->image : '/images/bg/menu_bg.jpg' }}@else{{ $item->image ? '/images/menus/'.$item->image : '/images/bg/menu_bg.jpg' }}@endif" class="productImg"></td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->product_size }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->subtotal }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
                
@endsection