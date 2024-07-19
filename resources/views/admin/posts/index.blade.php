@extends('layouts.app')

@section('title','Admin:User')
    
@section('content')
    
            
                <div
                    class="table-responsive me-5"
                >
                    <table
                        class="table table-hover"
                    >
                        <thead class="table table-primary">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">OWNER</th>
                                <th scope="col">CREATED_AT</th>
                                <th scope="col">STATUS</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_posts as $post)
                                <tr class="align-middle">
                                    <td class="td-post" scope="row">{{$post->id}}
                                    </td>
                                    <td class="pt-2"><a href="{{route('post.show',$post->id)}}" class="text-decoration-none text-dark">
                                        <img src="{{$post->image}}" alt="" width="150px" height="150px">
                                    </a></td>
                                    <td class="td-post">
                                        @forelse ($post->categoryPost as $category_post)
                                        
                                                <span class="border border-1 bg-secondary rounded px-1 text-light"><a href="" class="text-decoration-none text-light">{{$category_post->category->name}}</a></span>
                                        
                                        @empty
                                            
                                        @endforelse
                                    </td>
                                    <td class="td-post">{{$post->user->name}}</td>
                                    <td class="td-post">{{$post->created_at}}</td>

                                    @if (!$post->trashed())
                                        <td class="td-post">
                                            <i class="fa-solid fa-circle text-primary"></i> Visible
                                        </td>
                                        <td class="td-post">
                                            <div class="dropdown">
                                                <button class="btn btn-md shadown-none" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            
                                            <div class="dropdown-menu dropdown-mune-end">
                                                <button type="button" style="max-width: auto" class="text-danger border-0 bg-light " data-bs-toggle="modal" data-bs-target="#hideModal_{{ $post->id }}"><i class="fa-solid fa-eye-slash"></i> Hide Post {{$post->id}}</button>
                                            </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="td-post">
                                            <i class="fa-regular fa-circle text-secondary"></i> Hidden
                                        </td>
                                        <td class="td-post">
                                            <div class="dropdown">
                                                <button class="btn btn-md shadown-none" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            
                                            <div class="dropdown-menu dropdown-mune-end">
                                                <button type="button" style="max-width: auto" class="text-dark border-0 bg-light " data-bs-toggle="modal" data-bs-target="#unhideModal_{{ $post->id }}"><i class="fa-solid fa-eye"></i> Unhide Post {{$post->id}}</button>
                                            </div>
                                            </div>
                                        </td>
                                    @endif
                                    
                                </tr>

                                @include('modal.modal-admin-post')
                            @endforeach
                            
                            
                            
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <nav aria-label="Page navigation" class="paginate">
                    <ul class="pagination">
                        {{$all_posts->links()}}
                    </ul>
                </nav>
                
            
@endsection