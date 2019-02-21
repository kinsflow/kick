<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin/posts/index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all(['id', 'name']);
        return view('admin/posts/create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id'))
        {
            $file_name = time() . $file->getClientOriginalName();
            $file->move('images/', $file_name);
            $upload = Photo::create(['file_path' => $file_name]);
            $input['photo_id'] = $upload->id;
            $input['user_id'] = $user;
            $input['category_id'] = $request->category_id;
        }
        $user->post()->create($input);
        return redirect('admin/posts');
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
        $category = Category::pluck('name', 'id');
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'category'));
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
        $input = $request->all();
        $input = $request->except(['_token']);
        $user = Auth::user();
        $post = Post::find($id);
        if($file = $request->file('photo_id'))
        {
            $file_name = time() . $file->getClientOriginalName();
            $file->move('images/', $file_name);
            $upload = Photo::create(['file_path' => $file_name]);
            $input['photo_id'] = $upload->id;

            $input['category_id'] = $request->category_id;
        }

        $post->update($input);
        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . "/images/" . $post->photo->file_path);
        $post->delete();
        Session::flash('message', 'A post has been deleted');

        return redirect('/admin/posts');
    }
}
