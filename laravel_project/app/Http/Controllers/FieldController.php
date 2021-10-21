<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FieldController extends Controller
{

    public function index()
    {
        return view('admin.field.index', ['fields' => Field::all()]);
    }


    public function create()
    {
        return view('admin.field.add');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'bail|required|unique:fields,name'
        ]);

        $field = new Field();
        $field->name = $request->name;
        $field->save();
        return redirect('admin/field')->with('message', 'Field added successfully');
    }


    public function show(Field $field)
    {
        //
    }


    public function edit(Field $field)
    {
        return view("admin.field.edit", ['field' => $field]);
    }


    public function update(Request $request, Field $field)
    {
        $validated = $request->validate([
            'name' => ['bail', 'required', Rule::unique('fields')->ignore($field)]
        ]);
        $field->name = $request->name;
        $field->save();
        return redirect('admin/field')->with('message', 'Field edited successfully!');
    }


    public function destroy(Field $field)
    {
        $field->delete();
        return back()->with('message', 'Field deleted successfully!');
    }
}
