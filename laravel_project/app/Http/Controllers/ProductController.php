<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Field;
use App\Models\Brand;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.product.index', ['products' => Product::paginate(5)]);
    }


    public function create()
    {
        return view('admin.product.add', ['fields' => Field::all()]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|unique:products,name',
            'price' => 'required',
            'field_id' => 'required',
            'brand_id' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,png',
            'description' => 'required'
        ]);
        $dir = time();
        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->field_id = $request->field_id;
        $product->images = $dir;
        $product->description = $request->description;
        $product->save();
        Storage::makeDirectory('public/' . $dir);
        foreach ($request->file('images') as $file) {
            $file->storeAs('public/' . $dir, $file->getClientOriginalName());
        }
        return redirect('admin/product')->with('message', 'Product added successfully!');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit($id)
    {
        return view('admin.product.edit', ['product' => Product::where('id', $id)->first(), 'fields' => Field::all(), 'brand' => Brand::class]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::where("id", $id)->first();
        $request->validate([
            'name' => ['bail', 'required', Rule::unique('products')->ignore($product->id)],
            'price' => 'required',
            'field_id' => 'required',
            'brand_id' => 'required',
            'images.*' => 'mimes:jpg,png',
            'description' => 'required'
        ]);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');
        $product->price = $request->price;
        $product->brand_id = $request->brand_id;
        $product->field_id = $request->field_id;
        $product->description = $request->description;
        $product->save();
        if ($request->hasFile('images')) {
            $files = Storage::files('public/' . $product->images);
            Storage::delete($files);
            foreach ($request->file('images') as $file) {
                $file->storeAs('public/' . $product->images, $file->getClientOriginalName());
            }
        }

        return redirect(session("previous"))->with('message', 'Product edited successfully!');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('admin/product')->with('message', 'Product deleted successfully!');
    }
}
