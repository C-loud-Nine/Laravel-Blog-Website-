<x-header /> <!-- Include the header only if showHeader is true -->

<!-- services section start -->
<div class="services_section layout_padding" style="background-color: #f2f2f2; padding: 50px 0;">
    <div class="container">
        <h1 class="services_taital" style="color: #333; font-size: 36px; text-align: center; margin-bottom: 30px;">Blog Posts</h1>
        <p class="services_text" style="color: #666; font-size: 18px; text-align: center; margin-bottom: 30px;">Explore our latest blog posts covering a wide range of topics including technology, lifestyle, travel, food, and more. Stay updated with insightful articles, captivating stories, and thought-provoking discussions.</p>
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

<x-footer />
