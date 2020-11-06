<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class SearchController extends Controller
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

    public function index()
    {
        return view('admin.search');
    }

    public function action(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $posts=Post::where('title','LIKE','%'.$request->search."%")->orderBy('created_at', 'desc')->get();

            if($posts)
            {
                foreach ($posts as $key => $post) {
                     
                    $output.= '<div class = "list-group">'.
                '<div  class="list-group-item my-2 border border-grey">'.
                   ' <div class="row">'.
                       ' <div class="col-md-4 col-sm-4">'.
                            '<img src="/storage/cover_images/'.$post->cover_image.'" height="120px" alt="Cover Image">'.
                      '  </div>'.
                       ' <div class="col-md-8 col-sm-8">'.
                           ' <h3><a href="/posts/'.$post->id.'">'.$post->title.'</a></h3>'.
                            '<small>Written on '.$post->created_at.' by '.$post->user->name.'</small>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '</div>';
                }
                // $output.= $posts->links();
                return Response($output);
            }
        }
    }
     
     
}
