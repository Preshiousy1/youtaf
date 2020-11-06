<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use  App\Setting;


class PagesController extends Controller
{
    public function index(){
        $setting = Setting::find(1);
        $posts = Post::orderBy('created_at', 'desc')->limit('2')->paginate(2);
        return view('pages.index')->with('posts', $posts)->with('setting', $setting);
    }

    public function about(){
        return view('pages.about');
    }

    
    public function services(){
        return view('pages.services');
    }
    public function blog(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $allcategories = 'App\Category'::all();
        return view('pages.blog')->with('posts', $posts)->with('allcategories' , $allcategories);
        
    }
    
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;
        $categories = $post->categories;
        $allcategories = 'App\Category'::all();
        return view('pages.single')->with('post' , $post)->with('comments' , $comments)->with('categories' , $categories)->with('allcategories' , $allcategories);
        
    }
    public function showCategory($id)
    {
        
        $category = Category::find($id);
        $posts = $category->posts()->latest()->paginate(5);
        $allcategories = Category::all();
        //dd($posts);

        if(auth()->user() == null){
         return view('pages.category')->with('posts' , $posts)->with('category', $category)->with('allcategories', $allcategories);
  
        }


      
        return view('pages.category')->with('posts' , $posts)->with('category', $category)->with('allcategories', $allcategories);
    }




}
