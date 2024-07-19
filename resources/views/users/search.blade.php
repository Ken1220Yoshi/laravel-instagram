@extends('layouts.app')

@section('title','Search')
    
@section('content')
    <div class="container ms-auto w-50">
        <h5>Search results for "{{$search}}"</h5>

        @forelse ($profiles as $profile)
            <div class="row mt-3 align-middle">
                <div class="col-2 mx-auto">
                    <a href="{{route('profile.show',$profile->id)}}" class="text-decoration-none">
                        @if ($profile->avatar)
                            <img src="{{$profile->avatar}}" alt="#" class="rounded-circle avatar-sm" width="57.6px" height="57.6px">
                        @else
                            <i class="fa-solid fa-circle-user fa-4x text-secondary"></i>
                        @endif
                    </a>
                </div>
                <div class="col-6 mt-1">
                    <span><a href="{{route('profile.show',$profile->id)}}" class="text-decoration-none text-dark">{{$profile->name}}</a></span>
                    <br>
                    <span class="text-secondary">{{$profile->email}}</span>
                </div>
                <div class="col-4 mt-2">
                    @if ($profile->id == Auth::id())
                        
                    @elseif ($profile->isFollowed())
                        <form action="{{route('follow.destroy',$profile->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ">Unfollow</button>
                        </form>
                    @else
                        <form action="{{route('follow.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="following_id" value="{{$profile->id}}">
                            <button type="submit" class="btn btn-outline-primary">Follow</button>

                        </form>
                    @endif
                </div>
            </div>
        @empty
            
        @endforelse
    </div>
@endsection