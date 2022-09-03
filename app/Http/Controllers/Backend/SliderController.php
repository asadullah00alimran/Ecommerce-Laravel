<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Slider;
use App\Models\Backend\MultiImage;
use Image;
use File;

class SliderController extends Controller
{

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


    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(File::exists('backend/slider/'.$slider->picture)){
            File::delete('backend/slider/'.$slider->picture);
        }
        $slider->delete();
        return redirect()->route("slider.show");
    }

    public function multi(){
        $slider = Slider::all();
        return view("backend.pages.slider.multi",compact("slider"));
    }

    public function multistore(Request $request){

            $request->validate([
            'slider_id' => ['required', 'integer'],
            'pictures' => ['required'],
        ]);

        if($request->pictures){

            foreach($request->file('pictures') as $image){

                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path('backend/slider/images/'.$customName);
                Image::make($image)->save($location);

                $multi = new MultiImage();

                $multi->slider_id = $request->slider_id;
                $multi->picture = $customName;
                $multi->save();
            }
            return response()->json([
                "success" => "ok"
            ]);
        }
        return redirect()->route("slider.multi");
    }

    public function view($id){
        $slider = Slider::find($id);
        $multi = MultiImage::where("slider_id",$id)->get();
        return view("backend.pages.slider.view", compact("slider", "multi"));

    }

    public function edit($id){
        $slider = Slider::find($id);
        $multi = MultiImage::where("slider_id",$id)->get();
        return view("backend.pages.slider.edit", compact("slider", "multi"));

    }
    public function destroyimg($id){
        $multi = MultiImage::find($id);
        if(File::exists('backend/slider/images/'.$multi->picture)){
            File::delete('backend/slider/images/'.$multi->picture);
        }
        $multi->delete($id);
        return back();
    }
    
     
    public function update(Request $request, $id)
    {
        
    }
    
    public function addmultistore(Request $request){

            $request->validate([
            'slider_id' => ['required', 'integer'],
            'pictures' => ['required'],
        ]);

        if($request->pictures){

            foreach($request->file('pictures') as $image){

                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path('backend/slider/images/'.$customName);
                Image::make($image)->save($location);

                $multi = new MultiImage();

                $multi->slider_id = $request->slider_id;
                $multi->picture = $customName;
                $multi->save();

            }
        }
        return redirect()->route("slider.view");
    }

}
