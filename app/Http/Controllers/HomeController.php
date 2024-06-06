<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        $post = Post::where('post_status','=','active')->get();
        if(Auth::id()){
            $usertype = Auth()->user()->role;
            if($usertype=='user'){
                return view('home.homepage',compact('post'));
            }
        }
    }


    public function homepage()
    {
        $post = Post::where('post_status','=','active')->get();
        return view('home.homepage',compact('post'));
    }







    //////////Post Details//////////
    public function post_details($id){
        $post = Post::findOrFail($id);
        return view('home.post_details',compact('post'));
    }
}
