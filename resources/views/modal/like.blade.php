

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="likeModal_{{$post->id}}"
    tabindex="-1"
    
    aria-labelledby="likeModal_{{$post->id}}"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header border-success border-top-0 border-start-0 border-end-0">
                <h5 class="modal-title  mx-auto" id="modalTitleId">
                    <i class="fa-solid fa-heart text-danger"></i><span> Likes</span>
                </h5>
                
            </div>
            <div class="modal-body">
                @forelse ($post->like as $like)
                    <div class="row mb-2">
                        <div class="col text-end">
                            <a href="{{route('profile.show',$like->user_id)}}" class="text-decoration-none">
                                @if ($like->user->avatar)
                                    <img src="{{$like->user->avatar}}" alt="#" class="rounded-circle avatar-sm" width="35px" height="35px">
                                @else
                                    <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                                @endif
                            </a>
                        </div>
                        <div class="col mt-2">
                            {{$like->user->name}}
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
            
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>
