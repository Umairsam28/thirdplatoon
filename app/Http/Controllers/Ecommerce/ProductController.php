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
}
