<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = Role::pluck('name', 'id');
        return view('admin.users.create', compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {
        $input = $request->all();

        if($request->photo_id)
        {
            $file = $request->file('photo_id');
            $file_name = time() . $file->getClientOriginalName();
            $file->move('images/'  , $file_name );
            $upload = Photo::create(['file_path' => $file_name]);
            $input['photo_id'] = $upload->id;

        }
        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
            'is_active' => $request->status,
            'password' => bcrypt($request->password),
            'photo_id' => $input['photo_id'],

        ]);
        if($users)
        {
            return redirect('admin/users');
        }
        return 'couldn\'t create user';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit' , compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();

        if($request->photo_id)
        {
            $file = $request->file('photo_id');
            $file_name = time() . $file->getClientOriginalName();
            $file->move('images/'  , $file_name );
            $upload = Photo::create(['file_path' => $file_name]);
            $input['photo_id'] = $upload->id;

        }
        $user->update($input);
        if($user->update($input)){
            return redirect()->back();
        }


    }
#


    public function dropzone($id, Request $request)
    {
        $user = User::findOrFail($id);
        if($request->file)
        {
            $file = $request->file('file');
            $file_name = time() . $file->getClientOriginalName();
            $file->move('images/'  , $file_name );
            $upload = Photo::create(['file_path' => $file_name]);
            $input = $upload->id;
            $user->update([
                'photo_id' => $input
            ]);
        }




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
