@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Cart</h2>
    </div>
</section>

<!-- Cart Section Begin -->

<section class="cartsec">
  <div id="app" class="container">
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
            <?php $sum=0; ?>
            @foreach($cart as $car)
            <tr>
              <td>
                <div class="row">
                  <div class="col-md-4 padd-0">
                    @if(count($car['product']->images)>0)
                    <img class="img-responsive" src="{{asset('storage/products/'.$car['product']->id.'/'.$car['product']->images[0]->image_path)}}" />
                    @else
                    <img src="assets/images/placeholder.png" class="img-responsive"/>
                    @endif
                  </div>
                  <div class="col-md-8">
                    <h5>{{$car['product']->name}}
                    </h5>
                    <!-- <h6>50 Reviews</h6>
                    <h6>Delivery Date: Dec 09, 2019</h6> -->
                  </div>
                </div>
              </td>
              <td class="text-center counter">
                <div class="input-group">
                  <!-- <span class="input-group-btn">
                  <button type="button" class="btn btn-number"> <i class="fa fa-minus" aira-hidden="true"></i> </button>
                  </span> -->
                  <input type="text" data-id="{{$car['product']->id}}" class="form-control input-number" value="{{$car['qty']}}" min="1" placeholder="Quantity">
                  <!-- <span class="input-group-btn">
                  <button type="button" class="btn btn-number" > <i class="fa fa-plus" aira-hidden="true"></i> </button>
                  </span> -->
                </div>
                <a href="javascript:void(0)" onclick="qtyUpdate({{$car['product']->id}})" class="update">Update Cart</a>
              </td>
              <td>
                <h4>${{$car['product']->price}}</h4>
              </td>
              <td>
                <h4 class="lited">${{$car['rowtotal']}}</h4>
              </td>
            </tr>
            <?php $sum+=$car['rowtotal']; ?>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="checkoutsec">
        <div class="row">
          <div class="col-md-4 text-center centerCol">
            <a href="{{route('shop')}}"><i class="fa fa-angle-left"></i> Continue Shopping</a>
            <a href="{{route('checkout')}}" class="btn btn-block">Proceed To Checkout</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
      <div class="check-out-detail">
        <h2>Sub Total <span>${{$sum}}</span></h2>
        <!-- <h2>Discount  <span>$10</span></h2> -->
        <!-- <h2>Shipping <span>$15</span></h2> -->
        <h2 class="price">Total<span class="price">${{$sum}}</span></h2>
      </div>
      <!-- <div class="freeshipping">
        <h2>Shipping</h2>
        <span>Courier ($15)</span>
        <h2>Estimate For</h2>
        <span>United Estate,NY,1230</span>
      </div> -->
    </div>
  </div>
</section>

<!-- Cart Section End -->

@endsection
@section('scripts')
<script>
function qtyUpdate(pid){
  ajaxifyN({
    id: pid,
    qty: $('[data-id="'+pid+'"]').val()
  },'POST','{{route('cart.qtyUpdate')}}').then(function(e){
    location.reload()
  })
}
</script>
@endsection