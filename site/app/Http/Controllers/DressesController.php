<?php
namespace App\Http\Controllers;
use App\Http\Controllers\ImagesDressController;
use App\category_services;
use Illuminate\Http\Request;
use App\dresses;
use Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\image_dress;

class DressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dresses = Dresses::paginate(20);
        return view('admin_Dress.index', ['dress'=> $dresses]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$categories = Category::all();
    return view('admin_Dress.add-product'/*, ['categories' => $categories]*/);
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
        $dresses = new dresses;
        $dresses->name = $request->name;
        $dresses->dress_type = $request->dress_type;
        $dresses->price = $request->price;
        $dresses->color = $request->color;
        $dresses->category_services_id = $request->categories;
        //upload image to database
        $filename = $request->file('image')->getClientOriginalName();
        $path = public_path('img');
        $request->file('image')->move($path, $filename);
        $dresses->image = $filename;
        $dresses->description = $request->description;
        $dresses->save();
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
        $images_dresses = new ImagesDress;
        $images_dresses->image = json_encode($images);
        $images_dresses->dresses_id = $dresses->id;
        $images_dresses->save();
        return redirect()->route('admin.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $dress =dresses::find($id);
        return view('admin_Dress.show', ['dress' =>$dress]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dress = dresses::find($id);
        
    return view('admin_Dress.edit', compact(dress));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $dresses = new dresses;
        $dresses->name = $request->name;
        $dresses->dress_type = $request->dress_type;
        $dresses->price = $request->price;
        $dresses->color = $request->color;
        //upload image to database
        $filename = $request->file('image')->getClientOriginalName();
        $path = public_path('img');
        $request->file('image')->move($path, $filename);
        $dresses->image = $filename;
        $dresses->description = $request->description;
        $dresses->save();
        return redirect()->route('admin_Dress.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $dress = dresses::find($id);
        $dress->delete();
        return redirect()->route('admin_Dress.index');
    }
    public function home()
    {
        return view('admin.home');
    }
   
}