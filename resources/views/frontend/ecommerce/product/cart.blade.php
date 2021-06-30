@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Cart</h2>
    </div>
</section>

<!-- Cart Section Begin -->

<section class="cartsec">
  <div class="container">
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Item</th>
              <th class="text-center">Quantity</th>
              <th>Unit Price</th>
              <th>Sub Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="row">
                  <div class="col-md-4 padd-0"> <img src="images/product-img-01.jpg" alt="" class="img-responsive"> </div>
                  <div class="col-md-8">
                    <h5>Lorem ipsum dolor sit 
                      amet, consectetur.
                    </h5>
                    <h6>50 Reviews</h6>
                    <h6>Delivery Date: Dec 09, 2019</h6>
                  </div>
                </div>
              </td>
              <td class="text-center counter">
                <div class="input-group">
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-number" data-type="minus" data-field="quant[1]"> <i class="fa fa-minus" aira-hidden="true"></i> </button>
                  </span>
                  <input type="text" name="quant[1]" class="form-control input-number" value="01" min="1" max="10" placeholder="hfdsfk">
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-number" data-type="plus" data-field="quant[1]"> <i class="fa fa-plus" aira-hidden="true"></i> </button>
                  </span>
                </div>
                <a href="" class="update">Update Cart</a>
              </td>
              <td>
                <h4>$250</h4>
              </td>
              <td>
                <h4 class="lited">$500</h4>
              </td>
            </tr>
            <tr>
              <td>
                <div class="row">
                  <div class="col-md-4 padd-0"> <img src="images/product-img-06.jpg" alt="" class="img-responsive"> </div>
                  <div class="col-md-8">
                    <h5>Lorem ipsum dolor sit 
                      amet, consectetur.
                    </h5>
                    <h6>50 Reviews</h6>
                    <h6>Delivery Date: Dec 09, 2019</h6>
                  </div>
                </div>
              </td>
              <td class="text-center counter">
                <div class="input-group">
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-number" data-type="minus" data-field="quant[2]"> <i class="fa fa-minus" aira-hidden="true"></i> </button>
                  </span>
                  <input type="text" name="quant[2]" class="form-control input-number" value="01" min="1" max="10" placeholder="hfdsfk">
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-number" data-type="plus" data-field="quant[2]"> <i class="fa fa-plus" aira-hidden="true"></i> </button>
                  </span>
                </div>
                <a href="" class="update">Update Cart</a>
              </td>
              <td>
                <h4>$250</h4>
              </td>
              <td>
                <h4 class="lited">$500</h4>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="checkoutsec">
        <div class="row">
          <div class="col-md-4 text-center centerCol">
            <a href=""><i class="fa fa-angle-left"></i> Continue Shopping</a>
            <button class="btn btn-block">Proceed To Checkout</button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <div class="check-out-detail">
        <h2>Sub Total <span>$76</span></h2>
        <h2>Discount  <span>$10</span></h2>
        <h2>Shipping <span>$15</span></h2>
        <h2 class="price">Total<span class="price">$85.00</span></h2>
      </div>
      <div class="freeshipping">
        <h2>Shipping</h2>
        <span>Courier ($15)</span>
        <h2>Estimate For</h2>
        <span>United Estate,NY,1230</span>
      </div>
    </div>
  </div>
</section>

<!-- Cart Section End -->

@endsection
