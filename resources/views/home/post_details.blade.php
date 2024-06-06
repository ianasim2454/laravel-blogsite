<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
        @include('home.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
        </div> 
        <div style="text-align:center" class="col-md-12 " >
                     <div><img style="padding:20px; text-align:center; margin-bottom:20px; height:350px; width:350px;"  src="{{asset('image/postimage/'.$post->image)}}" class="mx-auto d-block"></div>
                     <h3 class="h3 text-black">{{$post->title}}</h3>
                     <h4 class="h4 text-black">{{$post->description}}</h4>
                     <p class=" text-black">Post By <b>{{$post->name}}</b></p>
                     
                  </div>
        
      
        
      @include('home.footer')
   </body>
</html>