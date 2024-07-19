<div class="row header">
    <div class="col-4 header" >
        @if ($profile->avatar)
            <img src="{{$profile->avatar}}" alt="" class="mx-auto img-thumbnail rounded-circle avatar-lg   header " >
        @else
            <i class="fa-solid fa-circle-user fa-10x text-secondary"></i>
        @endif
       
    </div>
    <div class="col-8">
        <div class="row">
            <div class="col">
                <h1 class="display-5">{{$profile->name}}</h1>
            </div>
            <div class="col">
                @if ($profile->id === Auth::id())
                    <a href="{{route('profile.edit',$profile)}}" class="btn btn-outline-secondary mt-2">Edit Profile</a>
                @elseif ($profile->isFollowed())
                    <form action="{{route('follow.destroy',$profile->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-2">Unfollow</button>
                    </form>
                @else
                    <form action="{{route('follow.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="following_id" value="{{$profile->id}}">
                        <button type="submit" class="btn btn-primary mt-2">Follow</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="row mx-3 my-2">
            <div class="col-3">
                <a href="{{route('profile.show',$profile->id)}}" class="text-decoration-none text-dark">{{$profile->posts->count()}} {{$profile->posts->count() <= 1? 'Post':'Posts'}}</a>
            </div>
            <div class="col-3">
                <a href="{{route('profile.follower',$profile->id)}}" class="text-decoration-none text-dark">{{$profile->followers->count()}} {{$profile->followers->count()<=1? 'Follower':'Followers'}}</a>
            </div>
            <div class="col">
                <a href="{{route('profile.following',$profile->id)}}" class="text-decoration-none text-dark">{{$profile->followings->count()}} Following</a>
            </div>
        </div>
        <p>{{$profile->introduction}}</p>
    </div>
</div>