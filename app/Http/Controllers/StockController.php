<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Models\Producttype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        $stocks = Stock::orderBy('created_at', 'DESC')->get();

        return view('stock.stock', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producttypes = Producttype::all();
        return view('stock.newstock', compact('producttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required|string',
            'quantite' => 'required',
        ] );
        if($request->name == '1'){
            $unite = "Bouteilles";
        }elseif($request->name == '2'){
            $unite = "Boites";
        }else {
            $unite = "Litre";
        }
            if($request->name == 1){
                $inits = DB::select('select gaz from stock_inits');
                foreach ($inits as $init){
                    $gaz = $init->gaz;
                }
                if ($gaz < $request->quantite){
                    $message = "Impossible to make an exit 😔😔😔 !!";
                }else{
                    DB::update('update stock_inits set gaz='. $gaz-$request->quantite.' where id=1');
                    Stock::create( [
                        'name' => $request->name,
                        'quantite' => $request->quantite,
                        'description' => $request->description,
                        'unite' => $unite,
                    ] );
                    $message = "The operation has successfully 👍👍 !!";
                }
            }elseif($request->name == 5){
                $inits = DB::select('select gazoil from stock_inits');
                foreach ($inits as $init){
                    $gazoil = $init->gazoil;
                }
                if ($gazoil < $request->quantite){
                    $message = "Impossible to make an exit 😔😔😔 !!";
                }else{
                    DB::update('update stock_inits set gazoil='. $gazoil-$request->quantite.' where id=1');
                    Stock::create( [
                        'name' => $request->name,
                        'quantite' => $request->quantite,
                        'description' => $request->description,
                        'unite' => $unite,
                    ] );
                    $message = "The operation has successfully 👍👍 !!";
                }
            }elseif($request->name == 2){
                $inits = DB::select('select lubrifiant from stock_inits');
                foreach ($inits as $init){
                    $lubrifiant = $init->lubrifiant;
                }
                if ($lubrifiant < $request->quantite){
                    $message = "Impossible to make an exit 😔😔😔 !!";
                }else{
                    DB::update('update stock_inits set lubrifiant='. $lubrifiant-$request->quantite.' where id=1');
                    Stock::create( [
                        'name' => $request->name,
                        'quantite' => $request->quantite,
                        'description' => $request->description,
                        'unite' => $unite,
                    ] );
                    $message = "The operation has successfully 👍👍 !!";
                }
            }elseif($request->name == 3){
                $inits = DB::select('select petrole from stock_inits');
                foreach ($inits as $init){
                    $petrole = $init->petrole;
                }
                if ($petrole < $request->quantite){
                    $message = "Impossible to make an exit 😔😔😔 !!";
                }else{
                    DB::update('update stock_inits set petrole='. $petrole-$request->quantite.' where id=1');
                    Stock::create( [
                        'name' => $request->name,
                        'quantite' => $request->quantite,
                        'description' => $request->description,
                        'unite' => $unite,
                    ] );
                    $message = "The operation has successfully 👍👍 !!";
                }
            }else{
                $inits = DB::select('select super from stock_inits');
                foreach ($inits as $init){
                    $super = $init->super;
                }
                if ($super < $request->quantite){
                    $message = "Impossible to make an exit 😔😔😔 !!";
                }else{
                    DB::update('update stock_inits set super='. $super-$request->quantite.' where id=1');
                    Stock::create( [
                        'name' => $request->name,
                        'quantite' => $request->quantite,
                        'description' => $request->description,
                        'unite' => $unite,
                    ] );
                    $message = "The operation has successfully 👍👍 !!";
                }
            }
            
        

        return Redirect::to('stock')->with( 'status', $message );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock = Stock::find($id);
        return view('stock.viewstock', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttypes = Producttype::all();
        $stock = Stock::find($id);
        return view('stock.editstock', compact('stock', 'producttypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockRequest  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stocks = Stock::find($id);

        $request->validate( [
            'name' => 'required',
            'quantite' => 'required',
        ] );

        if($request->name == '1'){
            $unite = "Bouteilles";
        }elseif($request->name == '2'){
            $unite = "Boites";
        }else {
            $unite = "Litre";
        }

        if($request->name == 1){

            $inits = DB::select('select gaz from stock_inits');
            foreach ($inits as $init){
                $gazs = $init->gaz;
            }
            $gaze = $request->quantite - $stocks->quantite;
            if ($gazs-$gaze < 0){
                $message = "Impossible to make an exit 😔😔😔 !!";
            }else{
                DB::update('update stock_inits set gaz='. $gazs-$gaze.' where id=1');
                $stocks->name = $request->name;
                $stocks->quantite = $request->quantite;
                $stocks->description = $request->description;
                $stocks->unite = $unite;
            
                $stocks->update();
                $message = "The exiting product was successfully updated👌😎!!";
            }
            
        }elseif($request->name == 5){
            $inits = DB::select('select gazoil from stock_inits');
            foreach ($inits as $init){
                $gazoil = $init->gazoil;
            }
            $gazoile = $request->quantite - $stocks->quantite;
            if ($gazoil-$gazoile < 0){
                $message = "Impossible to make an exit 😔😔😔 !!";
            }else{
                DB::update('update stock_inits set gazoil='. $gazoil-$gazoile.' where id=1');
                $message = "The exiting product was successfully updated👌😎!!";
                $stocks->name = $request->name;
                $stocks->quantite = $request->quantite;
                $stocks->description = $request->description;
                $stocks->unite = $unite;
            
                $stocks->update();
            }
        }elseif($request->name == 2){
            $inits = DB::select('select lubrifiant from stock_inits');
            foreach ($inits as $init){
                $lubrifiant = $init->lubrifiant;
            }
            $lubrifiants = $request->quantite - $stocks->quantite;
            if ($lubrifiant-$lubrifiants < 0){
                $message = "Impossible to make an exit 😔😔😔 !!";
            }else{
                DB::update('update stock_inits set lubrifiant='. $lubrifiant-$lubrifiants.' where id=1');
                $stocks->name = $request->name;
                $stocks->quantite = $request->quantite;
                $stocks->description = $request->description;
                $stocks->unite = $unite;
            
                $stocks->update();
                $message = "The exiting product was successfully updated👌😎!!";
            }
            
        }elseif($request->name == 3){
            $inits = DB::select('select petrole from stock_inits');
            foreach ($inits as $init){
                $petrole = $init->petrole;
            }
            $petroles = $request->quantite - $stocks->quantite;
            if ($petrole - $petroles < 0){
                $message = "Impossible to make an exit 😔😔😔 !!";
            }else{
                DB::update('update stock_inits set petrole='. $petrole-$petroles.' where id=1');

                $stocks->name = $request->name;
                $stocks->quantite = $request->quantite;
                $stocks->description = $request->description;
                $stocks->unite = $unite;
            
                $stocks->update();
                $message = "The exiting product was successfully updated👌😎!!";
            }
        }else{
            $inits = DB::select('select super from stock_inits');
            foreach ($inits as $init){
                $super = $init->super;
            }
            $supers = $request->quantite - $stocks->quantite;
            if ($super-$supers < 0){
                $message = "Impossible to make an exit 😔😔😔 !!";
            }else{
                DB::update('update stock_inits set super='. $super-$supers.' where id=1');
                $stocks->name = $request->name;
                $stocks->quantite = $request->quantite;
                $stocks->description = $request->description;
                $stocks->unite = $unite;
            
                $stocks->update();
                $message = "The exiting product was successfully updated👌😎!!";
            }
        }
        
        return Redirect::to('stock')->with( 'status', $message );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($stock)
    {
        $stocks = Stock::find($stock);
        
        if($stocks->name == 1){

            $inits = DB::select('select gaz from stock_inits');
            foreach ($inits as $init){
                $gazs = $init->gaz;
            }
            $gaze = $stocks->quantite;
            DB::update('update stock_inits set gaz='. $gazs+$gaze.' where id=1');
        }elseif($stocks->name == 5){
            $inits = DB::select('select gazoil from stock_inits');
            foreach ($inits as $init){
                $gazoil = $init->gazoil;
            }
            $gazoile = $stocks->quantite;
            DB::update('update stock_inits set gazoil='. $gazoil+$gazoile.' where id=1');
        }elseif($stocks->name == 2){
            $inits = DB::select('select lubrifiant from stock_inits');
            foreach ($inits as $init){
                $lubrifiant = $init->lubrifiant;
            }
            $lubrifiants = $stocks->quantite;
            DB::update('update stock_inits set lubrifiant='. $lubrifiant-$lubrifiants.' where id=1');
        }elseif($stocks->name == 3){
            $inits = DB::select('select petrole from stock_inits');
            foreach ($inits as $init){
                $petrole = $init->petrole;
            }
            $petroles = $stocks->quantite;
            DB::update('update stock_inits set petrole='. $petrole-$petroles.' where id=1');
        }else{
            $inits = DB::select('select super from stock_inits');
            foreach ($inits as $init){
                $super = $init->super;
            }
            $supers = $stocks->quantite;
            DB::update('update stock_inits set super='. $super-$supers.' where id=1');
        }
        $stocks->delete();
        return Redirect::to('product')->with('status', 'The product was successfully deleted👌😎!!');
    }
}
