<?php

namespace App\Http\Controllers\client_controller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function add_to_cart(Request $request, $product_id)
    {
        $product = Product::where('id', $product_id)->first();
        if (session()->has('cart')) {
            if (array_key_exists($product->id, session('cart'))) {
                if ($request->has('quantity')) {
                    if (session("cart.$product->id.quantity") + $request->quantity > 5) {
                        return response()->json(['message' => "NO", 'already_in_cart' => session("cart.$product->id.quantity")]);
                    }
                    session()->increment("cart.$product->id.quantity", (int)$request->quantity);
                } else {
                    if (session("cart.$product->id.quantity") >= 5) {
                        return response()->json(['message' => "NO"]);
                    }
                    session()->increment("cart.$product->id.quantity");
                }
            } else {
                if ($request->has('quantity')) {
                    session(["cart.$product->id" => ['name' => $product->name, 'slug' => $product->slug, 'price' => $product->price, 'quantity' => $request->quantity, 'image' => $product->images]]);
                } else {
                    session(["cart.$product->id" => ['name' => $product->name, 'slug' => $product->slug, 'price' => $product->price, 'quantity' => 1, 'image' => $product->images]]);
                }
            }
        } else {
            if ($request->has('quantity')) {
                session(["cart.$product->id" => ['name' => $product->name, 'slug' => $product->slug, 'price' => $product->price, 'quantity' => $request->quantity, 'image' => $product->images]]);
            } else {
                session(["cart.$product->id" => ['name' => $product->name, 'slug' => $product->slug, 'price' => $product->price, 'quantity' => 1, 'image' => $product->images]]);
            }
        }
        $cart_total = 0;
        foreach (session('cart') as $item) {
            $cart_total += $item['quantity'];
        }
        return response()->json(['message' => "OK", 'image' => asset("storage/$product->images/main_image.jpg"), 'name' => $product->name, 'cart_total' => $cart_total]);
        return $request->quantity;
    }

    function index()
    {
        return view('client.cart');
    }
    function delete_item($key)
    {
        session()->forget("cart.$key");
        $total_items = 0;
        foreach (session('cart') as $item) {
            $total_items += $item['quantity'];
        }
        if (count(session('cart')) == 0) {
            return response()->json(['message' => "empty", "total_items" => $total_items]);
        } else {
            return response()->json(['message' => "", "total_items" => $total_items]);
        }
    }
    function update(Request $request, $key)
    {
        session(["cart.$key.quantity" => $request->quantity]);
    }
}
