<?php

namespace App\Http\Controllers\client_controller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\OrderInfo;
use Illuminate\Http\Request;
use App\Jobs\sendEmail;

class OrderController extends Controller
{
    function show()
    {
        return view('client.order');
    }
    function process(Request $request)
    {
        $request->validate([
            "name" => "required",
            "phone_number" => [
                "required",
                function ($attribute, $value, $fail) {
                    $phone_reg = "/0[0-9]{9}/";
                    if (!preg_match($phone_reg, $value)) {
                        $fail('Phone number is invalid!');
                    }
                },
            ],
            "email" => "bail|required|email:filter",
            "address" => "required"
        ]);
        $subtotal = 0;
        foreach (session('cart') as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $orderid = DB::table('orders')->insertGetId(
            [
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'address' => $request->address,
                'subtotal' => $subtotal
            ]
        );
        foreach (session('cart') as $key => $item) {
            $orderInfo = new OrderInfo;
            $orderInfo->order_id = $orderid;
            $orderInfo->product_id = $key;
            $orderInfo->quantity = $item['quantity'];
            $orderInfo->save();
        }
        sendEmail::dispatch($request->email);
        session()->forget('cart');
        return view('client.order_complete');
    }
}
