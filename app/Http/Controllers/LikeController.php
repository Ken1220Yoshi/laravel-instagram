<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    private $like;

    public function __construct(Like $like){
        $this->like = $like;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
      //
        $this->like->user_id = Auth::id();
        $this->like->post_id = $id;
        $this->like->save();
        
        return back();
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $this->like->where('user_id',Auth::id())->where('post_id',$id)->delete();

        return back();
    }
}
