@extends('layouts.app')

@section('title','Profile')
    
@section('content')
    <div class="row">
        <div class="col-8 mx-auto">
            @include('profiles.contents.header')
            
           
                <div class="row mt-5">
                    <h3 class="text-center">Following</h3>
                    <div class="col-8 mx-auto ">
                        @forelse ($profile->followings as $follow)
                        <div class="row mt-3">
                            <div class="col-4 text-end">
                                <a href="{{route('profile.show',$follow->following->id)}}" class="text-decoration-none">
                                    @if ($follow->following->avatar)
                                        <img src="{{$follow->following->avatar}}" alt="#" class="rounded-circle avatar-sm" width="35px" height="35px">
                                    @else
                                        <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                                    @endif
                                </a>
                            </div>
                            <div class="col-5 mt-1">
                                <a href="{{route('profile.show',$follow->following->id)}}" class="text-decoration-none text-dark">{{$follow->following->name}}</a>
                            </div>

                            
                                <div class="col mt-1">
                                    @if($follow->following->id === Auth::id())
                                    @elseif ($profile->isFollowing($follow->following->id))
                                        <form action="{{route('follow.destroy',$follow->following->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 text-danger bg-light">Unfollow</button>
                                        </form>
                                    @else
                                        <form action="{{route('follow.store')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="following_id" value="{{$follow->following->id}}"> 
                                            <button type="submit" class="border-0 text-primary bg-light">Follow</button>
                                        </form>
                                    @endif
                                    
                                </div>
                            
                            
                        </div>
                            
                        @empty
                            <p class="text-center h4">No Following!</p>
                        @endforelse
                    </div>
                </div>
            
        </div>
    </div>
@endsection