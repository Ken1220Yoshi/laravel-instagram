@extends('layouts.app')

@section('title','Admin:User')
    
@section('content')
    
            <form action="{{route('categories.store')}}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-4 pe-0">
                        <input type="text" name="category" class="form-control" placeholder="Add a category">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary "><i class="fa-solid fa-plus"></i> Add</button>
                    </div>
                </div>
            </form>
           
                <div
                    class="table-responsive"
                >
                    <table
                        class="table table-hover w-75"
                    >
                        <thead class="table table-warning text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NAME</th>
                                <th scope="col">COUNT</th>
                                <th scope="col">LAST_UPDATED</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($all_categories as $category)
                                <tr class="">
                                    <td class="td-post" scope="row">
                                        {{$category->id}}
                                    </td>
                                    
                                    <td class="td-post">
                                        {{$category->name}}
                                    </td>
                                    <td class="td-post">{{$category->categoryPost->count()}}</td>
                                    <td class="td-post">{{$category->updated_at}}</td>
                                    <td class="td-post">
                                        <!-- Modal Edit button -->
                                        <button
                                            type="button"
                                            class="btn btn-outline-warning btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editModal_{{$category->id}}"
                                        >
                                            <i class="fa-solid fa-pen"></i>

                                            <!-- Modal trigger button -->
                                            <button
                                            type="button"
                                            class="btn btn-outline-danger btn-sm ms-1"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal_{{$category->id}}"
                                            >
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </button>
                                        
                                        
                                        
                                    </td>
                                    
                                </tr>
                                @include('modal.modal-admin-category-edit')
                            @endforeach
                            <tr>
                                <td colspan="2">
                                    Uncategorized
                                    <br>
                                    <span class="text-secondary" id="uncategorized">Hidden posts are not included.</span>
                                </td>
                                <td>
                                    {{$uncategorized_post}}
                                </td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            
                            
                            
                        </tbody>
                    </table>
                </div>
                
            
@endsection