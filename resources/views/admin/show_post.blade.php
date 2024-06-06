<!DOCTYPE html>
<html>
  <head> 

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   @include('admin.css')
  </head>
  <body>
  @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
  @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
    <div class="page-content">
    <div class="col-md-10 ml-5">
        @if(Session::has('message'))          
            <div class="alert alert-warning justify-content-center text-center">
                <button type="buttoon" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{Session::get('message')}}
            </div>           
        @endif
        </div>

    <h1 class="post_title h1 text-center text-white p-3">Show All Post</h1>
    <div clas="card-body">
        <table class="table  border">
            <tr class="bg-primary h5 text-white">
                <th>ID</th>
                <th>User Type</th>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Post Status</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>

            @if($post->isNotEmpty())
            @foreach ($post as $key=>$data)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$data->usertype}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->description}}</td>
                <td> <img style="height:55px; width:70px" src="{{asset('image/postimage/'.$data->image)}}"></td>
                <td>{{$data->post_status}}</td>
                <td>
                  <a href="{{route('accept',$data->id)}}" class="btn btn-outline-secondary">Accept</a>
                  <a href="{{route('reject',$data->id)}}" class="btn btn-warning">Reject</a>
                </td>
                <td>
                    <a href="{{route('post.edit',$data->id)}}" class="btn btn-success">Edit</a>

                    <a onclick="confirmation(event)" href="{{route('post.delete',$data->id)}}" class="btn btn-danger">Delete</a>
                    {{-- <form id="delete-product-form-{{$data->id}}" action="{{route('post.delete',$data->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                        </form> --}}
                </td>
            </tr>
            @endforeach
             @endif

            
        </table>

    </div>



    </div>
        
  @include('admin.footer')


  <script type="text/javascript">

          function confirmation(ev){
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
              title: "Are You Sure To Delete This",
              text: "You won't be able to revert this delete",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })

            .then((willcancel)=>{
              if(willcancel){
                window.location.href = urlToRedirect;
              }
            });
          }
      </script>
  
  </body>
</html>