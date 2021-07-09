<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{Product, EcommerceCategory, User, Order};
class EcommerceController extends Controller
{
    public function index()
    {
        return Inertia::render('Ecommerce/panel');
    }
    public function summary () {
        $productCount = Product::count();
        $categoryCount = EcommerceCategory::count();
        $vendorsCount = User::vendors()->count();
        $ordersCount = Order::count();
        return response()->json([
            'productCount'=>$productCount,
            'categoryCount'=>$categoryCount,
            'vendorsCount'=>$vendorsCount,
            'ordersCount'=>$ordersCount
        ]);
    }
}
