<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class ProfileController extends Controller
{
    //
    private $profile;

    public function __construct(User $user){
        $this->profile = $user;
    }

    public function index(){
        $profile = Auth::user();

        $posts = $profile->posts;

        $postCount = $posts->count();

        return view('profiles.profile')
                    ->with('profile',$profile)
                    ->with('posts',$posts)
                    ->with('postCount',$postCount);
    }

    public function edit(User $profile){

        return view('profiles.edit')->with('profile',$profile);
    }

    public function update(Request $request, User $profile){
        
        $profile->name = $request->name;
        $profile->email = $request->email;
        if($request->image){
            $profile->avatar = 'data:image/'.$request->image->extension().';base64,'.base64_encode(file_get_contents($request->image));
        }
        $profile->introduction = $request->introduction;
        $profile->save();


        return redirect()->route('profile.show',$profile->id);
    }

    public function show($id){
        $profile = $this->profile->findOrFail($id);

        $posts = $profile->posts;

        $postCount = $posts->count();

        

        return view('profiles.profile')
                    ->with('profile',$profile)
                    ->with('posts',$posts)
                    ->with('postCount',$postCount);

    }

    public function followers($id){
        $profile = $this->profile->findOrFail($id);

        return view('profiles.follower')->with('profile',$profile);
    }

    public function following($id){
        $profile = $this->profile->findOrFail($id);

        return view('profiles.following')->with('profile',$profile);
    }


    
   
}
