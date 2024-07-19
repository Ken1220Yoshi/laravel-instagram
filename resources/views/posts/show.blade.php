@extends('layouts.app')

@section('title','Show Post')
    
@section('content')
   
        <div class="row border border-1" style="height: 100%">
            <div class="col-8 p-0">
                <img src="{{$post->image}}" alt="" class="w-100">
            </div>
            <div class="col-4 p-0 bg-white border border-start-1" >
                {{-- <div class="header border border-1 w-100" style="height: 70px"> --}}
                    <div class="row align-items-center pt-3 w-100" style="height: 50px">
                        <div class="col-1 ps-4">
                            <a href="{{route('profile.show',$post->user->id)}}">
                                @if ($post->user->avatar)
                                    <img src="{{$post->user->avatar}}" alt="#" class="rounded-circle avatar-sm" width="35px" height="35px">
                                @else
                                    <i class="text-secondary fa-solid fa-circle-user icon-sm text-secondary"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col ps-4">
                            <a href="{{route('profile.show',$post->user->id)}}" class="text-decoration-none text-dark">
                                <h6 class="mt-2 ms-2">{{$post->user->name}}</h6>
                            </a>                            
                        </div>
                        <div class="col text-end">
                            <div class="dropdown">
                                <button class="btn btn-sm shadown-none" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                
                                <div class="dropdown-menu dropdown-mune-end">
                                    @if (Auth::id() == $post->user_id)
                                        <a href="{{route('post.edit',$post)}}" class="dropdown-item">
                                            <i class="fa-solid fa-pen-to-square "></i> Edit
                                        </a>
                                        <button type="button"  class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#postModal_{{ $post->id }}"   >
                                            <i class="fa-solid fa-trash-can "></i> Delete
                                        </button>
                                        
                                    @else
                                        <button type="button" class="dropdown-item text-danger" >
                                            Unfollow
                                        </button>
                                    @endif
                                    
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                {{-- </div> --}}
                <hr>
                <div class="row align-items-center px-2">
                    <div class="col-auto">
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
                        <span class="h4">{{$post->like->where('post_id',$post->id)->count()}}</span>
                    </div>
                    
                    <div class="col text-end">
                        {{-- {{$post}} --}}
                        @forelse ($post->categoryPost as $category_post)
                        {{-- {{$category_post}} --}}
                                <span class="border border-1 bg-secondary rounded px-1 text-light"><a href="" class="text-decoration-none text-light">{{$category_post->category->name}}</a></span>
                        
                        @empty
                            
                        @endforelse
                    </div>
                </div>
                <a href="#" class="text-decoration-none text-dark fw-bold ms-3">{{ $post->user->name }}</a>
                &nbsp;
                <p class="d-inline fw-bold">{{ $post->description }}</p>
                <p class="text-muted small ms-3">{{ $post->created_at->diffForHumans() }}</p>
                
                <form action="{{route('comment',$post)}}" method="post">
                    @csrf
                    <div class="input-group px-3">
                        <textarea name="body" id="body" cols="30" rows="1" class="form-control" placeholder="Add a comment..."></textarea>
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button type="submit" class="btn btn-outline-secondary">Post</button>
                    </div>
                </form>
                <ul class="list-group px-3 mt-2" style="overflow: auto; max-height:250px">
                    @foreach ($post->comment as $comment)
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

                </ul>
                

            </div>
        </div>
        {{-- Modal --}}
                        
        <div class="modal fade" id="postModal_{{ $post->id }}" tabindex="-1" aria-labelledby="postModalLabel_{{ $post->id }}l" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border border-danger">
                        <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel"><i class="fa-solid fa-circle-exclamation"></i> Delete Post</h1>
                    </div>
                    <div class="modal-body">
                    <p>Are you sure you want to delete this post?</p>
                    <img src="{{$post->image}}"  alt="" class="w-25">
                    <p>{{$post->description}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                        <form  action="{{route('post.destroy', $post)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
@endsection