<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    private $post;
    private $category;

    public function __construct(Post $post, Category $category){
        $this->post = $post;
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();

        

        return view('posts.create')
                    ->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->post->user_id = auth()->user()->id;
        $this->post->description = $request->description;
        $this->post->image = 'data:image/'.$request->image->extension().';base64,'.base64_encode(file_get_contents($request->image));
        $this->post->save();

        $category_post = [];
        // re coding, re writing the index array turning it into associative array
        foreach($request->category as $category_id):
            $category_post[] = ["category_id" => $category_id];
        endforeach;

        $this->post->categoryPost()->createMany($category_post);
 
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        

        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::all();

        // $posts = Post::findOrFail($post);

        return view('posts.edit')
                    ->with('categories',$categories)
                    ->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $post = $this->post->findOrFail($id);
        $post->description = $request->description;
        if($request->hasFile('image')){
            $post->image = 'data:image/'.$request->image->extension().';base64,'.base64_encode(file_get_contents($request->image));    
        }
        $post->save();
        $post->categoryPost()->delete();
        // 選択されたカテゴリーを更新
        // $post->categoryPost()->sync($request->input('category', []));
        

        $category_post = [];
        // re coding, re writing the index array turning it into associative array
        foreach($request->category as $category_id):
            $category_post[] = ["category_id" => $category_id];
        endforeach;

        $post->categoryPost()->createMany($category_post);

        return redirect()->route('show',$post);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect()->route('index');
    }
}
