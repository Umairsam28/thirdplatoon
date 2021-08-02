@extends('layouts.frontend.app')
@section('content')
<section class="banner-area">
    <div class="banner-content-area">
        <h2>Shop</h2>
    </div>
</section>
<section class="shop-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3 category-wrap">
                <h2>Categories</h2>
                <ul class="category-select">
                    @foreach($categories as $category)
                    <li><a href="">{{$category->name}}</a></li>
                    @endforeach
                </ul>
                <!--<h2>MOST VIEWED</h2>-->
                <!--<ul class="small-product-card">-->
                <!--    @foreach($mostViewed as $mv)-->
                <!--    <li>-->
                <!--        @if(count($mv->images)>0)-->
                <!--        <img src="{{asset('storage/products/'.$mv->id.'/'.$mv->images[0]->image_path)}}" />-->
                <!--        @else-->
                <!--        <img src="assets/images/placeholder.png" />-->
                <!--        @endif-->
                <!--        <h4><a href="{{route('shop.detail',[$mv])}}">{{$mv->name}}</a></h4>-->
                <!--        <span>${{$mv->price}}</span>-->
                <!--    </li>-->
                <!--    @endforeach-->
                <!--</ul>-->
            </div>
            <div class="col-md-9">
                <div class="row products_list">
                    @foreach($products as $product)
                    <div class="col-md-4 product-card">
                        <div class="products_box">
                            <a href="{{route('shop.detail',[$product])}}">
                                @if(count($product->images)>0)
                                <img src="{{asset('storage/products/'.$product->id.'/'.$product->images[0]->image_path)}}" />
                                @else
                                <img src="assets/images/placeholder.png" />
                                @endif
                                <h4>{{$product->name}}</h4>
                                <h5>${{$product->price}}</h5>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
</section>
@endsection