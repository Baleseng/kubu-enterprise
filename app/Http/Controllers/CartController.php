<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\User;
use DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
    
        // Calculate the total
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        // Calculate the total price
        //$total = 0;
        //foreach ($cartItems as $item) {
        //    $total += $item->quantity * $item->price;
        //}

        $products = DB::table('products')
        ->where('specialsection','trending')
        ->orderBy('updated_at', 'desc')
        ->get();

        return view('cart.index', compact('cartItems', 'total','products'));
    }

    public function add(Product $product, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Auth::user()->cartItems()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity
            ]);
        } else {
            Auth::user()->cartItems()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function remove(CartItem $cartItem){
    // 1. Security check: Ensure the item belongs to the logged-in user
    if ($cartItem->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // 2. Perform the deletion
    $cartItem->delete();

    // 3. Redirect to the cart index route with a success message
    return redirect()->route('cart.index')
                     ->with('success', 'Item removed from your cart.');
    }

    public function update(CartItem $cartItem, Request $request)
    {
        $this->authorize('update', $cartItem);

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem->update([
            'quantity' => $request->quantity
        ]);
        return back()->with('success', 'Cart updated');
    }
}
