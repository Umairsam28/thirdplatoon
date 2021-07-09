<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Product, EcommerceCategory, Order, OrderProduct};
use Session;
use App\Http\Requests\placeOrderRequest;
class ProductController extends Controller
{
    public function index()
    {
        $categories = EcommerceCategory::all();
        $products = Product::paginate(20);
        $mostViewed = Product::orderBy('views', 'desc')->limit(3)->get();
        return view('frontend.ecommerce.product.index')
            ->with(compact('categories', 'products', 'mostViewed'));
    }
    public function detail(Product $product)
    {
        return view('frontend.ecommerce.product.detail')
            ->with(compact('product'));
    }

    public function cart()
    {
        if(Session::has('cart')){
            $cart = Session::get('cart');
            return view('frontend.ecommerce.product.cart')
            ->with(compact('cart'));
        }
        return redirect()->route('shop');
    }
    public function cartqtyUpdate(Request $request){
        $product=Product::find($request->id);
        $cart = Session::get('cart');
        $cart[$request->id]['qty']=$request->qty;
        $cart[$request->id]['subtotal']=($request->qty*$product->price);
        $cart[$request->id]['rowtotal']=($request->qty*$product->price);
        Session::put('cart',$cart);
        return response()->json(['status'=>1]);
    }
    public function cartadd(Request $request, Product $product)
    {
        $cart = [];
        $qty=1;
        if(isset($request->qty)){
            $qty = $request->qty;
        }
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        }
        if (!isset($cart[$product->id])) {
            $cart[$product->id] = ['qty'=>$qty,'product'=>$product,'subtotal'=>0,'rowtotal'=>0];
        }
        $cart[$product->id]['subtotal']=($qty);
        $cart[$product->id]['qty']=($qty*$product->price);
        $cart[$product->id]['rowtotal']=($qty*$product->price);
        Session::put('cart',$cart);
        return back()->withMsg(['type' => 'success', 'text' => 'Product added in Cart']);
    }
    public function checkout()
    {
        if(Session::has('cart')){
            $cart = Session::get('cart');
            return view('frontend.ecommerce.product.checkout')
            ->with(compact('cart'));
        }
        return redirect()->route('shop');
    }
    public function placeOrder(placeOrderRequest $request){
        $order = Order::create($request->except(['__token']));
        $cart = Session::get('cart');
        $total=0;
        foreach($cart as $car){
            $order->items()->create([
                'product_id'=>$car['product']->id,
                'price'=>$car['product']->price,
                'rowtotal'=>$car['rowtotal'],
                'qty'=>$car['qty'],
            ]);
            $total+=$car['rowtotal'];
        }
        $order->total=$total;
        $order->save();
        Session::forget('cart');
        return redirect()->route('order.payment',[$order]);
    }
    public function orderPayment(Order $order){
        return view('frontend.ecommerce.product.payment')
            ->with(compact('order'));
    }
    public function orderInvoice(Order $order){
        return view('frontend.ecommerce.product.invoice')
            ->with(compact('order'));
    }    
}
