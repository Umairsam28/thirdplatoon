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
        <div class="col-xs-12 col-sm-12 col-md-8">
          <div class="form-sec-checkout">
            <div class="checkout-heading">
              <h3>Billing Address</h3>
            </div>
            <div class="form-tab ">
              <form>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3">
                      <label for="">Country <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <select class="form-control" id="" name="">
                        <option value="">
                          United state of america
                        </option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">First Name <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Last Name <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Company Name <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Address</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input class="form-control" placeholder="Street Address" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <input class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Town / City <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input class="form-control" placeholder="Town / City" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Email Address <span>*</span></label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input class="form-control" type="text">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <label for="">Phone</label>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input class="form-control" type="text">
                    </div>
                  </div>
                </div>
              </form>
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
                  <li>Card Subtotal x 1 <span class="pull-right">$132</span></li>
                  <li>Shipping <span class="pull-right">Free Shipping</span></li>
                  <li>Order Total <span class="pull-right">$123</span></li>
                </ul>
                <h3>Payment Method</h3>
              </div>
              <div class="checkoutFoot">
                <div class="paypal-select">
                  <ul>
                    <li>
                      <input type="radio" id="radio1" name="radio-group" checked="">
                      <label for="radio1"><span> Cheque Payment</span></label>
                    </li>
                    <li>
                      <input type="radio" id="radio2" name="radio-group">
                      <label for="radio2"><span>Paypal <img src="../assets/images/img9.png" class="img-responsive"></span></label>
                    </li>
                  </ul>
                </div>
                <div class="web-btn">
                  <a href="#">PLACE ORDER</a>
                </div>
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