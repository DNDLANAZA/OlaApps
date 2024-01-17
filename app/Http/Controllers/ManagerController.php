<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ManagerController extends Controller
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
        $users = User::all();

        // return view('superadmin.users.user', compact('users'));
        // $managers = Manager::all();
        // $managers = Manager::orderBy('id', 'DESC')->get();

        return view('manager.manager', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.newmanager');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreManagerRequest  $request
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

        // Manager::create($empData);
        User::create($empData);

        return Redirect::to('manager')->with( 'status', 'The user was successfully created👌😎!!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($manager);
        // $manager = Manager::find($id);
        $user = User::find($id);
        return view('manager.viewmanager', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $manager = Manager::find($id);
        $user = User::find($id);
        return view('manager.editmanager', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManagerRequest  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $managers = Manager::find($id);
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return Redirect::to('manager')->with( 'status', 'The user was successfully updated👌😎!!' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $users = User::find($user);
        $users->delete();
        return Redirect::to('manager')->with('status', 'The user was successfully deleted👌😎!!');
    }
}
