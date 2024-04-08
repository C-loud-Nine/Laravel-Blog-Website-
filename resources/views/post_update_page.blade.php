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

        <h1 class="post_title" style="font-size: 30px; font-weight: bold; padding: 20px 0; text-align: center; color: black;">Update Post</h1>

        <div class="container">
            <form action="{{ url('update_user_postdone',$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="title" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Post Title</label>
                    <input type="text" name="title" id="title" value="{{$post->title}}" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="description" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Post Description</label>
                    <textarea name="description" id="description" rows="6" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">{{$post->description}}</textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Current Image</label>
                    <img class="img_deg" src="postimages/{{$post->image}}" alt="Current Image" style="max-width: 100%; height: auto;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="image" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Update Image</label>
                    <input type="file" name="image" id="image" style="width: 100%; padding: 9px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <input type="submit" class="btn btn-primary" value="Submit" style="background-color: #007bff; border-color: #007bff; color: #ffffff; padding: 12px 24px; font-size: 18px; border-radius: 4px; cursor: pointer; transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- services section end -->

<x-footer />
