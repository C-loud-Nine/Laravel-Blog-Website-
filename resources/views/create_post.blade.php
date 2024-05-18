<x-header />

<div class="services_section layout_padding" style="background-color: white; padding: 50px 0;">
    <div class="page-content">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: #155724; background-color: #d4edda; border-color: #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #155724;">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('success') }}
    </div>
@endif

        
        <h1 class="post_title" style="font-size: 30px; font-weight: bold; text-align: center; color: black;">Add Blog</h1>

        <div class="container">
            <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="title" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Post Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter post title" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="description" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Post Description</label>
                    <textarea name="description" id="description" placeholder="Enter post description" rows="10" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;"></textarea>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="image" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Add Image</label>
                    <input type="file" name="image" id="image" style="width: 100%; padding: 9px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                    <input type="submit" class="btn-primary" value="Submit" style="background-color: #007bff; border-color: #007bff; color: #ffffff; padding: 12px 24px; font-size: 18px; border-radius: 4px; cursor: pointer; transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                </div>
            </form>
        </div>
    </div>
</div>

<x-footer />
