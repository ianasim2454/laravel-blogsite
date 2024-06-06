<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use File;

class UserController extends Controller
{
    public function create_post(){
        return view('home.create_post');
    }

    public function add_post(Request $request){
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $user_type = $user->role;

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $userid;
        $post->post_status = 'pending';
        $post->name =  $name;
        $post->usertype = $user_type;

        $image = $request->image;
        if($image){
            ///////storing image in public folder
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('image/postimage'),$imagename);
            // $image->move(public_path('images/products'),$imageName);
            

            ///////storing image in database
            $post->image = $imagename;
        }
        $post->save();
        toastr()->success('Data has been saved successfully!');
        return redirect()->back();
    }

    public function your_post(){
        $user=Auth::user();
        $userid=$user->id;
        $data = Post::where('user_id','=',$userid)->get();
        return view('home.your_post',compact('data'));
    }



    public function edit_mypost($id)
    {
        $data = Post::findOrFail($id);
        return view('home.edit_mypost',compact('data'));
    }

    public function update_mypost(Request $request, $id)
    {
        $data = Post::findOrFail($id);
        $data->title = $request->title;
        $data->description = $request->description;

        $image = $request->image;
        if($image){
            ///////storing image in public folder
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move(public_path('image/postimage'),$imagename);
            // $image->move(public_path('images/products'),$imageName);
            

            ///////storing image in database
            $data->image = $imagename;
        }

        $data->save();
        toastr()->success('Post Updated Successfully');
        return redirect()->route('your.post');

    }

    public function delete_mypost($id){
            $value = Post::findOrFail($id);
            // //Delete Image:
            File::delete(public_path('image/postimage'.$value->image));
            //delete product:
            $value->delete();
            toastr()->warning('Post Deleted successfully!');
            return redirect()->back();

    }


}
