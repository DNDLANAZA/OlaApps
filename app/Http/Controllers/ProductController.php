<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use App\Models\Producttype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $producttypes = Producttype::all();
        $products = Product::all();
        $products = Product::orderBy('datecreation', 'DESC')->get();

        return view('product.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producttypes = Producttype::all();
        return view('product.newproduct', compact('producttypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = Product::count('name');
        // $count += $count+1;
        $request->validate( [
            'name' => 'required|string',
            'quantite' => 'required',
            'fournisseur' => 'required',
            'fichier' => 'required|mimes:xls,pdf,xlsx',
        ] );
        if($request->name == '1'){
            $unite = "Bouteilles";
        }elseif($request->name == '2'){
            $unite = "Boites";
        }else {
            $unite = "Litre";
        }
        // $file = $request->file('fichier');
        // $fileName =  time() . '.' . $file->getClientOriginalExtension();
        // $file->move('Documents', $fileName);

        if ( ( $request->file( 'fichier' ) ) ) {
            $file1 = $request->file( 'fichier' );
            $imageName1 = $file1->getClientOriginalName();
            $file1->move( public_path( 'Documents' ), $count.$imageName1 );

            if($request->name == 1){
                $inits = DB::select('select gaz from stock_inits');
                foreach ($inits as $init){
                    $gaz = $init->gaz;
                }
                DB::update('update stock_inits set gaz='. $gaz+$request->quantite.' where id=1');
            }elseif($request->name == 5){
                $inits = DB::select('select gazoil from stock_inits');
                foreach ($inits as $init){
                    $gazoil = $init->gazoil;
                }
                DB::update('update stock_inits set gazoil='. $gazoil+$request->quantite.' where id=1');
            }elseif($request->name == 2){
                $inits = DB::select('select lubrifiant from stock_inits');
                foreach ($inits as $init){
                    $lubrifiant = $init->lubrifiant;
                }
                DB::update('update stock_inits set lubrifiant='. $lubrifiant+$request->quantite.' where id=1');
            }elseif($request->name == 3){
                $inits = DB::select('select petrole from stock_inits');
                foreach ($inits as $init){
                    $petrole = $init->petrole;
                }
                DB::update('update stock_inits set petrole='. $petrole+$request->quantite.' where id=1');
            }else{
                $inits = DB::select('select super from stock_inits');
                foreach ($inits as $init){
                    $super = $init->super;
                }
                DB::update('update stock_inits set super='. $super+$request->quantite.' where id=1');
            }
            
            
            Product::create( [
                'name' => $request->name,
                'quantite' => $request->quantite,
                'datecreation' => Carbon::now(),
                'fichier' =>$count.$imageName1,
                'fournisseur' => $request->fournisseur,
                'unite' => $unite,
            ] );

        }

        return Redirect::to('product')->with( 'status', 'The product was successfully created👌😎!!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.viewproduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producttypes = Producttype::all();
        $product = Product::find($id);
        return view('product.editproduct', compact('product', 'producttypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::find($id);

        $request->validate( [
            'name' => 'required|string',
            'quantite' => 'required',
            'fournisseur' => 'required',
            'fichier' => 'mimes:xls,pdf,xlsx',
        ] );

        if($request->name == '1'){
            $unite = "Bouteilles";
        }elseif($request->name == '2'){
            $unite = "Boites";
        }else {
            $unite = "Litre";
        }


        if ( ( $request->file( 'fichier' ) ) ) {

            $destination1 = 'Documents/'.$products->fichier;

            if ( File::exists( $destination1 ) ) {

                File::delete( $destination1 );
                // File::deleteDirectory( 'Documents/'.$products->fichier );
            }
            $count = $id - 1;
            $file1 = $request->file( 'fichier' );
            $imageName1 = $file1->getClientOriginalName();
            $file1->move( public_path( 'Documents' ), $count.$imageName1 );
            $products->fichier = "".$count."".$imageName1;
            
        }
        
        if($request->name == 1){

            $inits = DB::select('select gaz from stock_inits');
            foreach ($inits as $init){
                $gazs = $init->gaz;
            }
            $gaze = $request->quantite - $products->quantite;
            DB::update('update stock_inits set gaz='. $gazs+$gaze.' where id=1');
        }elseif($request->name == 5){
            $inits = DB::select('select gazoil from stock_inits');
            foreach ($inits as $init){
                $gazoil = $init->gazoil;
            }
            $gazoile = $request->quantite - $products->quantite;
            DB::update('update stock_inits set gazoil='. $gazoil+$gazoile.' where id=1');
        }elseif($request->name == 2){
            $inits = DB::select('select lubrifiant from stock_inits');
            foreach ($inits as $init){
                $lubrifiant = $init->lubrifiant;
            }
            $lubrifiants = $request->quantite - $products->quantite;
            DB::update('update stock_inits set lubrifiant='. $lubrifiant+$lubrifiants.' where id=1');
        }elseif($request->name == 3){
            $inits = DB::select('select petrole from stock_inits');
            foreach ($inits as $init){
                $petrole = $init->petrole;
            }
            $petroles = $request->quantite - $products->quantite;
            DB::update('update stock_inits set petrole='. $petrole+$petroles.' where id=1');
        }else{
            $inits = DB::select('select super from stock_inits');
            foreach ($inits as $init){
                $super = $init->super;
            }
            $supers = $request->quantite - $products->quantite;
            DB::update('update stock_inits set super='. $super+$supers.' where id=1');
        }
        
        $products->name = $request->name;
        $products->quantite = $request->quantite;
        $products->datecreation = Carbon::now();
        $products->fournisseur = $request->fournisseur;
        $products->unite = $unite;
        
        $products->update();
        return Redirect::to('product')->with( 'status', 'The product was successfully updated👌😎!!' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        // dd($product);
        $products = Product::find($product);
        $destination1 = 'Documents/'.$products->fichier;
        // dd("'".$products->fichier."'");
        if ( File::exists( $destination1 ) ) {
            File::delete( $destination1 );
        }
        if($products->name == 1){

            $inits = DB::select('select gaz from stock_inits');
            foreach ($inits as $init){
                $gazs = $init->gaz;
            }
            $gaze = $products->quantite;
            DB::update('update stock_inits set gaz='. $gazs-$gaze.' where id=1');
        }elseif($products->name == 5){
            $inits = DB::select('select gazoil from stock_inits');
            foreach ($inits as $init){
                $gazoil = $init->gazoil;
            }
            $gazoile = $products->quantite;
            DB::update('update stock_inits set gazoil='. $gazoil-$gazoile.' where id=1');
        }elseif($products->name == 2){
            $inits = DB::select('select lubrifiant from stock_inits');
            foreach ($inits as $init){
                $lubrifiant = $init->lubrifiant;
            }
            $lubrifiants = $products->quantite;
            DB::update('update stock_inits set lubrifiant='. $lubrifiant-$lubrifiants.' where id=1');
        }elseif($products->name == 3){
            $inits = DB::select('select petrole from stock_inits');
            foreach ($inits as $init){
                $petrole = $init->petrole;
            }
            $petroles = $products->quantite;
            DB::update('update stock_inits set petrole='. $petrole-$petroles.' where id=1');
        }else{
            $inits = DB::select('select super from stock_inits');
            foreach ($inits as $init){
                $super = $init->super;
            }
            $supers = $products->quantite;
            DB::update('update stock_inits set super='. $super-$supers.' where id=1');
        }
        $products->delete();
        return Redirect::to('product')->with('status', 'The product was successfully deleted👌😎!!');
    }

    function download( $file ) {

        $sites = Product::find( $file );

        $fileName = $sites->fichier;

        return response()->download( public_path('Documents/'. $fileName ) );
    }
}
