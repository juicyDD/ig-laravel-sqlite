<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Illuminate\Support\Facades\Auth;
use \App\Models\Post;
//use Intervention\Image\Facades\Image;
//use Intervention\Image\ImageManagerStatic as Image;


class PostsController extends Controller
{
    //
    
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function index()
    {
        //display all the posts of followers nhi is following rn =D
        $id=Auth::id();
        $users = User::find($id)->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->latest()->paginate(5);//->get()
        //dd($posts);
        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    
    public function store()
    {
        $data = request()->validate(
            [
            
                'caption'=>'required',
                'image'=>['required','image']]
        );
        $imagePath = request('image')->store('uploads','public');
        $image =  \Intervention\Image\ImageManagerStatic::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        
        $image->save();
        $id=Auth::id();
        //$user->posts()->create($data);
        User::find($id)->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ])->save();
        
        return redirect('/profile/'.Auth::id());
        
    }

    public function show(\App\Models\Post $post)
    {
        //dd($post);
        return view('posts.show',compact('post'));
    }
}
