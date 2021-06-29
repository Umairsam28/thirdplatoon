<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{Product, ProductImage};
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::orderBy('id', 'desc')->paginate(20);
        return Inertia::render('Ecommerce/Product/list',['productList'=>$data]);
    }
    public function create()
    {
        return Inertia::render("Ecommerce/Product/create");
    }
    public function store(Request $request){
        $data = $request->only([
            'name','slug','stock','meta_description','meta_keywords','meta_title','short_description','description',
            'price','discount',
        ]);
        $data['handle_stock'] = $request->handle_stock==='true'?1:0;
        $data['is_active'] = $request->is_active==='true'?1:0;
        $product = Product::create($data);
        if($request->images){
            foreach($request->images as $file){
                $filename = time() . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/products/'.$product->id, $filename);
                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image_path = $filename;
                $product_image->save();
            }
        }
        return Redirect::route('admin.products.index');
    }
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            Product::find($request->input('id'))->delete();
            ProductImage::where('product_id',$request->input('id'))->delete();
            return redirect()->back();
        }
    }
}
