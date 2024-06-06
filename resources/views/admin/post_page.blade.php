<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')


   <style type="text/css">

        label{
            width: 200px;
            display: inline-block;
        }
    </style>
  </head>
  <body>
  @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
  @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

    <div class="page-content">

    <div class="col-md-10 mt-4 ml-5">
        @if(Session::has('message'))          
            <div class="alert alert-success justify-content-center text-center">
                <button type="buttoon" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{Session::get('message')}}
            </div>           
        @endif
        </div>
        <h1 class="post_title h1 text-center text-white p-3">Add Post</h1>
        <div>

            <form action="{{route('add.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div class="text-center p-2 mb-3">
                    <label for="">Post Title</label>
                    <input type="text" name="title">
                </div>
                
                <div class="text-center p-2 mb-3">
                    <label for="">Post Description</label>
                    <textarea name="description" id="desc" row="10" col="20"></textarea>
                </div>

                <div class="text-center p-2 mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image">
                </div>

                <div class="text-center p-2">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
        
  @include('admin.footer')
  </body>
</html>