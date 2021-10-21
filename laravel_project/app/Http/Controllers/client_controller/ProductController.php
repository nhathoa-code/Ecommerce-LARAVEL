<?php

namespace App\Http\Controllers\client_controller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Field;
use App\Models\Review;
use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index(Product $product)
    {
        $images = Storage::files("public/" . $product->images);
        $images = array_filter($images, function ($file) {
            if (!strpos($file, 'main_image')) {
                return $file;
            };
        });
        $images = array_map(function ($image) {
            return str_replace('public', '', $image);
        }, $images);

        return view('client.product', ['product' => $product, 'images' => $images, 'reviews' => Review::where("product_id", $product->id)->where('parent_id', null)->orderBy('created_at', 'desc')->get(), 'Review' => Review::class]);
    }

    function list(Request $request, $field)
    {
        $field = Field::where('name', $field)->first();
        if (!$field) {
            return abort(404);
        } else {
            $field_id = $field->id;
        }
        $products = Product::where('field_id', $field_id);
        $variables = [];
        if ($request->has('brand')) {
            $brands = explode(",", $request->query('brand'));
            $brands_id = Brand::select('id')->whereIn('name', $brands)->where('field_id', $field_id)->get()->pluck('id');
            $products = $products->whereIn('brand_id', $brands_id);
            $variables['brands_array'] = $brands_id->toArray();
        }
        if ($request->has('price')) {
            $price_range = explode("-", $request->price);
            $products = $products->whereBetween("price", $price_range);
            $variables['price'] = $price_range;
        }
        $products = $products->get();
        $variables['products'] = $products;
        $variables['field'] = Field::where('name', $field->name)->first();
        $variables['brands'] = Brand::where('field_id', $field_id)->get();
        return view('client.list', $variables);
    }

    function getproductsAjax(Request $request)
    {
        $output = "";
        $products = DB::table('products')->where("field_id", $request->field);
        if (!empty($request->brands_id)) {
            $products = $products->whereIn('brand_id', $request->brands_id);
        }
        if ($request->price != '') {
            $products = $products->whereBetween("price", $request->price);
        }
        $products = $products->get();
        foreach ($products as $product) {
            $url = url("/product/$product->slug");
            $img = asset('storage/' . $product->images . '/main_image.jpg');
            $output .= "<div class='product'>
                    <div>
                        <a href='$url'>
                            <img src='$img' alt=''>
                        </a>
                    </div>
                    <p class='price'>$$product->price</p>
                    <p class='name'>
                        <a href='$url'>$product->name</a>
                    </p>
                    <div class='cart' data-id='$product->id'>
                        <span class='lnr lnr-cart'></span>
                    </div>
                </div>";
        }
        return $output;
    }

    function searchAjax(Request $request)
    {
        $response = "";
        $keyword = $request->keyword;
        $results = Product::where("name", "like", "%" . $keyword . "%")->limit(5)->get();
        if (count($results) > 0) {
            $response .= "<div class='card'>
                        <div class='card-header text-start' style='font-weight: 500;'>
                            Suggestion
                        </div>
                        <ul class='list-group list-group-flush'>";
            foreach ($results as $result) {
                $image = asset("storage/$result->images/main_image.jpg");
                $url = url("/product/$result->slug");
                $response .= "<li class='list-group-item py-3'>
                                <a href='$url'>
                                    <img src='$image' alt=''>
                                </a>
                                <a href='$url'>$result->name</a>
                              </li>";
            }
            $response .= "</ul>
                    </div>";
        }
        return $response;
    }

    function search(Request $request)
    {
        $keyword = $request->keyword;
        $results = Product::where("name", "like", "%" . $keyword . "%")->get();
        return view("client.search", ["results" => $results]);
    }
}
