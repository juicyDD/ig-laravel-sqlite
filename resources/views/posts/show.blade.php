@extends('layouts.app') @section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" class="w-100" alt="">
        </div>
        <div class="col-4">
            <div class="d-flex align-items-center">
                <div>
                    <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100"
                    style="max-width: 40px" alt=""  onerror=this.src="https://instastatistics.com/images/default_avatar.jpg" >
                </div>
                <div class="ps-2">
                    <strong>
                        <a style="text-decoration:none" href="/profile/{{$post->user->id}}">
                            <span class="text-dark" >{{$post->user->username}}</span>
                        </a>
                    </strong>
                </div>
                <div class="ps-2">
                    <a href="#" style="text-decoration:none"><span class="fw-bold">Follow</span></a>
                </div>
            </div>

            <hr>

            <p><div class="d-flex">
                    <strong class="pe-2">
                        <a style="text-decoration:none" href="/profile/{{$post->user->id}}">
                            <span class="text-dark" >{{$post->user->username}}</span>
                        </a>
                    </strong>
                    {{$post->caption}}
                </div></p>
        </div>
    </div>
</div>
@endsection