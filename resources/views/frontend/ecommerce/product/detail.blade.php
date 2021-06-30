@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>{{$product->name}}</h2>
    </div>
</section>

<!-- Product Section Begin -->

<section class="productdetail_sec">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
        <div class="productdescr_img">
          <div class="slickproduct_slider">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="slick_navcontrol">
                  <div class="slider slider-nav">
                    @foreach($product->images as $image)
                        <div><img src="{{asset('storage/products/'.$product->id.'/'.$image->image_path)}}" width="100%" alt=""/></div>
                    @endforeach
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="slider slider-for">
                    @foreach($product->images as $image)
                        <div><img src="{{asset('storage/products/'.$product->id.'/'.$image->image_path)}}" width="100%" alt=""/></div>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
        <div class="productdetail_diver">
          <h2>{{$product->name}}</h2>
          <!-- <h3> lorem ipsum</h3> -->
          <h2> ${{$product->price}} </h2>
          <hr>
          <!-- <div class="proRating">
            <ul>
              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
              <li><a href="#"><span>(394 reviews) / Write a review</span></a></li>
            </ul>
          </div> -->
          <?php print $product->description; ?>

          <div class="btn-appointment-detail">
            <a href="{{route('add.cart')}}">Add To Cart</a>
          </div>

          <div class="share-icon">
            <span>Share</span>
            <ul>
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Product Section End -->

@endsection
