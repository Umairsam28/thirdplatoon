@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Check out</h2>
    </div>
</section>

<!-- Checkout Section Begin -->

<section class="checkout-sec padding-70">
  <div class="container">
    <div class="row">
      
      <div class="checkout-tab-main">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form method="POST" action="{{route('placeOrder')}}">
          @csrf
        <div class="col-xs-12 col-sm-12 col-md-8">
          <div class="form-sec-checkout">
            <div class="checkout-heading">
              <h3>Billing Address</h3>
            </div>
            <div class="form-tab ">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3">
                      <label for="">Country <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <input value="{{old('country')}}" type="text" class="form-control" name="country" required />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">First Name <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input value="{{old('first_name')}}" class="form-control" name="first_name" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Last Name <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input value="{{old('last_name')}}" class="form-control" name="last_name" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Company Name </label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input value="{{old('company_name')}}" class="form-control" name="company_name" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Address</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input value="{{old('address')}}" class="form-control" name="address" placeholder="Street Address" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <input value="{{old('address2')}}" class="form-control" name="address2" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Town / City <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input value="{{old('town')}}" class="form-control" name="town" placeholder="Town / City" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Email Address <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input value="{{old('email')}}" class="form-control" name="email" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Phone</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input value="{{old('phone')}}" class="form-control" name="phone" type="text">
                    </div>
                  </div>
                </div>
              
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
                  <?php $sum=0; ?>
                  @foreach($cart as $car)
                    <li>{{$car['product']->name}} x {{$car['qty']}} <span class="pull-right">${{$car['rowtotal']}}</span></li>
                    <?php $sum+=$car['rowtotal']; ?>
                  @endforeach
                  <!-- <li>Shipping <span class="pull-right">Free Shipping</span></li> -->
                  <li>Order Total <span class="pull-right">${{$sum}}</span></li>
                </ul>
                <h3>Payment Method</h3>
              </div>
              <div class="checkoutFoot">
                <div class="web-btn">
                  <button type="submit">PLACE ORDER</button>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Checkout Section End -->

@endsection
