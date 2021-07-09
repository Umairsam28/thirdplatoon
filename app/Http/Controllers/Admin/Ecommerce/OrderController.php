<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{Order, OrderProduct};
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::orderBy('id', 'desc')->with('items')->paginate(20);
        return Inertia::render('Ecommerce/Orders/list',['ordersList'=>$data]);
    }
}
