<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Blog Post </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">

               @foreach($post as $data)
               
                  <div class="col-md-4">
                     <div><img style="margin-bottom:20px; height:350px; width:350px; margin:auto;" src="{{asset('image/postimage/'.$data->image)}}" class="services_img"></div>
                     <h4 class="text-center">{{$data->title}}</h4>
                     <p class="text-center">Post By <b>{{$data->name}}</b></p>
                     <div class="btn_main"><a style="margin-bottom:20px" href="{{route('post.details',$data->id)}}">Read More...</a></div>
                  </div>
                  @endforeach
                  
               </div>
            </div>
         </div>
      </div>