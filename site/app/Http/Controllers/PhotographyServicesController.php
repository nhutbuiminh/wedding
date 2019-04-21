<?php

namespace App\Http\Controllers;
use App\category_services;
use App\photography_services;
use Illuminate\Http\Request;
use App\image_album;
class PhotographyServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album = photography_services::paginate(20);
        return view('admin_Album.index', ['album'=> $album]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_Album.add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store
        $album = new photography_services;
        $album->name = $request->name;
        $album->price = $request->price;
        //upload image to database
        $filename = $request->file('image')->getClientOriginalName();
        $path = public_path('img');
        $request->file('image')->move($path, $filename);
        $album->image = $filename;
        $album->description = $request->description;
        $album->save();
        //upload images to images_product table
        if($request->hasfile('images_list'))
        {
            foreach($request->file('images_list') as $file)
            {
                $name = $file->getClientOriginalName();
                $path = public_path('img');
                $file->move($path, $name);
                $images[] = $name;
            }
        }
        $images_album = new ImagesDress;
        $images_album->image = json_encode($images);
        $images_album->photography_services_id = $album->id;
        $images_album->save();
        return redirect()->route('admin_Album.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\photography_services  $photography_services
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album =photography_services::find($id);
        return view('admin_Album.show', ['album' =>$album]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\photography_services  $photography_services
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = photography_services::find($id);
        
    return view('admin_Album.edit', ['album' =>$album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\photography_services  $photography_services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $album = new photography_services;
        $album->name = $request->name;
        $album->price = $request->price;
        //upload image to database
        $filename = $request->file('image')->getClientOriginalName();
        $path = public_path('img');
        $request->file('image')->move($path, $filename);
        $album->image = $filename;
        $album->description = $request->description;
        $album->save();
        return redirect()->route('admin_Album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\photography_services  $photography_services
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = photography_services::find($id);
        $album->delete();
        return redirect()->route('admin_Album.index');
    }
}
