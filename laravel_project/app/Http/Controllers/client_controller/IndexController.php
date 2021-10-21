<?php

namespace App\Http\Controllers\client_controller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;

class IndexController extends Controller
{
    function index()
    {
        return view('index', ['Product' => Product::class, 'brands' => Brand::all()]);
    }
}
