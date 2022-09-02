<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Slider;
use Image;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view("backend.pages.slider.add");
    }


     
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'picture' => ['required'],
            'link' => ['required','string'],
            'status' => ['required', 'integer'],
        ]);
        if($request->picture){
            $image = $request->file('picture');
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path('backend/slider/'.$customName);
            Image::make($image)->save($location);
        }
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->category = $request->category;
        $slider->description = $request->description;
        $slider->picture = $customName;
        $slider->link = $request->link;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route("slider.show");
    }


    public function show()
    {
        $slider = Slider::all();
        return view("backend.pages.slider.manage",compact("slider"));
    }

     
    // public function manage()
    // {
    //    return view("backend.pages.slider.manage");
    // }

     
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(File::exists('backend/slider/'.$slider->picture)){
            File::delete('backend/slider/'.$slider->picture);
        }
        $slider->delete();
        return redirect()->route("slider.show");
    }
}
