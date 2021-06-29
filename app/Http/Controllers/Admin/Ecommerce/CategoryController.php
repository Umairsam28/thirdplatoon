<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{EcommerceCategory, Product};
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $data = EcommerceCategory::orderBy('id', 'desc')->paginate(20);
        return Inertia::render('Ecommerce/Category/list',['categoryList'=>$data]);
    }
    public function create()
    {
        return Inertia::render("Ecommerce/Category/create");
    }
    public function store(Request $request){
        $data = $request->only([
            'name','slug','parent_id'
        ]);
        $data['is_active'] = $request->is_active==='true'?1:0;
        $product = EcommerceCategory::create($data);
        return Redirect::route('admin.ecommerce.category.index');
    }
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            EcommerceCategory::find($request->input('id'))->delete();
            return redirect()->back();
        }
    }
}
