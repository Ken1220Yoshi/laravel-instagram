@extends('layouts.app')

@section('title','Admin:User')
    
@section('content')
    
        
            
            
                <div
                    class="table-responsive me-5"
                >
                    <table
                        class="table table-hover"
                    >
                        <thead class="table table-success">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">NAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">CREATED_AT</th>
                                <th scope="col">STATUS</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_users as $user)
                                <tr class="align-middle">
                                    <td scope="row">
                                        @if ($user->avatar)
                                            <img src="{{$user->avatar}}" alt="" class="mx-auto  rounded-circle " width="57.6px" height="57.6px">
                                        @else
                                            <i class="fa-solid fa-circle-user fa-4x text-dark"></i>
                                        @endif
                                    </td>
                                    <td class=""><a href="{{route('profile.show',$user->id)}}" class="text-decoration-none text-dark">{{$user->name}}</a></td>
                                    <td class="">{{$user->email}}</td>
                                    <td class="">{{$user->created_at}}</td>
                                    @if (!$user->trashed())
                                        <td class="">
                                            <i class="fa-solid fa-circle text-success"></i> Active
                                        </td>
                                        <td class="">
                                            <div class="dropdown">
                                                <button class="btn btn-md shadown-none" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            
                                            <div class="dropdown-menu dropdown-mune-end">
                                                <button type="button" style="max-width: auto" class="text-danger border-0 bg-light " data-bs-toggle="modal" data-bs-target="#deactivateModal_{{ $user->id }}"><i class="fa-solid fa-user-slash"></i> Deactivate {{$user->name}}</button>
                                            </div>
                                            </div>
                                        </td>
                                    @else
                                        <td class="">
                                            <i class="fa-regular fa-circle text-secondary"></i> Inactive
                                        </td>
                                        <td class="">
                                            <div class="dropdown">
                                                <button class="btn btn-md shadown-none" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis"></i>
                                                </button>
                                            
                                            <div class="dropdown-menu dropdown-mune-end">
                                                <button type="button" style="max-width: auto" class="text-dark border-0 bg-light " data-bs-toggle="modal" data-bs-target="#activateModal_{{ $user->id }}"><i class="fa-solid fa-user-check"></i> Activate {{$user->name}}</button>
                                            </div>
                                            </div>
                                        </td>
                                    @endif
                                    
                                </tr>
                                @include('modal.modal-admin-user')
                            @endforeach
                           
                            
                           
                            
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <nav aria-label="Page navigation" class="paginate">
                    <ul class="pagination">
                        {{$all_users->links()}}
                    </ul>
                </nav>
               
                
            
   
@endsection