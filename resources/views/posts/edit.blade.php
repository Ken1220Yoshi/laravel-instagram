@extends('layouts.app')

@section('title','Edit Post')
    
@section('content')
    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row mb-2">
            <div class="col">
                <label for="" class="form-label">Category (up to 3)</label><br>   
                    @forelse ($categories as $category)
                        <input type="checkbox" class="form-check-inline form-check-input me-0"   name="category[]" id="{{$category->id}}" value="{{ $category->id }}" 
                        @forelse ($post->categoryPost as $category_post)
                            @if ($category->id === $category_post->category_id)
                            checked
                            @else
                            @endif
                        @empty 
                        @endforelse
                        >
                        <label for="{{$category->name}}" class="form-check-label me-2">{{$category->name}}</label>
                    @empty
                    @endforelse
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="What's on your mind?" required>{{$post->description}}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="" class="form-label">Image</label><br>
                <img src="{{$post->image}}" alt="" class="w-25 mb-2 border border-1">
                <input type="file" class="form-control" name="image"  >
                <label for="">The accetable formats are jpeg,png, and gif only.</label>
                <br>
                <label for="">Max file size is 1048kb.</label>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary px-5">Post</button>
            </div>
        </div>
    </form>
@endsection