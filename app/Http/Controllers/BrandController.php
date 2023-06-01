<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function index()
    {

        $brands = Brands::all();


        return view('brand.index', compact('brands'));
    }


    public function create()
    {

        return view('brand.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $brand = Brands::create([
            'name' => $request->name,
        ]);


        return redirect()->route('brand.index');
    }


    public function edit(Request $request, $id)
    {

        $brand = Brands::find($id);


        return view('brand.edit', compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        Brands::where('id', $id)->update([
            'name' => $request->name,
        ]);


        return redirect()->route('brand.index');
    }


    public function destroy($id)
    {

        $brand = Brands::find($id);


        $brand->delete();


        return redirect()->route('brand.index');
    }
}
