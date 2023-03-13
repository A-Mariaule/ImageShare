<?php

namespace App\Http\Controllers;

use App\Models\Image ;
use App\Http\Requests\CreateImageRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Images.index',['images' => Image::all()] , ['users' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateImageRequest $request)
    {
        $path = null;
        if($request->hasFile('image')){
            $path = $request->file('image')->storePublicly('liste_images');
        }

        $image = new Image();
        $image->title = $request->title;
        $image->description = $request->description;
        $image->user_id = $request->user_id;
        $image->image = $path;
        $image->save();

        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('Images.show', ['image' => Image::find($id)], ['users' => User::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('Images.edit', ['image' => Image::find($id)], ['users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateImageRequest $request, string $id)
    {
        /*$path = null;
        if($request->hasFile('image')){
            $path = $request->file('image')->storePublicly('liste_images');
        }*/
        $image = Image::find($id);
        $image->title = $request->title;
        $image->description = $request->description;
        $image->user_id = $request->user_id;
        //$image->image = $path;
        $image->save();

        return redirect()->route('images.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::find($id);
        File::delete(public_path($image->image));
        $image->delete();
        return redirect()->route('images.index');
    }
}
