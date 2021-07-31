<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Photo;
use App\Http\Requests\SupervisorCreateUserRequest;
use Illuminate\Http\Request;

class SupervisorUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('supervisor.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles_array = Role::pluck('role', 'id')->all();
        return view('supervisor.users.create', compact('roles_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupervisorCreateUserRequest $request)
    {
        if (trim($request->password) == '') {
            $user_data = $request->except('password');
        } else {

            $user_data = $request->all();

            $user_data['password'] = bcrypt($request->password);

            if ($file = $request->file('photo_id')) {

                $name = $file->getClientOriginalName() . time();
                $file->move('images', $name);

                $profile_photo = Photo::create(['path' => $name]);

                $user_data['photo_id'] = $profile_photo->id;
            }
            User::create($user_data);
            return redirect()->route('users.index');
        }
        // dd($request->file('photo_id'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
