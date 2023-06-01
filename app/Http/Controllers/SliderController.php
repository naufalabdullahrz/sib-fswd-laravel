<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        
        $sliders = Slider::all();

        
        return view('slider.index', compact('sliders'));
    }

    public function create()
    {
        
        return view('slider.create');
    }

    public function store(Request $request)
    {
        
        $imageName = time().'.'.$request->image->extension(); // 1685433155.jpg

        
        Storage::putFileAs('public/slider', $request->file('image'), $imageName);

        
        $slider = Slider::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        
        return redirect()->route('slider.index');
    }

    public function edit(Request $request, $id)
    {
        
        $slider = Slider::find($id);

        
        return view('slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        
        if ($request->hasFile('image')) {
            
            $old_image = Slider::find($id)->image;

            
            Storage::delete('public/slider/'.$old_image);

            
            $imageName = time().'.'.$request->image->extension();

            
            Storage::putFileAs('public/slider', $request->file('image'), $imageName);

           
            Slider::where('id', $id)->update([
                'title' => $request->title,
                'image' => $imageName,
            ]);

        } else {
            
            Slider::where('id', $id)->update([
                'title' => $request->title,
            ]);
        }


        
        return redirect()->route('slider.index');
    }

    public function destroy($id)
    {
        
        $slider = Slider::find($id);

        
        Storage::delete('public/slider/'.$slider->image);

        
        $slider->delete();

        
        return redirect()->route('slider.index');
    }
}
