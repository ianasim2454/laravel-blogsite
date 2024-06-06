<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Post</title>
  </head>
  <body>

  <div class="container">

  <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-start">
                <a class="btn btn-dark text-white" href="{{ route('your.post') }}">Back</a>
            </div>
        </div>
    <div class="form mt-3 p-3 text-center">
    
    
        <div>
            <h1 class="post_title h1 text-center text-black p-3">Update Post</h1>
        </div>
        
        <form action="{{route('update.mypost',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-2 mb-3">
                <label for="">Title:</label>
                <input type="text" name="title" value="{{$data->title}}">
            </div>

            <div class="p-2 mb-3">
                <label for="">Description:</label>
                <textarea name="description" id="desc" row="10" col="20">{{$data->description}}</textarea>
            </div>

            <div class="p-2 mb-3">
                <label for="">Old Image:</label>
                <img style="height:80px; width:100px; margin:auto;" src="{{asset('image/postimage/'.$data->image)}}" alt="">
            </div>

            <div class="p-2 mb-3">
                <label for="">New Image:</label>
                <input type="file" name="image">
            </div>

            <div class="text-center p-2">
                    <button  class="btn btn-primary">Update</button>
                </div>
        </form>
    </div>
  </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
