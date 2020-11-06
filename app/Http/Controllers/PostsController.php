<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $allcategories = Category::all();
        return view('admin.posts.index')->with('posts', $posts)->with('allcategories', $allcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->get(['id', 'name']);
       return view('admin.posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        //Handle File Upload
        if($request->hasFile('cover_image')){
            //Get File name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get Just File name
            $fileName = pathinfo( $fileNameWithExt, PATHINFO_FILENAME);
            $fileName = preg_replace("/[^a-z0-9\_\-\.\"?*<>:+\s+]/i", '', $fileName);
            //Get just extension
            $extension =  $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Store File
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.png';
        }

        //Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;

        $post->save();
        //dd($request);
        $categories = $request->get('category');
        //dd($categories);
        $selected_items = array();
        foreach($categories as $item){
            //dd($item);
           
           array_push($selected_items, $item);
        }
        //print_r($selected_items);
        //die();
        $category = Category::find($selected_items);
        //dd($category);
        $post->categories()->attach($category);

        return redirect('/posts')->with('success', 'Post Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
      
        return view('admin.posts.show')->with('post' , $post);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::orderBy('id', 'desc')->get(['id', 'name']);
        if(auth()->user()->id !== $post->user_id){
         return redirect('/posts')->with('error' , 'Unauthorized action');   
        }
        
        return view('admin.posts.edit')->with('post' , $post)->with('categories', $categories);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

          //Handle File Upload
          if($request->hasFile('cover_image')){
            //Get File name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get Just File name
            $fileName = pathinfo( $fileNameWithExt, PATHINFO_FILENAME);
            $fileName = preg_replace("/[^a-z0-9\_\-\.\"?*<>:+]\s+/i", '', $fileName);
            //Get just extension
            $extension =  $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Store File
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();

        $categories = $request->get('category');
        $selected_items = array();

        foreach($categories as $item){
           array_push($selected_items, $item);
        }
       
        $category = Category::find($selected_items);
        $post->categories()->detach();
        $post->categories()->attach($category);

        return redirect('/posts')->with('success', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error' , 'Unauthorized action');   
           }
        if($post->cover_image != 'noimage.png'){
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted Successfully!');
    }
}
