<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserRoleController extends Controller
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
        $rus = UserRole::all();
        return view('role_user.roleuser', compact( 'rus' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();

        return view('role_user.newroleuser', compact('users', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'user_id' => 'required',
            'role_id' => 'required',
        ] );

        $data = [
            'user_id' => $request->user_id,
            'role_id' => $request->role_id
        ];

        UserRole::create($data);

        DB::table('role_user')->insert([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return Redirect::to('role-user')->with( 'status', 'User role has created with success 👌😎!!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rus = UserRole::find($id);

        return view('role_user.viewroleuser', compact('rus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rus = UserRole::find( $id );
        $users = User::all();
        $roles = Role::all();
        return view('role_user.editroleuser', compact('rus','users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('role_user')->where('id', '=', $id)->update([
            'user_id' => $request->user_id,
            'role_id' => $request->role_id,
            'updated_at' => Carbon::now()
        ]);
        $rus = UserRole::find($id);
        $rus->user_id = $request->user_id;
        $rus->role_id = $request->role_id;
        $rus->save();

        return Redirect::to('role-user')->with( 'status', 'Updated Successfully👍👍!!' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('role_user')->where('id', $id)->delete();

        $rus = UserRole::find( $id );
        $rus->delete();

        return Redirect::to('role-user')->with( 'status', 'Deleted Successfully👍👍!!' );
    }
}
