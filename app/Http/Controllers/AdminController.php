<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('backend.dashboard');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function post_page()
    {
        return view('admin.post_page');
    }

    public function add_post(Request $request)
    {

        //get user data from user table:
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $user_type = $user->role;


        //store post data to post table
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $userid;
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
        return redirect()->back()->with('message','Post Added Successfully!!');
    }

    public function show_post()
    {
        $post = Post::all();
        return view('admin.show_post',compact('post'));
    }


    public function edit_post($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.edit_page',compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;


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
        return redirect()->route('show.post')->with('message',' Post Updated Successfully.');
    }







    public function delete_post($id)
    {
        $post = Post::findOrFail($id);

            // //Delete Image:
            File::delete(public_path('image/postimage'.$post->image));
            //delete product:
            $post->delete();
            

            return redirect()->route('show.post')->with('message',' Post Deleted Successfully.');
    }


    public function post_accept($id){
        $post = Post::findOrFail($id);
        $post->post_status = 'active';
        $post->save();
        toastr()->success('Post Accept By Admin');
        return redirect()->back();
    }


    public function post_reject($id){
        $post = Post::findOrFail($id);
        $post->post_status = 'rejected';
        $post->save();
        toastr()->warning('Post Reject By Admin');
        return redirect()->back();
    }
}
