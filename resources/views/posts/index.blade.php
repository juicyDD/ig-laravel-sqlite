@extends('layouts.app') @section('content')
<div class="container">
    <div class="col-4">

    </div>
    <div class="col-10">

        <div class='pb-5'>
        <span class='pb-3'><h3>Recent posts</h3></span>
        </div>
        
        @foreach($posts as $post)
        <div class="row pb-5">
            <div class="col-8">
                <a href="/profile/{{$post->user->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100" alt="">
                </a>
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="/storage/{{$post->user->profile->image}}" class="rounded-circle w-100"
                        style="max-width: 40px"   onerror=this.src="https://instastatistics.com/images/default_avatar.jpg" >
                    </div>
                    <div class="ps-2">
                        <strong>
                            <a style="text-decoration:none" href="/profile/{{$post->user->id}}">
                                <span class="text-dark" >{{$post->user->username}}</span>
                            </a>
                        </strong>
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
        @endforeach
        <div>
            <div class="col-2">{{$posts->links()}}</div>
        </div>
        
    </div>
    
</div>

@endsection