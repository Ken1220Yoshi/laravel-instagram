<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="hideModal_{{ $post->id }}"
    tabindex="-1"
    
    aria-labelledby="hideModal_{{ $post }}"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md "
        role="document"
    >
        <div class="modal-content border-danger">
            <div class="modal-header border border-danger border-top-0 border-start-0 border-end-0">
                <h5 class="modal-title text-danger" id="modalTitleId">
                    <i class="fa-solid fa-user-slash"></i> Hide Post
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to hide this post?</p>
                <img src="{{$post->image}}" alt="" width="150px" height="150px">
                <p>{{$post->description}}</p>
            </div>
            <div class="modal-footer border border-top-0">
                <button
                    type="button"
                    class="btn btn-outline-danger"
                    data-bs-dismiss="modal"
                >
                    Cancel
                </button>
                <form action="{{route('admin.posts.hide',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="unhideModal_{{ $post->id }}"
    tabindex="-1"
    
    aria-labelledby="unhideModal_{{ $post }}"
    aria-hidden="true"
>
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md "
        role="document"
    >
        <div class="modal-content border-primary">
            <div class="modal-header border border-primary border-top-0 border-start-0 border-end-0">
                <h5 class="modal-title text-primary" id="modalTitleId">
                    <i class="fa-solid fa-user-slash"></i> Unhide Post
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to unhide this post?</p>
                <img src="{{$post->image}}" alt="" width="150px" height="150px">
                <p>{{$post->description}}</p>
            </div>
            <div class="modal-footer border border-top-0">
                <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-bs-dismiss="modal"
                >
                    Cancel
                </button>
                <form action="{{route('admin.posts.unhide',$post->id)}}" method="post">
                    @csrf
                    
                    <button type="submit" class="btn btn-primary">Unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>



