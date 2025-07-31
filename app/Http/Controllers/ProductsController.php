<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use DB;


class ProductsController extends Controller
{
    public function default(Product $id, Request $request)
    {
        $url = 'user';

        $stock = DB::table('products')
        ->where('product_instock','In')
        ->orderBy('updated_at', 'desc')->get();

        return view('/home',compact('url','stock'));
    }

    public function index(Product $id, Request $request)
    {
        $url = 'user';

        $stock = DB::table('products')
        ->where('product_instock','In')
        ->orderBy('updated_at', 'desc')->get();

        return view('/dashboard',compact('url','stock'));
    }

    public function product(Product $id, User $user, Request $request)
    {
        $url = DB::table('users')->select('users.*')->get();
        return view('/product', compact('url','id'));
    }
}
