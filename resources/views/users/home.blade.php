@extends('layouts.app')


@section('title','Homepage')
    


@section('content')
    <div class="row">
        <div class="col-8 ">
            <div class="container">
                @forelse ($show_posts as $post)
                    <div class="card mb-3">
                        {{-- title --}}
                        @include('users.contents.title')
                        
                        {{-- body --}}
                        @include('users.contents.body')
                        {{-- footer --}}
                        @include('users.contents.footer')
                    
                    </div>
                @empty
                    
                @endforelse
                
            </div>
        </div>
        <div class="col-4">
            {{-- profile --}}
            @include('users.contents.home-profile')
        </div>
    </div>
@endsection
