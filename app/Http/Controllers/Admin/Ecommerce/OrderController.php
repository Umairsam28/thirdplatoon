<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{Order, OrderProduct};
use Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::orderBy('orders.id', 'desc')->with('items')
        ->join('order_products','orders.id', '=', 'order_products.order_id')
        ->join('products','order_products.product_id', '=', 'products.id')
        ->where('products.user_id',Auth::user()->id)
        ->paginate(20);
        return Inertia::render('Ecommerce/Orders/list',['ordersList'=>$data]);
    }
}
