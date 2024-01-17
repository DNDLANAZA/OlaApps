<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $countgazs = DB::select('select gaz as gaz from stock_inits where id = 1');
        $countgazoils = DB::select('select gazoil as gazoil from stock_inits where id = 1');
        $countlubrifs = DB::select('select lubrifiant as lubrif from stock_inits where id = 1');
        $countpetrols = DB::select('select petrole as petrol from stock_inits where id = 1');
        $countsupers = DB::select('select super as super from stock_inits where id = 1');

        return view('home', compact('countgazs','countlubrifs','countpetrols','countsupers','countgazoils'));
    }
}
