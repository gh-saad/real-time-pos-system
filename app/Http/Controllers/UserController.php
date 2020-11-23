<?php

namespace App\Http\Controllers;

//load models
use App\tbl_user;
use App\tbl_role;
use App\tbl_user_info;
use Illuminate\Http\Request;

//load Requests 
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = tbl_user::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = tbl_role::lists('role_name','id')->all(); 
        return view('users.create',compact('roles')); 
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        $user = tbl_user::create($input);
        $input['user_id'] = $user->id;
        tbl_user_info::create($input);
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = tbl_user::with('user_info')->findOrFail($id);
        $roles = tbl_role::lists('role_name','id')->all(); 
        return view('users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //
        $user = tbl_user::with('user_info')->findOrFail($id);

        $input = $request->all();
        $user = tbl_user::update($input);
        tbl_user_info::update($input);

        return redirect()(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return view('users.destroy');
    }
}
