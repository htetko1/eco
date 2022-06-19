<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
//use Faker\Provider\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $photos = Photo::all();
//
//        return response()->json([
//            'message' => 'success',
//            'data'    => $photos
//        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhotoRequest $request)
    {
//        $request->validate([
//            'photo.*' => 'mimetypes:image/jpeg,image/png'
//        ]);

//        if(!Storage::exists('public/thumbnail')){
//            Storage::makeDirectory('public/thumbnail');
//        }
//
//        if($request->hasFile('path')){
//            $photo = $request->file('path');
//            $newName = uniqid().'_photo.'.$photo->extension();
//
//            $photo->storeAs('public/photos',$newName);
//
//            $img = Image::make($photo);
//            $img->fit('500','500');
//            $img->save('storage/thumbnail/'.$newName);
//            $url = asset('storage/thumbnail/'.$newName);
//
//            $photo = new Photo();
//            $photo->path = $url;
//            $photo->save();
//        }
//        return response()->json([
//            'message' => 'success',
//            'data'    => $photo
//        ]);

        $request->validate([
            'photo.*' => 'mimetypes:image/jpeg,image/png'
        ]);


        $fileNameArr= [];

        foreach ($request->file("photo") as $file){
            $newFileName=uniqid()."_product.".$file->getClientOriginalExtension();
            array_push($fileNameArr,$newFileName);
            $dir="/public/product/";
            $file->storeAs($dir,$newFileName);
        }

        foreach ($fileNameArr as $f){
            $photo = New Photo();
            $photo->product_id = $request->product_id;
            $photo->path = $f;
            $photo->save();
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo,$id)
    {
//        $photo = Photo::find($id);
//
//        return response()->json([
//            'message' => 'success',
//            'data'    => $photo
//        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhotoRequest  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoRequest $request, Photo $photo,$id)
    {
//        if($request->hasFile('path')){
//            $photo = $request->file('path');
//            $newName = uniqid().'_photo.'.$photo->extension();
//            $photo->storeAs('public/photos',$newName);
//            $img = Image::make($photo);
//            $img->fit('500','500');
//            $img->save('storage/thumbnail/'.$newName);
//            $url = asset('storage/thumbnail/'.$newName);
//            $photo = Photo::find($id);
//            $photo->path = $url;
//            $photo->update();
//        }
//
//        return response()->json([
//            'message' => 'success',
//            'data'    => $photo
//        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->back();
    }
}
