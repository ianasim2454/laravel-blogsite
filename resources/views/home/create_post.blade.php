<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create Post</title>
  </head>
  <body>

  <div class="container">

  <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-start">
                <a class="btn btn-dark text-white" href="{{ route('home') }}">Back</a>
            </div>
        </div>
    <div class="form mt-3 p-3 text-center">
    
        <!-- @if(Session::has('message'))          
            <div class="alert alert-success justify-content-center text-center">
                <button type="buttoon" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{Session::get('message')}}
            </div>           
        @endif -->
       
        <div>
            <h1 class="post_title h1 text-center text-black p-3">Create Post</h1>
        </div>
        
        <form action="{{route('post.add')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-2 mb-3">
                <label for="">Title:</label>
                <input type="text" name="title">
            </div>

            <div class="p-2 mb-3">
                <label for="">Description:</label>
                <textarea name="description" id="desc" row="10" col="20"></textarea>
            </div>

            <div class="p-2 mb-3">
                <label for="">Image:</label>
                <input type="file" name="image">
            </div>

            <div class="text-center p-2">
                    <input type="submit" class="btn btn-primary">
                </div>
        </form>
    </div>
  </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
