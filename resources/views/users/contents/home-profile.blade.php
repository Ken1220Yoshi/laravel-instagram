<div class="bg-white p-3 rounded-1 shadow">
    <div class="row">
        <div class="col-3">
            <a href="{{route('profile.show',Auth::id())}}" class="text-decoration-none">
                @if (Auth::user()->avatar)
                    <img src="{{Auth::user()->avatar}}" alt="#" class="rounded-circle avatar-sm" width="50px" height="50px">
                @else
                    <i class="fa-solid fa-circle-user icon-sm text-secondary" style="width: 50px;height:50px"></i>
                @endif
            </a>
        </div>
        <div class="col-9">
            <p class="mb-0">{{Auth::user()->name}}</p>
            <p class="mb-0 text-secondary">{{Auth::user()->email}}</p>
        </div>
    </div>
</div>

<div class="mt-5 px-3">
    <div class="row">
        <div class="col-8">
            <span class="text-secondary">Suggestions For You</span>
        </div>
        <div class="col-4 text-center">
            <a href="{{route('suggestion')}}" class="text-decoration-none text-dark"><span>See All</span></a>
        </div>
        
    </div>
    
        @forelse ($suggested_users as $index=>$user)
            @if ($index < 10)
                <div class="row mt-3">
                    <div class="col-2">
                        <a href="{{route('profile.show',$user->id)}}" class="text-decoration-none">
                            @if ($user->avatar)
                                <img src="{{$user->avatar}}" alt="#" class="rounded-circle avatar-sm" width="35px" height="35px">
                            @else
                                <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                            @endif
                        </a>
                    </div>
                    <div class="col-6 mt-1">
                        <a href="{{route('profile.show',$user->id)}}" class="text-dark text-decoration-none">{{$user->name}}</a>
                    </div>
                    <div class="col-4 text-center mt-1">
                        <form action="{{route('follow.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="following_id" value="{{$user->id}}">
                            <button type="submit" class="bg-light border-0 text-primary">Follow</button>

                        </form>
                    </div>
                </div>
            @endif
            
        
            
        @empty
            
        @endforelse
</div>