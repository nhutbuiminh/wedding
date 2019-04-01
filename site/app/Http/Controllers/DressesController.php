<?php

namespace App\Http\Controllers;

use App\dresses;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dresses = new dresses();
        $dresses->name = $request->name;
        $dresses->dress_type_id = $request->dress_type_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dresses  $dresses
     * @return \Illuminate\Http\Response
     */
    public function show(dresses $dresses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dresses  $dresses
     * @return \Illuminate\Http\Response
     */
    public function edit(dresses $dresses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dresses  $dresses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dresses $dresses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dresses  $dresses
     * @return \Illuminate\Http\Response
     */
    public function destroy(dresses $dresses)
    {
        //
    }
}
