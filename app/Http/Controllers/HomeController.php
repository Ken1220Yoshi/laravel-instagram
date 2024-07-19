<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\CategoryPost;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $post;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $show_posts = $this->showPost();

        $all_users = User::latest()->get();

        $suggested_users = $this->suggestedUsers();

        

       

        // $comments = Post::comments()->latest()->take(3)->get();

        return view('users.home')
                    ->with('show_posts',$show_posts)
                    ->with('all_users',$all_users)
                    ->with('suggested_users',$suggested_users);
                    
    }

    public function suggestedUsers(){
        $users = User::all()->except(Auth::id());

        $suggested_users = [];

        foreach($users as $user):
            if(!$user->isFollowed()):
                $suggested_users[] = $user;
            endif;

        endforeach;

        return $suggested_users;

    }

    public function showPost(){
        $all_post = Post::latest()->get();

        $show_post = [];

        foreach($all_post as $post):
            if($post->user->isFollowed() || $post->user->id === Auth::id()):
                $show_post[] = $post;
            endif;
        endforeach;

        return $show_post;
    }

    public function search(Request $request){

        $search = $request->search;

        $profiles = User::where('name','LIKE',"%{$search}%")->get();

        return view('users.search')->with('profiles',$profiles)
                                    ->with('search',$search);
    }

    public function suggestions(){
        $suggested_users = $this->suggestedUsers();

        return view('users.suggested-users')->with('suggested_users',$suggested_users);
    }
}
