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
        ->where('product_stock','In')
        ->orderBy('updated_at', 'desc')->get();

        return view('/home',compact('url','stock'));
    }

    public function index(Product $id, Request $request)
    {
        $url = 'user';

        $special = DB::table('products')->where('product_stock','In')->orderBy('updated_at', 'desc')->limit(6)->get();
        $trends = DB::table('products')->where('product_stock','In')->orderBy('updated_at', 'desc')->limit(6)->get();
        $weekend = DB::table('products')->where('product_stock','In')->orderBy('updated_at', 'desc')->limit(6)->get();
        $weekday = DB::table('products')->where('product_stock','In')->orderBy('updated_at', 'desc')->limit(6)->get();
        $house = DB::table('products')->where('product_stock','In')->orderBy('updated_at', 'desc')->limit(6)->get();
        $party = DB::table('products')->where('product_stock','In')->orderBy('updated_at', 'desc')->limit(6)->get();
        
        return view('/dashboard',compact('url','special','trends','weekend','weekday','house','party'));
    }

    public function product(Product $id, User $user, Request $request)
    {
        $url = DB::table('users')->select('users.*')->get();
        return view('/product', compact('url','id'));
    }

    public function example(Product $id, User $user, Request $request)
    {
        $url = 'user';
        return view('/example', compact('url','id'));
    }
}
