<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    //
    public function index(){

        $all_posts = Post::withTrashed()->latest()->paginate(3);

        return view('admin.posts.index')
                    ->with('all_posts',$all_posts);
    }

    public function delete($id){
        $post = Post::findOrFail($id);

        $post->delete();

        return redirect()->back();
    }

    public function restore($id){
        $post = Post::withTrashed()->findOrFail($id);

        $post->restore();

        return redirect()->back();
    }
}
