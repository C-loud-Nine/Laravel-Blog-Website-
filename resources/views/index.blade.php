<x-indexheader />
      
         





<!-- banner section start -->
         <div class="banner_section layout_padding">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">

               <div class="carousel-item active">
                     <div class="container">
                        <h1 class="banner_taital">Creative Writing</h1>
                        <p class="banner_text">Fuel your creativity with our curated collection of stories, poetry, and prose. Get inspired and unleash your writing potential.</p>
                        <div class="read_bt"><a href="{{ URL::to('/services') }}">GO to Blogs</a></div>
                     </div>
                  </div>
                  
                  <div class="carousel-item ">
                     <div class="container">
                        <h1 class="banner_taital">Blogging</h1>
                        <p class="banner_text">Dive into a world where words come alive. Our blog is a haven for writers, thinkers, and storytellers alike. Join us as we navigate the vast landscape of ideas, opinions, and perspectives.</p>
                        <div class="read_bt"><a href="{{ URL::to('/services') }}">GO to Blogs</a></div>
                     </div>
                  </div>
                  
                  <div class="carousel-item">
                     <div class="container">
                        <h1 class="banner_taital">Reviews</h1>
                        <p class="banner_text">Gain valuable insights with our honest reviews of books, movies, gadgets, and more. Let us guide you through the world of consumer choices with clarity and candor.</p>
                        <div class="read_bt"><a href="{{ URL::to('/services') }}">GO to Blogs</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->





      <div class="about_section layout_padding" style="background-color: white; padding-top: 100px; padding-bottom: 150px;">
    <div style="text-align: center; margin-bottom: 20px;">
        <h1 style="color: #343a40; font-size: 36px; font-weight: bold; margin-bottom: 20px;">Latest From Blog . . .</h1>
    </div>
    <div>
        @if ($latestPosts->isNotEmpty())
        <div id="carouselExampleIndicators" class="carousel slide position-relative" data-ride="carousel">
            <div class="carousel-inner" style="background-image: url('images/newsbg.jpg'); opacity:0.9; background-size: cover; background-position: center; padding-top: 100px; padding-bottom: 150px;">
                @foreach ($latestPosts as $key => $singlePost)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div style="background-color: rgba(0, 0, 0, 0.7); padding: 30px; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);">
                                    <div style="text-align: center;">
                                        <h4 style="color: white; font-size: 24px; font-weight: bold; margin-bottom: 15px;">{{ $singlePost->title }}</h4>
                                        <p style="color: white; font-size: 16px; margin-bottom: 15px;">{{ substr($singlePost->description, 0, 150) }}...</p>
                                    </div>
                                    <div style="margin-top: 15px;">
                                        <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                                            <span style="color: white; font-size: 18px; font-weight: bold; margin-right: 10px;">Blogger:</span>
                                            <span style="color: white; font-size: 18px;">{{ $singlePost->name }}</span>
                                        </div>
                                        <div style="display: flex; align-items: center; justify-content: center; margin-bottom: 10px;">
                                            <span style="color: white; font-size: 18px; font-weight: bold; margin-right: 10px;">Type:</span>
                                            <span style="color: white; font-size: 18px;">{{ $singlePost->type }}</span>
                                        </div>
                                        <div style="display: flex; align-items: center; justify-content: center;">
                                            <span style="color: white; font-size: 18px; font-weight: bold; margin-right: 10px;">Posted At:</span>
                                            <span style="color: white; font-size: 18px;">{{ $singlePost->created_at->format('M d, Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="background-color: rgba(0, 0, 0, 0.7); border: 1px solid #ccc; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1); text-align: center;">
                                    <img src="postimages/{{$singlePost->image}}" style="max-width: 400px; height: auto; border-radius: 10px; margin: 0 auto 20px; display: block;" alt="Post Image">
                                    <a href="{{ route('post_details', ['id' => $singlePost->id]) }}" style="text-decoration: none; background-color: #007bff; color: #fff; padding: 8px 16px; border-radius: 5px; display: inline-block; font-size: 14px;">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="left: 0; right: auto; bottom: -50px; z-index: 2;">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="color: white;"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="right: 0; left: auto; bottom: -50px; z-index: 2;">
                <span class="carousel-control-next-icon" aria-hidden="true" style="color: white;"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        @else
        <p style="text-align: center;">No posts found.</p>
        @endif
    </div>
</div>




      


      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      <!-- services section start -->
<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Posts</h1>
        <p class="services_text">Explore our latest blog posts covering a wide range of topics including technology, lifestyle, travel, food, and more. Stay updated with insightful articles, captivating stories, and thought-provoking discussions.</p>
        <div class="services_section_2">
            <div class="row">
                @foreach($post as $post)
                    <div class="col-md-4" style="margin-bottom: 50px;">
                        <div class="post_image_container" style="height: 200px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                            <img src="postimages/{{$post->image}}" class="services_img" style="max-width: 100%; max-height: 100%; border-radius: 5px;">
                        </div>
                        <h2 style="margin-top: 20px; font-size: 24px; text-align: center;">{{$post->title}}</h2>
                        <p style="font-size: 16px; color: #666; text-align: center;">Posted By <b>{{$post->name}}</b></p>
                        <div class="btn_main text-center" style="margin-top: 20px;"><a href="{{url('post_details',$post->id)}}" style="text-decoration: none; background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px; display: inline-block;">READ MORE</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- services section end -->

  

<div class="about_section layout_padding" style="background-image: url('images/page.jpg');opacity:0.9; background-size: cover; background-position: center;">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 text-center" style="padding: 50px; background-color: rgba(0, 0, 0, 0.7); border-radius: 10px;">
                <h1 class="about_taital" style="color: white; margin-bottom: 20px;">Top Stories</h1>
                <p class="about_text" style="color: white; margin-bottom: 30px;">Unlock a world of current events with our versatile News API. Dive into a vast array of news topics, from global affairs to niche interests, all in one place. With real-time updates and an intuitive interface, staying informed has never been simpler. Explore breaking news, delve into insightful analysis, and discover trending stories effortlessly. Tailor your news experience to suit your interests and stay ahead of the curve with ease.</p>
                <div class="readmore_bt" style="text-align: right; width: 250px; right: 20px">
                    <a href="{{ URL::to('/newsapi') }}" style="color: white; background-color: #4CAF50; border: none; padding: 10px 20px; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px;">Continue</a>
                </div>
            </div>
        </div>
    </div>
</div>




      
          <!-- about section start -->
          <div class="about_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital_main">
                     <h1 class="about_taital">About Us</h1>
                     <p class="about_text">Blogarama is more than just a blogging platform - it's a community where individuals from diverse backgrounds come together to share their ideas, experiences, and passions. Our mission is to provide a platform for bloggers to express themselves freely, connect with like-minded individuals, and inspire others through their words.</p>
                     <div class="readmore_bt"><a href="{{ URL::to('/services') }}">Read More</a></div>
                  </div>
               </div>
               <div class="col-md-6 padding_right_0">
                  <div><img src="images/bg.jpg" class="about_img"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      
      
      
      







      
      
      




<x-footer />

