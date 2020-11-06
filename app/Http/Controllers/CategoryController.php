<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Category;

class CategoryController extends Controller
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

        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.categories.index')->with('categories', $categories);
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        if(auth()->user() == null){
            return redirect('/login')->with('error' , 'Unauthorized action');   
        }

        //Create Post
        $category = new Category;
        $category->name = $request->input('name');
        $category->save();

        return redirect('/categories')->with('success', 'Category Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        if(auth()->user() == null ){
         return redirect('/login')->with('error' , 'Unauthorized action');   
        }
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.categories.index')->with('edit' , $category)->with('categories', $categories );
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
            'name' => 'required'
        ]);

        if(auth()->user() == null){
            return redirect('/login')->with('error' , 'Unauthorized action');   
        }

        $category = Category::find($id);
        $category->name = $request->input('name');
        
        $category->save();
        return redirect('/categories')->with('success', 'Category Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(auth()->user() == null){
            return redirect('/login')->with('error' , 'Unauthorized action');   
           }
  
        $category->delete();
        return redirect('/categories')->with('success', 'Category Deleted Successfully!');
    }
}
