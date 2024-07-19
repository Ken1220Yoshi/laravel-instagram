<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryPost;
use App\Models\Post;

class CategoriesController extends Controller
{
    //
    private $category;

    public function __construct(Category $category, CategoryPost $categoryPost){
        $this->category = $category;
        $this->categoryPost = $categoryPost;
    }

    public function index(){

        $all_categories = Category::latest()->get();

        $all_posts = Post::latest()->get();

        $uncategorized_post = 0;
        foreach($all_posts as $post){
            if($post->categoryPost->count() == 0){
                $uncategorized_post++;
            }
        }

        


        return view('admin.categories.index')
                    ->with('all_categories',$all_categories)
                    ->with('uncategorized_post',$uncategorized_post);
                    
    }

    

    public function store(Request $request){
        $this->category->name = $request->category;
        $this->category->save();

        return redirect()->back();
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);

        $category->name = $request->category;
        $category->save();

        return redirect()->back();
    }

    public function destroy(Category $category){
        $category->delete();

        return redirect()->back();

        
    }
}
