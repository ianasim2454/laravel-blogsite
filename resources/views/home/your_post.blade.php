<!DOCTYPE html>
<html lang="en">
   <head>
        @include('home.homecss')

        <style type="text/css">
         .post_deg{
            padding: 30px;
            text-align: center;
         }

         .title_deg{
            font-size: 35px;
            font-weight: bold;
            padding: 15px;
            color: black;
         }

         .des_deg{
            font-size: 20px;
            font-weight: bold;
            padding: 15px;
            color: black;
         }

        </style>

   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')

       
      </div>

      @foreach($data as $value)
               
                  <div class="post_deg">
                     <img style="height:200px; width:250px; padding:30px; margin:auto;" src="{{asset('image/postimage/'.$value->image)}}">
                     <h4 class="title_deg">{{$value->title}}</h4>
                     <p class="des_deg">{{$value->description}}</p>
                     <a onclick="return confirm('Are You Sure To Delete This Post')" href="{{route('delete.mypost',$value->id)}}" class="btn btn-danger">Delete</a>
                     <a href="{{route('edit.mypost',$value->id)}}" class="btn btn-primary">Update</a>
                     
                  </div>
               
             @endforeach 

              
                  
               
        
      @include('home.footer')
   </body>
</html>