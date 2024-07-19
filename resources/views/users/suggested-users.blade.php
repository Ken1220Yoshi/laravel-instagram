@extends('layouts.app')

@section('title','Suggested Users')
    
@section('content')
    <div class="container w-50">
        <h4>Suggested</h4>
        @forelse ($suggested_users as $profile)
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
                    
                        <form action="{{route('follow.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="following_id" value="{{$profile->id}}">
                            <button type="submit" class="btn btn-outline-primary">Follow</button>

                        </form>
                    
                </div>
            </div>
        @empty
            
        @endforelse
    </div>
@endsection