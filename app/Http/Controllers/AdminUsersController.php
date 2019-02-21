<?php

namespace App\Http\Controllers;

use App\Http\Requests\userRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Nexmo\Client\Exception\Validation;

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
        $roles = Role::all(['name', 'id']);
        return view('admin.users.edit' , compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
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
        return 'not working';


    }
#


    public function dropzone($id, Request $request)
    {
        $user = User::findOrFail($id);
        if($request->file)
        {
            $validation = $request->validate([
                'file' => 'required|image|mimes:jpg,jpeg,gif,png|max:2048'
            ]);

            if($validation)
            {
                $file = $request->file('file');
                $file_name = time() . $file->getClientOriginalName();
                $file->move('images/'  , $file_name );
                $upload = Photo::create(['file_path' => $file_name]);
                $input = $upload->id;
                $user->update([
                    'photo_id' => $input
                ]);
            }else
            {
                return 'not working';

            }

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
        $user = User::findOrFail($id);
        unlink(public_path() . "/images/" . $user->photo->file_path);
        $user->delete();
        Session::flash('message', 'A user has been deleted');
        return redirect('/admin/users');
    }
}
