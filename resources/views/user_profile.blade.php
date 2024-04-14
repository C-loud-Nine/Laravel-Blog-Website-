<x-header />

<div class="container" style="background-color: #f8f9fa; padding: 20px;">

    <form action="{{ url('edit_profile',$user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5" style="background-color: white; padding: 20px;" >
                    <div class="card-header">
                        <h3 class="text-center">Profile</h3>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="color: #155724; background-color: #d4edda; border-color: #c3e6cb; padding: 15px; margin-bottom: 20px; border-radius: 4px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: #155724;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img id="image" src="uploads/profile/{{ $user->picture }}" alt="Profile Picture" class="rounded-circle profile-picture" style="width: 200px; height: 200px; object-fit: cover;">
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="title" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Name : </label>
                            <input type="text" name="fullname" id="fullname" value="{{$user->fullname }}" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="description" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Email :</label>
                            <input type="text" name="email" id="email" value="{{$user->email }}" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="description" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Password : </label>
                            <input type="text" name="password" id="password" value="{{$user->password  }}" style="width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box; margin-bottom: 15px; font-size: 16px; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Type:</label>
                                    <div id="type" class="form-control" readonly>{{ $user->type }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="joined">Joined:</label>
                                    <div id="joined" class="form-control" readonly>{{ $user->created_at->format('M d, Y h:i A') }}</div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="published_blogs">Published Blogs:</label>
                                        <div id="published_blogs" class="form-control" readonly>{{ $published_blogs_count }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pending_blogs">Pending Blogs:</label>
                                        <div id="pending_blogs" class="form-control" readonly>{{ $pending_blogs_count }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="comments">Comments:</label>
                                        <div id="comments" class="form-control" readonly>{{ $comments->count() }}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="image" style="display: block; font-weight: bold; margin-bottom: 8px; color: #333333;">Update Image</label>
                                <input type="file" name="image" id="image" class="form-control-file" onchange="previewImage()">
                            </div>

                            <hr>
                            <div class="text-center mt-4">
                                <button type="submit" onclick="return confirm('Would You Like to Proceed ?')" style="background-color: #4CAF50; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px; cursor: pointer; border-radius: 8px;">Edit Account</button>
                                <a href="{{url('delete_user',$user->id)}}" class="btn btn-danger" onclick="return confirm('Would You Like to Proceed ?')" style="background-color: #f44336; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 14px; margin: 4px 2px; cursor: pointer; border-radius: 8px;">Delete Account</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<x-footer />

<script>
    function previewImage() {
        var preview = document.getElementById('image');
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
</script>
