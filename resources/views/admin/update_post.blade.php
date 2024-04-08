<!DOCTYPE html>
<html>
<head>

    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success .close {
            color: #155724;
        }

        .post_title {
            font-size: 30px;
            font-weight: bold;
            padding: 20px 0;
            text-align: center;
            color: white;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333333;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px;
            font-size: 16px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        input[type="file"] {
            padding: 9px;
        }

        input[type="text"],
        textarea,
        input[type="file"]:focus {
            outline: 0;
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
            padding: 12px 24px;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-primary:focus {
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }

        .img_deg {
            display: block;
            max-width: 250px; /* Ensure the image does not exceed its container's width */
            height: auto; /* Maintain aspect ratio */
            margin-bottom: 15px; /* Add space below the image */
            border-radius: 4px; /* Add rounded corners to the image */
            border: 1px solid #ced4da; /* Add a border around the image */
            padding: 5px; /* Add padding around the image */
            box-sizing: border-box; /* Include padding and border in the image dimensions */
        }


    </style>
</head>
<body>
@include('admin.header')

<div class="d-flex align-items-stretch">
    @include('admin.sidebar')

    <div class="page-content">

        @if(session('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">×</button>
                {{ session('success') }}
            </div>
        @endif
        
        <h1 class="post_title">Update Post</h1>

        <div class="container">
            <form action="{{ url('update_postdone',$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" id="title" value="{{$post->title}}">
                </div>

                <div class="form-group">
                    <label for="description">Post Description</label>
                    <textarea name="description" id="description" rows="6">{{$post->description}}</textarea>
                </div>

                <div>
                    <label>Current Image</label>
                    <img class="img_deg" src="postimages/{{$post->image}}" alt="Current Image">
                </div>


                <div class="form-group">
                    <label for="image">Update Image</label>
                    <input type="file" name="image" id="image">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>

    @include('admin.footer')
</div>

</body>
</html>
