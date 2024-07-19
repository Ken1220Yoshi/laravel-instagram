<!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div
        class="modal fade"
        id="editModal_{{$category->id}}"
        tabindex="-1"
        
        aria-labelledby="editModal_{{$category->id}}"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
            role="document"
        >
            <div class="modal-content border-warning">
                <div class="modal-header border-warning">
                    <h5 class="modal-title" id="modalTitleId">
                        <i class="fa-solid fa-pen-to-square"></i> Edit Category
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <form action="{{route('categories.update',$category->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        
                        <input type="text" name="category" class="form-control" value="{{$category->name}}">
                        
                    </div>
                    <div class="modal-footer border-top-0">
                        <button
                            type="button"
                            class="btn btn-outline-warning"
                            data-bs-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    


<!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div
        class="modal fade"
        id="deleteModal_{{$category->id}}"
        tabindex="-1"
        
        aria-labelledby="deleteModal_{{$category->id}}"
        aria-hidden="true"
    >
        <div
            class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
            role="document"
        >
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h5 class="modal-title text-danger" id="modalTitleId">
                        <i class="fa-solid fa-trash-can"></i> Delete Category
                    </h5>
                    
                </div>
                
                    <div class="modal-body">
                        <p>Are you sure you want to delete {{$category->name}} category?</p>
                        <p>This action will affect all the posts under this category. Posts without category will fall under Uncategorized.</p>
                        
                    </div>
                    <div class="modal-footer border-top-0">
                        <button
                            type="button"
                            class="btn btn-outline-danger"
                            data-bs-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <form action="{{route('categories.destroy',$category)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
    
    