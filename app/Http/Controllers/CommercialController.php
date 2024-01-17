<?php

namespace App\Http\Controllers;

use App\Models\Commercial;
use App\Http\Requests\StoreCommercialRequest;
use App\Http\Requests\UpdateCommercialRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CommercialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commercials = Commercial::all();
        $commercials = Commercial::orderBy('id', 'DESC')->get();

        return view('commercial.commercial', compact('commercials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commercial.newcommercial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommercialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:managers,email',
            'password' => 'required|string|min:8',
        ] );
        $empData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        Commercial::create($empData);

        return Redirect::to('commercial')->with( 'status', 'The commercial was successfully created👌😎!!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $commercial = Commercial::find($id);
        return view('commercial.viewcommercial', compact('commercial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commercial = Commercial::find($id);
        return view('commercial.editcommercial', compact('commercial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommercialRequest  $request
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $managers = Commercial::find($id);

        $managers->name = $request->name;
        $managers->email = $request->email;
        $managers->password = $request->password;

        $managers->save();

        return Redirect::to('commercial')->with( 'status', 'The manager was successfully updated👌😎!!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commercial  $commercial
     * @return \Illuminate\Http\Response
     */
    public function destroy($commercial)
    {
        $commercials = Commercial::find($commercial);
        $commercials->delete();
        return Redirect::to('commercial')->with('status', 'The manager was successfully deleted👌😎!!');
    }
}
