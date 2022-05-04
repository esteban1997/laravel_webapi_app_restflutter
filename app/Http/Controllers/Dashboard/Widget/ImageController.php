<?php

namespace App\Http\Controllers\Dashboard\Widget;

use App\Models\Group;
use App\Models\Image;
use App\Http\Requests\SaveImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(15);
        return view('dashboard.widgets.image.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $groups = Group::pluck('id','name');
        $image = new Image();
        return view('dashboard.widgets.image.create',compact('groups','image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveImage $request)
    {

        $filename = time().'.'.$request->url->extension();

        $request->url->move(public_path('images'),$filename);

        $data = $request->validated();
        $data['url'] = $filename;

        Image::create($data);

        return back()->with('status','Elemento creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {

        //dd($image);
        $groups = Group::pluck('id','name');
        return view('dashboard.widgets.image.edit',compact('groups','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(SaveImage $request, Image $image)
    {

        dd($request);
        $filename = time().'.'.$request->url->extension();

        $request->url->move(public_path('images'),$filename);

        $data = $request->validated();
        $data['url'] = $filename;

        $this->delete($image->url);

        $image->update($data);
        return back()->with('status','Elemento actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $this->delete($image->url);
        $image->delete();
        return back()->with('status','Elemento eliminado con exito');
    }

    public function delete($url){
        if(File::exists(public_path('images').'/'.$url)){
            File::delete(public_path('images').'/'.$url);
        }
    }
}
