<?php

namespace App\Http\Controllers;

use App\category_services;
use Illuminate\Http\Request;

class CategoryServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category_services  $category_services
     * @return \Illuminate\Http\Response
     */
    public function show(category_services $category_services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category_services  $category_services
     * @return \Illuminate\Http\Response
     */
    public function edit(category_services $category_services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category_services  $category_services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category_services $category_services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category_services  $category_services
     * @return \Illuminate\Http\Response
     */
    public function destroy(category_services $category_services)
    {
        //
    }
}
