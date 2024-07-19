<div class="card-footer bg-white">
    <div class="row align-items-center">
        <div class="col-auto">
            {{-- {{$post->like}} --}}
            @auth

                @if (!$post->isLikeByUser())
                    <form action="{{route('posts.like',$post->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn shadow-none">
                            <i class="fa-regular fa-heart icon-sm"></i>
                        </button>
                    </form>
                @else
                    <form action="{{route('posts.unlike',$post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn shadow-none">
                            <i class="fa-solid fa-heart icon-sm text-danger"></i>
                        </button>
                    </form>
                @endif
            @endauth

        </div>
        <div class="col-auto px-0">
            <!-- Modal trigger button -->
                <button
                type="button"
                class="border-0 bg-white fs-4"
                data-bs-toggle="modal"
                data-bs-target="#likeModal_{{$post->id}}"
                >
                {{$post->like->where('post_id',$post->id)->count()}}
                </button>
            @include('modal.like')
        </div>
        
        <div class="col text-end">
            {{-- {{$post}} --}}
            @if ($post->categoryPost->isEmpty())
            <span class="border border-1 bg-dark rounded px-1 text-light">Uncategorized</span>
            @else
                @forelse ($post->categoryPost as $category_post)
                {{-- {{$category_post}} --}}
                
                    @if ($category_post)
                        <span class="border border-1 bg-secondary rounded px-1 text-light"><a href="" class="text-decoration-none text-light">{{$category_post->category->name}}</a></span>
                    @else
                    @endif
                
                @empty
                    
                @endforelse
            @endif
            
        </div>
    </div>
    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
    &nbsp;
    <p class="d-inline fw-bold">{{ $post->description }}</p>
    <p class="text-muted small">{{ $post->created_at->diffForHumans() }}</p>
    
    
    <hr>

    <div class=" mt-2">
        
            
                
                
            <ul class="list-group ">
                @foreach($post->comment->take(3) as $comment)
                    <li class="list-group-item p-0 border-0 mb-2 bg-white">
                        <a href="#" class="text-decoration-none text-dark fw-bold">{{ $comment->user->name }}</a>
                        &nbsp;
                        <p class="d-inline">{{ $comment->body }}</p>
                        <form action="{{route('comment.destroy',$comment)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <span class="text-muted small">{{ $comment->created_at->diffForHumans() }}</span>
                            &middot;
                            @if ($comment->user->id == Auth::user()->id)
                                <button class="btn shadow-none small text-danger">Delete</button>
                            @endif
                        </form>
                    </li>
                @endforeach
                @if($post->comment->count() > 3)
                    <a href="{{route('post.show',$post)}}" class="text-decoration-none pb-2">View All {{$post->comment->count()}} comments</a>
                @endif
            </ul>
        
    </div>

    <form action="{{route('comment',$post)}}" method="post">
        @csrf
        <div class="input-group">
            <textarea name="body" id="body" cols="30" rows="1" class="form-control" placeholder="Add a comment..."></textarea>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <button type="submit" class="btn btn-outline-secondary">Post</button>
        </div>
    </form>
    
</div>