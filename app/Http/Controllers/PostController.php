<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:Post access|Post create|Post view', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Post create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Post view', ['only' => ['view','show']]);
    }
    public function index()
    {
        return view("body.post.create_post");
    }
    public function create()
    {
    //   
    }
    public function view()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();

        return view('body.post.viewallposts',[
            'posts' => $posts,
        ]);
        
    }


    public function store(Request $request)
    {

        $request->validate([
            'post_title' => 'required|max:100',
            'post_description' => 'required',
            'post_slug' => 'required|max:100',
        ]);
        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;
    
            $post = new Post();
            $post->title = $request->post_title;
            $post->description = $request->post_description;
            $post->slug = $request->post_slug;
            $post->post_id = $userId;
            $post->save();
    
            return redirect(route('view-post'))->with("success", 'Added successfully');
        } else {
            return " you are not logged in ";
        }
    }
    

    public function show(string $id)
    {
        $post= Post::where('id',$id)->first();


        return view('body.post.showpost',[
            'post' => $post,
        ]);
    }

    public function edit(string $id)
    {
        $post= Post::where('id',$id)->first();

        return view('body.post.editpost',[
            'post' => $post,
        ]);
    }

    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'post_title' => 'required|max:100',
            'post_description' => 'required',
            'post_slug' => 'required|max:100',
        ]);
        $post= Post::where('id',$id)->update([

            'title'=>  $request->post_title,
            'description'=>  $request->post_description,
            'slug'=>  $request->post_slug,
        ]);
       
        return redirect(route('view-post'))->with("success", 'post Updated succesfully');


    }

 
    public function destroy(string $id)
    {

        $post = Post::find($id);

        if (!$post) {
            // Handle the case when the post is not found
            return redirect()->back()->with('error', 'Post not found');
        }
    
        $post->delete();
    
        return redirect(route('view-post'))->with('success', 'Post deleted successfully');
    }
}
