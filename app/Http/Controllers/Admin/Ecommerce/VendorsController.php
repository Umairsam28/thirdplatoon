<?php

namespace App\Http\Controllers\Admin\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class VendorsController extends Controller
{
    public function index()
    {
        $data = User::orderBy('id', 'desc')->paginate(20);
        return Inertia::render('Ecommerce/Vendors/list',['usersList'=>$data]);
    }
    public function setAsVendor (User $user) {
        $user->is_vendor = !$user->is_vendor;
        $user->save();
        return response()->json(['status'=>1]);
    }
}
