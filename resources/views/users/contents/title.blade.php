<div class="card-header">
    <div class="row align-items-center">
        <div class="col-1">
            <a href="{{route('profile.show',$post->user->id)}}" class="text-decoration-none">
                @if ($post->user->avatar)
                    <img src="{{$post->user->avatar}}" alt="#" class="rounded-circle avatar-sm" width="35px" height="35px">
                @else
                    <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                @endif
            </a>
        </div>
        <div class="col">
            <a href="{{route('profile.show',$post->user->id)}}" class="text-decoration-none text-dark mt-2">{{$post->user->name}}</a>
            
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
                        <form action="{{route('follow.destroy',$post->user_id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item text-danger" >
                                Unfollow
                            </button>
                        </form>
                        
                    @endif
                    
                </div>
                
            </div>
        </div>
        
    </div>
</div>
{{-- Modal --}}
                        
<div class="modal fade" id="postModal_{{ $post->id }}" tabindex="-1" aria-labelledby="postModalLabel_{{ $post->id }}" aria-hidden="true">
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

<!-- jQuery, Popper.js, Bootstrap JS -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

<!-- モーダルにデータを渡すJavaScript -->
{{-- <script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // モーダルを開くボタン
        var postId = button.data('post-id');
        var postDescription = button.data('post-description');
        var postImage = button.data('post-image');

        // 削除フォームのaction属性をポストIDで置換
        var form = $('#deleteForm');
        var actionUrl = form.attr('action').replace('__post_id__', postId);
        form.attr('action', actionUrl);

        var modal = $(this);
        modal.find('#postId').text(postId);
        modal.find('#postDescription').text(postDescription);
        modal.find('#postImage').attr('src', postImage);
    });
</script> --}}