<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use DB;

class AppController extends Controller
{
    public function default(Product $id, Request $request)
    {
        $url = 'user';

        $stock = DB::table('products')
        ->where('product_stock','In')
        ->orderBy('updated_at', 'desc')->get();

        return view('/home',compact('url','stock'));
    }

    public function index(Request $request)
    {
        $url = 'user';
        $one = Section::where('position', '1')->first();
        $two = Section::where('position', '2')->first();
        $three = Section::where('position', '3')->first();
        $four = Section::where('position', '4')->first();
        $five = Section::where('position', '5')->first();

        $trending = DB::table('products')
        ->where('specialsection','trending')
        ->orderBy('updated_at', 'desc')
        ->get();
        
        return view('/dashboard',compact('url','one','two','three','four','five','trending'));
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
