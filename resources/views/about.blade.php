<x-header />
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
<x-footer />   