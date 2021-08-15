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
                            <h3 class="box-title">List</h3>
                        </div>

                        <div class="box-body">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm" onClick="refreshPage()">
                                    <i class="fa fa-refresh"></i> Refresh
                                </button>
                            </div>
                        </div>

                        <div class="box-body">
                            <table class="table table-hover scroll-table-full">
                                <thead>
                                <tr>
                                     <th>Order No.</th>
                                     <th>Method</th>
                                     <th>Subtotal</th>
                                     <th>Shiping</th>
                                     <th>Discount</th>
                                     <th>Amount</th>
                                     <th>Status</th>
                                     <th>Address</th>
                                     <th width="290px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr class="clickable-row" data-href='/admin/orders/items/show/{{$order->id}}' style="cursor: pointer;">
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>{{ $order->subtotal }}</td>
                                        <td>{{ $order->ship_charge }}<!-- @if($order->status == 0)<p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>@else<p class="avaibility"><i class="fa fa-circle" style="color: red;"></i> Out of Stock</p>@endif --></td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->net_amount }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <div>{{ $order->userAddress }}</div>
                                            <div>({{ $order->userCity }})</div>
                                          </td>
                                        <td>
                                    @if($order->status != 'Cancel') 
                                        @if($order->status == 'Pending' || $order->status == 'Process')   
                                        <a href="/admin/orders/accept/{{ $order->id }}"><button class="btn btn-success">Accept</button></a>
                                        <a href="/admin/orders/reject/{{ $order->id }}"><button class="btn btn-danger on-mob-table-btn">Reject</button></a>
                                        @endif
                                        @if($order->status == 'Accept')
                                        <a href="/admin/orders/dispatch/{{ $order->id }}"><button type="button" class="btn btn-info">Dispatch</button>
                                        @endif
                                        @if($order->status == 'Dispatch') 
                                        <!-- <a href="/admin/orders/track/{{ $order->id }}"><button class="btn btn-info">Track</button></a> -->
                                        <a href="/admin/orders/complete/{{ $order->id }}"><button class="btn btn-success">Complete</button></a>
                                        @endif
                                        @if($order->status == 'Complete') 
                                        <a href="#"><button class="btn btn-success">Close</button></a>
                                        @endif
                                    @endif
                                    @if($order->status == 'Cancel')
                                    <a href="#"><button class="btn btn-danger disabled">Cancel</button></a>
                                    @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $orders->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

<script src="/jquery/jquery-3.2.1.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $(".clickable-row").click(function(e) {
          if(e.target.tagName != 'BUTTON'){
                window.location = $(this).data("href");
            }
        });
    });
</script>
@endsection