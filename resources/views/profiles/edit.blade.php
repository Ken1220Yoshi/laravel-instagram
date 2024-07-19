@extends('layouts.app')


@section('title','Edit Profile')
    
@section('content')
    <div class="profile border shadow p-5 w-75 mx-auto">
        <h3 class="text-secondary">Update Profile</h3>
        <form action="{{route('profile.update',$profile)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-4">
                    @if ($profile->avatar)
                        <img src="{{$profile->avatar}}" alt="" class="w-100 rounded rounded-circle" style="height: 200px">
                    @else
                    <i class="fa-solid fa-circle-user fa-10x text-secondary"></i>
                    @endif
                </div>
                <div class="col-6">
                    <input type="file" name="image" class="form-control mt-5">
                    <div class="form-text">
                        Acceptable formats: jpg, jpeg, png <br>
                        Max file size: 140mb <br>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$profile->name}}" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{$profile->email}}" required>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <label for="" class="form-label">Introduction</label>
                    <textarea name="introduction" id="introduction" cols="30" rows="5" placeholder="Describe yourself" class="form-control">{{$profile->introduction}}</textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <button type="submit" class="btn btn-warning w-100">Save</button>
                </div>
            </div>
        </form>

    </div>
@endsection