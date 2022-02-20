<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(User $user)
    {
        $id = Auth::id();
        return User::find($id)->following()->toggle($user->profile);
        
    }
}
