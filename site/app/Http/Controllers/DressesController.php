<?php
namespace App\Http\Controllers;
use App\category_services;
use Illuminate\Http\Request;
use App\dresses;
use Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\image_dresses;
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
        return view('admin.index', ['dress'=> $dresses]);
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
    return view('admin.add-product'/*, ['categories' => $categories]*/);
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
        $dresses = new Dresses;
        $dresses->name = $request->name;
        $dresses->dress_type_id = $request->dress_type_id;
        $dresses->price = $request->price;
        $dresses->color = $request->color;
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
        $images_dresses = new images_product;
        $images_dresses->photo = json_encode($images);
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
        $car =car::find($id);
        return view('admin.show', ['car' =>$car]);
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
        
    return view('admin.edit', compact(dress));
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
        
        $car = car::find($id);
        $car->name = $request->name;
        $car->year = $request->year;
        $car->body_style = $request->body_style;
        $car->engine = $request->engine;
        $car->price = $request->price;
        $car->transmission = $request->transmission;
        $car->color = $request->color;
        $car->fuel_style = $request->fuel_style; 
        $car->category_id = $request->categories;
        //upload image to database
        $filename = $request->file('image')->getClientOriginalName();
        $path = public_path('img');
        $request->file('image')->move($path, $filename);
        $car->image = $filename;
        $car->description = $request->description;
        $car->best_sale = $request->best_sale;
        $car->deal_of_week = $request->deal_of_week;
        $car->save();
        return redirect()->route('admin.index');
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
        $car = car::find($id);
        $car->delete();
        return redirect()->route('admin.index');
    }
    public function home()
    {
        return view('admin.home');
    }
   
}