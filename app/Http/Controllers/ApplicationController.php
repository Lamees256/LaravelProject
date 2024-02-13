<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class ApplicationController extends Controller
{
    public function index(){
        $category=Category::where('status',1)->get();
        $posts = Post::where('status',1)->get();
        $slides = Post::where('status',1)->inRandomOrder()->take(6)->get();
        $oldPosts = Post::where('status',1)->orderBy('created_at','asc')->take(4)->get();
        $random= Post::where('status',1)->inRandomOrder()->take(5)->get();
        $randomCat=Category::with('Posts')->whereHas('Posts')->where('status',1)->inRandomOrder()->limit(2)->get();
        $randomCat2=Category::with('Posts')->whereHas('Posts')->where('status',1)->inRandomOrder()->limit(2)->get();
        return view('index',compact('category','posts','slides','oldPosts','random','randomCat','randomCat2'));
    }

    public function getByCats($id){
        $category=Category::where('status',1)->where('id',$id)->firstOrFail();
        return view('cats',compact('id','category'));
    }

    public function getPost($id){
        $post=Post::where('status',1)->where('id',$id)->firstOrFail();
        return view('post',compact('id','post'));
    }

    public function search(Request $request){
        $post=Post::where('status',1);
        if($request->cats !=null){
            $post->where('category_id',$request->cats);
        }
        if($request->search !=null){
            $post->where('title','like',"%".$request->search."%");
        }
        $posts=$post->orderBy('id','desc')->get();
        return view('search',compact('posts'));
    }

    public function show($id)
    {
        $cat=Category::where('status',1)->where('id',$id)->firstOrFail();
        if($cat){
            $post=Post::where('category_id',$id)->get();
            return view('index',compact('post','cat'));
        }
    //    $category = Category::findOrFail($id);
    
    //     if($category){
    //        $posts = Post::where('Category_id',$id)->get();
    
    //         return view('category.index', compact('posts'));
    //     }
    
    //     return view('errors.404');
    }
}
