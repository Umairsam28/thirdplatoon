<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, EcommerceCategory};
class ProductController extends Controller
{
    public function index () {
        $categories=EcommerceCategory::all();
        $products=Product::paginate(20);
        $mostViewed = Product::orderBy('views','desc')->limit(3)->get();
        return view('frontend.ecommerce.product.index')
        ->with(compact('categories','products','mostViewed'));
    }
    public function detail(Product $product){
        return view('frontend.ecommerce.product.detail')
        ->with(compact('product'));
    }

    public function cart(){
        return view('frontend.ecommerce.product.cart');
    }

    public function checkout(){
        return view('frontend.ecommerce.product.checkout');
    }
}
