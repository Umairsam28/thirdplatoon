<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{Product, EcommerceCategory, User, Order};
use Auth;
class EcommerceController extends Controller
{
    public function index()
    {
        return Inertia::render('Ecommerce/panel',['isOnEcomPage'=>true]);
    }
    public function summary () {
        $productCount = Product::where('user_id',Auth::user()->id)->count();
        $categoryCount = EcommerceCategory::count();
        $vendorsCount = User::vendors()->count();
        // $ordersCount = Order::count();
        $ordersCount=Order::with('items')
        ->join('order_products','orders.id', '=', 'order_products.order_id')
        ->join('products','order_products.product_id', '=', 'products.id')
        ->where('products.user_id',Auth::user()->id)
        ->count();
        return response()->json([
            'productCount'=>$productCount,
            'categoryCount'=>$categoryCount,
            'vendorsCount'=>$vendorsCount,
            'ordersCount'=>$ordersCount,
            'user'=>Auth::user()
        ]);
    }
}
