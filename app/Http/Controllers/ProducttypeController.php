<?php

namespace App\Http\Controllers;

use App\Models\Producttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProducttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = Producttype::all();
        $producttypes = Producttype::orderBy('name', 'ASC')->get();

        return view('producttype.producttype', compact('producttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producttype.newproducttype');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProducttypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required',
        ] );
        $empData = [
            'name' => $request->name,
        ];

        Producttype::create($empData);

        return Redirect::to('producttype')->with( 'status', 'The producttype was successfully created👌😎!!' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producttype = Producttype::find($id);
        return view('producttype.viewproducttype', compact('producttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttype = Producttype::find($id);
        return view('producttype.editproducttype', compact('producttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProducttypeRequest  $request
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producttypes = Producttype::find($id);

        $producttypes->name = $request->name;

        $producttypes->save();

        return Redirect::to('producttype')->with( 'status', 'The producttype was successfully updated👌😎!!' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function destroy($producttype)
    {
        $producttypes = Producttype::find($producttype);
        $producttypes->delete();
        return Redirect::to('producttype')->with('status', 'The producttype was successfully deleted👌😎!!');
    }
}
