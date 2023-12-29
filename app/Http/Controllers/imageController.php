<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class imageController extends Controller
{

//single image upload
    function singleImage(Request $request)
    {
        $request->validate([

            'image' => 'required'
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $extension = $image->getClientOriginalExtension();
            $nameToStore = 'photo-' . md5(uniqid()) . time() . '.' . $extension;

            $image->move(public_path('img/upload/single'), $nameToStore);
            return redirect()->route('dashboard');
        } else
            return "doesnt exist";

    }

//    multiple image upload

    function multipleImage(Request $request)
    {
        $request->validate([

            'images' => 'required',
            'images.*' => 'image'
        ]);


        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {


                $extension = $image->getClientOriginalExtension();
                $nameToStore = 'photo-' . md5(uniqid()) . time() . '.' . $extension;

                $image->move(public_path('img/upload/multiple'), $nameToStore);


            }
            return redirect()->route('dashboard');
        } else
            return "doesnt exist";

    }


}
