

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="deactivateModal_{{ $user->id }}"
    tabindex="-1"
    
    aria-labelledby="deactiveModalLabel_{{$user->id}}"
    aria-hidden="true"
>
    <div
        class="modal-dialog  modal-dialog-centered modal-md"
        role="document"
    >
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger" id="modalTitleId">
                    <i class="fa-solid fa-user-slash"></i> Deactivate User
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                Are you sure you want to deactivate {{$user->name}}?
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-outline-danger"
                    data-bs-dismiss="modal"
                >
                    Cancel
                </button>
                <form action="{{route('admin.users.deactive',$user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Deactivate</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div
    class="modal fade"
    id="activateModal_{{ $user->id }}"
    tabindex="-1"
    
    aria-labelledby="activeModalLabel_{{$user->id}}"
    aria-hidden="true"
>
    <div
        class="modal-dialog  modal-dialog-centered modal-md"
        role="document"
    >
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h5 class="modal-title text-success" id="modalTitleId">
                    <i class="fa-solid fa-user-slash"></i> Deactivate User
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                Are you sure you want to activate {{$user->name}}?
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-outline-success"
                    data-bs-dismiss="modal"
                >
                    Cancel
                </button>
                <form action="{{route('admin.users.active',$user->id)}}" method="post">
                    @csrf
                    
                    <button type="submit" class="btn btn-success">Activate</button>
                </form>
            </div>
        </div>
    </div>

</div>


