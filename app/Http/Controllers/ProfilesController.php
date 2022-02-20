<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    //
    public function index($user)
    {
        //dd($user);
        $follows ="false";
        //$follows = (auth()->user()) ? auth()->user()->following->contains($user) : "false";
        if(Auth::user())
        {
            $id=Auth::id();
            if(User::find($id)->following->contains($user))
            {
                $follows="true";
            }
        }
        //$follows=str($follows);
        $user = User::findOrFail($user);
        return view('profiles.index',[
            'user' => $user,
            'follows'=>$follows
        ]);
    }
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }

    public function profileImage()
    {
        return ($this->image) ? '/storage/'.$this->image : "https://instastatistics.com/images/default_avatar.jpg";
    }
    public function update(User $user)
    {
        $this->authorize('update',$user->profile);
        $data = request()->validate([
            'title' =>'required',
            'description'=>'required',
            'link'=>'url',
            'image'=>''
        ]);
        

        if(request('image'))
        {
            $imagePath = request('image')->store('profile','public');
            $image =  \Intervention\Image\ImageManagerStatic::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        
            $image->save();
            auth()->user()->profile->update(array_merge(
                $data,
                ['image' => $imagePath]
            ));
        }
        else
        {
            auth()->user()->profile->update($data);
        }
        
        //dd($data);
        return redirect("/profile/{$user->id}");
    }

}
