<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends Controller
{

    public function index()
    {
        return view("admin.brand.index", ['brands' => Brand::paginate(5)]);
    }


    public function create()
    {
        return view('admin.brand.add', ['fields' => Field::all()]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required'
        ]);

        if (Brand::where('name', $request->name)->where('field_id', $request->field_id)->first()) {
            return back()->withInput()->with('message', 'This name already taken with this field');
        };

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->field_id = $request->field_id;
        $brand->save();
        return redirect('admin/brand')->with('message', 'Brand added successfully!');
    }


    public function show(Brand $brand)
    {
        //
    }
    public function getBrandsbyField($field_id)
    {
        $output = "";
        $brands = Brand::where('field_id', $field_id)->get();
        foreach ($brands as $brand) {
            $output .= "<option value='$brand->id'>$brand->name</option>";
        }
        return response()->json($output);
    }



    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', ['brand' => $brand, 'fields' => Field::all()]);
    }


    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => ['bail', 'required']
        ]);

        if (Brand::where('name', $request->name)->where('field_id', $request->field_id)->where("id", '<>', $brand->id)->first()) {
            $request->session()->flash('name', $request->name);
            $request->session()->flash('field_id', $request->field_id);
            return back()->withinput()->with('message', 'This name already taken with this field');
        };

        $brand->name = $request->name;
        $brand->field_id = $request->field_id;
        $brand->save();
        return redirect('admin/brand')->with('message', 'Brand edited successfully!');
    }


    public function destroy(Brand $brand)
    {
        $brand->delete();
        return back()->with('message', 'Brand deleted successfully!');
    }
}
