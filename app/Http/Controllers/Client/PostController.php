<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Images;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('client_id', Auth::id())->orderby('id', 'desc')->get();
        return view('client.post', compact('posts'));
    }

    public function create()
    {
        $category = Category::all();
        return view('client.post_create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:191',
            'category' => 'required|exists:categories,id',
            'short_description' => 'required|max:160',
            'description' => 'required',
            'images.*' => 'required|image',
        ]);
        $post = Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'client_id' => Auth::id(),
            'status' => 0,
        ]);
        foreach ($request->images as $key => $value) {
            $path = public_path() . '/post/' . $post->id . '/images/';
            if (!file_exists($path)) {
                mkdir($path, 077, true);
            }
            $file_name_path = Str::random(10) . '.' . $value->extension();
            $file_name = $value->getClientOriginalName();
            $value->move($path, $file_name_path);
            $post->Images()->create([
                'name' => $file_name,
                'path' => '/post/' . $post->id . '/images/' . $file_name_path,
            ]);
        }
        return back()->with(['message_success' => 'New Post Created']);
    }

    public function delete($id)
    {
        $post = Post::where('client_id', Auth::id())->where('id', $id)->first();
        if ($post != null) {
            $path_1 = public_path() . '/post/' . $post->id . '/images/';
            $path_2 = public_path() . '/post/' . $post->id;
            if (file_exists($path_1)) {
                foreach ($post->Images()->get() as $key => $value) {
                    unlink(public_path($value->path));
                }
                rmdir($path_1);
                rmdir($path_2);
            }
        }
        $post->delete();
        return back()->with(['message_success' => 'Post Deleted']);
    }

    public function view($id)
    {
        $post = Post::where('client_id', Auth::id())->where('id', $id)->firstOrFail();
        return view('client.post_view', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::where('client_id', Auth::id())->where('id', $id)->firstOrFail();
        $category = Category::all();
        return view('client.post_edit', compact('post', 'category'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:191',
            'category' => 'required|exists:categories,id',
            'short_description'=>'required',
            'description'=>'required',
             'images.*' => 'required|image',
        ]);

        $post = Post::where('id', $id)->firstOrFail();
        $post->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            // 'status' => 0,
        ]);
        if ($request->has('files')) {
            foreach ($post->Images()->whereNotIn('id', $request['files'])->get() as $key => $value) {
                if (file_exists(public_path($value->path))) {
                    unlink(public_path($value->path));
                }
                $value->delete();
            }
        } else {
            foreach ($post->Images()->get() as $key => $value) {
                if (file_exists(public_path($value->path))) {
                    unlink(public_path($value->path));
                }
                $value->delete();
            }
        }
        if (is_array($request->images)) {
            foreach ($request->images as $value) {
                $path = public_path() . '/post/' . $post->id . '/images/';
                if (!file_exists($path)) {
                    mkdir($path, 077, true);
                }
                $file_name_path = Str::random(10) . '.' . $value->extension();
                $file_name = $value->getClientOriginalName();
                $value->move($path, $file_name_path);
                $post->Images()->create([
                    'name' => $file_name,
                    'path' => '/post/' . $post->id . '/images/' . $file_name_path,
                ]);
            }
        }

        return back()->with(['message_success' => 'Post Updated']);
    }
}
