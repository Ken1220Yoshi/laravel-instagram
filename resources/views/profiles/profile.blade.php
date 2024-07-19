@extends('layouts.app')

@section('title','Profile')
    
@section('content')
    <div class="row">
        <div class="col-8 mx-auto">
            @include('profiles.contents.header')
            <div class="post mt-5">
                <div class="row">
                    @forelse ($posts as $post )
                        <div class="col-4 p-0">
                            <a href="{{route('post.show',$post)}}" ><img src="{{$post->image}}" alt="" class="w-100 border border-1 border-white" style="height: 250px;width:auto;"></a>
                        </div>
                    @empty
                        <p>No Posts</p>
                        <a href="">Create a New Post</a>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection