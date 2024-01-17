<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Http\Requests\StoreCheckRequest;
use App\Http\Requests\UpdateCheckRequest;
use App\Models\Product;
use App\Models\Producttype;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = Producttype::all();
        $resultsin = Product::all();
        return view('check.checkin', compact('producttypes', 'resultsin'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function out(Request $request)
    {
        $producttypes = Producttype::all();
        $resultsout = Stock::all();
        return view('check.checkout', compact('producttypes', 'resultsout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function in(Request $request)
    {
        $start = (new Carbon)->parse($request->startdate);
        $end = (new Carbon)->parse($request->enddate);

        if($request->name != null){
            $resultsout = DB::select('select * from stocks where created_at between "'.$start.'" and "'.$end.'" and name ='.$request->name);
        }else{
            $resultsout = DB::select('select * from stocks where created_at between "'.$start.'" and "'.$end.'"');
        }

        $producttypes = Producttype::all();
        return view('check.checkout', compact('resultsout', 'producttypes'));
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
     * @param  \App\Http\Requests\StoreCheckRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $start = (new Carbon)->parse($request->startdate);
        $end = (new Carbon)->parse($request->enddate);

            if($request->name != null){
                $resultsin = DB::select('select * from products where created_at between "'.$start.'" and "'.$end.'" and name ='.$request->name);
            }else{
                $resultsin = DB::select('select * from products where created_at between "'.$start.'" and "'.$end.'"');
            }
        $producttypes = Producttype::all();
        return view('check.checkin', compact('resultsin', 'producttypes'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function show(Check $check)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function edit(Check $check)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCheckRequest  $request
     * @param  \App\Models\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCheckRequest $request, Check $check)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Check  $check
     * @return \Illuminate\Http\Response
     */
    public function destroy(Check $check)
    {
        //
    }
}
