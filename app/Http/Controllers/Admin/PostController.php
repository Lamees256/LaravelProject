<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::where('status',1)->orderBy('id','desc')->get();
        return view('admin.post',compact('post'));
    }

    public function new()
    {
        $post=Post::where('status',0)->orderBy('id','asc')->get();
        return view('admin.post',compact('post'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $post=Post::findOrFail($id);
        return view('admin.post_view',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('admin.post_edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findOrFail($id);
        
        $request->validate([
            'name'=>'required',
            'category'=>'required',
            'short_description'=>'required',
            'description'=>'required',
        ]);
        $post->update([
            'title'=>$request->name,
            'category_id'=>$request->category,
            'short_description'=>$request->short_description,
            'description'=>$request->description
        ]);
        return back()->with(['message_success'=>'Post Successfully Updated']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post=Post::findOrFail($id)->delete();
        return back()->with(['message_success'=>'Post Deleted']);
    }
    public function publish($id)
    {
        $post=Post::findOrFail($id);
        $post->update([
            'status'=>1,
        ]);
        return redirect()->to(route('admin.post.new'));
    }
}
