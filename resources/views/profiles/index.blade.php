@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-2 p-5 ">
            <img src= "{{$user->profile->profileImage()}}" onerror=this.src="https://instastatistics.com/images/default_avatar.jpg" 
                class="rounded-circle" width="150" height="150" alt="">
        </div>
        <div class="col-9 pt-5">
            <div>
                <div class="d-flex justify-content-between align-items-baseline pb-2">
                    <div class="d-flex">
                        <div class="h4 align-items-center pe-3 pt-1">{{$user->username}}</div>
                        <?php
                            if(auth()->id()!=$user->id)
                         {?>
                        <follow-button user-id="{{$user->id }}"follows="{{ $follows }}" >
                            
                        </follow-button>
                        <?php } ?>
                    </div>
                    @can('update',$user->profile)
                    <a href="/p/create">Add New Post</a>
                    @endcan
                    
                </div>
                @can('update',$user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan
                <div class="d-flex">
                    <div class="pe-5">
                        <strong>{{$user->posts()->count()}}</strong> posts
                    </div>
                    <div class="pe-5">
                        <strong>{{$user->profile->followers->count() }}</strong> followers
                    </div>
                    <div class="pe-5">
                        <strong>{{$user->following->count()}} </strong> following
                    </div>
                </div>
                <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->link }}</a></div>
            </div>
        </div>
    </div>


    <div class="row pt-4">
        @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                <img src={{'/storage/'.$post->image}}
                class="w-100">
            </a>
        </div>
        @endforeach
    

    </div>
</div>
@endsection