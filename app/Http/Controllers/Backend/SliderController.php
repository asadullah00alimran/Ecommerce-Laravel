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
        if($request->picture){
            $image = $request->file('picture');
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path('backend/slider/'.$customName);
            Image::make($image)->save($location);
        }
    }


    public function show($id)
    {
        //
    }

     
    public function manage()
    {
       return view("backend.pages.slider.manage");
    }

     
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
