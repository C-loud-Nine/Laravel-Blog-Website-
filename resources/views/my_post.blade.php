<x-header /> 






<!-- services section start -->
<div class="services_section layout_padding" style="background-color: #f2f2f2; padding: 50px 0;">
    <div class="container">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: #155724; background-color: #d4edda; border-color: #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #155724;">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
@endif
        <h1 class="services_taital" style="color: #333; font-size: 36px; text-align: center; margin-bottom: 30px;">Blog Posts</h1>
        <p class="services_text" style="color: #666; font-size: 18px; text-align: center; margin-bottom: 30px;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
            @foreach($post as $post)
    <div class="col-md-4" style="margin-bottom: 50px;">
        <div style="height: 200px; overflow: hidden;"><img src="postimages/{{$post->image}}" class="services_img" style="width: 100%; object-fit: cover; border-radius: 5px;"></div>
        <h2 style="margin-top: 20px; font-size: 24px; text-align: center;">{{$post->title}}</h2>
        <p style="font-size: 16px; color: #666; text-align: center;">Created At: {{$post->created_at}}</p>
        <div style="text-align: center;">
            <a href="{{url('post_details',$post->id)}}" style="text-decoration: none; background-color: #007bff; color: #fff; padding: 7px 15px; border-radius: 5px; display: inline-block;">READ MORE</a>
            <a href="{{url('post_update_page',$post->id)}}" style="text-decoration: none; background-color: #ffc107; color: #fff; padding: 7px 10px; border-radius: 5px; display: inline-block; margin-left: 10px; margin-right: 10px;">Update</a>
            <a onclick="return confirm('Would You Like to Proceed ?')" href="{{url('my_post_del',$post->id)}}" style="text-decoration: none; background-color: #dc3545; color: #fff; padding: 7px 10px; border-radius: 5px; display: inline-block; margin-left: 10px;">Delete</a>
        </div>
    </div>
@endforeach



            </div>
        </div>
    </div>
</div>
<!-- services section end -->



</body>
</html>








<x-footer />
