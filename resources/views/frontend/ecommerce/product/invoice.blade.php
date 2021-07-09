@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Invoice</h2>
    </div>
</section>

<!-- Checkout Section Begin -->

<section class="checkout-sec padding-70">
    <div class="container">
        <div class="row">

            <div class="checkout-tab-main">

                <div class="col-xs-12 col-sm-12 col-md-8">
                    <div class="form-sec-checkout">
                        <div class="checkout-heading">
                            <h3>Invoice</h3>
                        </div>
                        <div class="form-tab ">

                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="checkoutSec">
                        <div class="checkoutBox">
                            <div class="checkoutHead">
                                <h3>your order</h3>
                            </div>

                            <div class="chk-one">
                                <div class="checkoutBody">
                                    <ul class="list-unstyled">
                                        <?php $sum = 0; ?>
                                        @foreach($order->items as $item)
                                        <li>{{$item->product->name}} x {{$item->qty}} <span class="pull-right">${{$item->rowtotal}}</span></li>
                                        <?php $sum += $item->rowtotal; ?>
                                        @endforeach
                                        <!-- <li>Shipping <span class="pull-right">Free Shipping</span></li> -->
                                        <li>Order Total <span class="pull-right">${{$sum}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection