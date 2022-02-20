@extends('layouts.app') @section('content')
<div class="container">
    <div class="col-4">

    </div>
    <div class="col-10">

        <div class='pb-5'>
        <span class='pb-3'><h3>All users</h3></span>
        </div>
        
        @foreach($users as $user)
            <div class="container-lg rounded-pill pt-2 pb-2 " style="background-color:#FAFAFA">
                <div class="d-flex">
                    <div class="pe-3">
                        <img src="/storage/{{$user->profile->image}}" class="rounded-circle w-100"
                        style="max-width: 70px" alt=""  onerror=this.src="https://instastatistics.com/images/default_avatar.jpg" >
                    </div>
                    <div>
                        <strong>
                            <a  style="text-decoration:none; color:black"  href="/profile/{{$user->id}}">
                                <div>{{$user->username}}</div>
                            </a>
                        </strong>
                        Email: {{$user->email}}
                    </div>
                </div>
            </div>
            <br>
        @endforeach
        
        
    </div>
    
</div>

@endsection