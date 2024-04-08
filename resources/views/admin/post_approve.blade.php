<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">

        .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: white; /* Change title color */
            padding: 30px;
            text-align: center;
        }

        .table_deg {
            width: 90%;
            margin: 0 auto; /* Center the table horizontally */
            border-collapse: collapse; /* Collapse borders */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
            background-color: #f8f9fa; /* Change background color */
            color: #333; /* Change text color */
        }

        .th_deg {
            background-color:  #007bff; /* Change header background color to blue */
            color: white;
            padding: 15px; /* Increase padding for header cells */
            font-weight: bold;
            text-align: center;
            border: 1px solid #ccc; /* Add border to header cells */
        }

        .td_deg {
            padding: 10px; /* Add padding for data cells */
            text-align: center;
            border: 1px solid #ccc; /* Add border to data cells */
        }

        .img_deg {
            width: 100px; /* Adjust image width */
            height: auto; /* Maintain aspect ratio */
            padding: 5px; /* Add padding around images */
            display: block; /* Ensure images are centered */
            margin: 0 auto; /* Center images horizontally */
        }

        .btn-success, .btn-danger {
            padding: 8px 12px; /* Adjust button padding */
            margin: 5px; /* Add margin around buttons */
            border-radius: 5px; /* Add border radius */
            cursor: pointer; /* Add cursor style */
            transition: background-color 0.3s ease-in-out; /* Add transition effect */
        }

        .btn-success {
            background-color: #28a745; /* Change button background color to green */
            color: white; /* Change button text color to white */
            border: none; /* Remove button border */
        }

        .btn-success:hover {
            background-color: #218838; /* Darken button color on hover */
        }

        .btn-danger {
            background-color: #dc3545; /* Change button background color to red */
            color: white; /* Change button text color to white */
            border: none; /* Remove button border */
        }

        .btn-danger:hover {
            background-color: #c82333; /* Darken button color on hover */
        }

        /* Style for the description area */
        .td_description {
            max-width: 300px; /* Set maximum width for description */
            overflow: hidden; /* Hide overflowing content */
            text-overflow: ellipsis; /* Display ellipsis for long text */
            white-space: nowrap; /* Prevent wrapping */
            vertical-align: middle; /* Center text vertically */
        }

    </style>
</head>
<body>
@include('admin.header')

<div class="d-flex align-items-stretch">

    @include('admin.sidebar')

    <div class="page-content">

        @if(Session::has('success'))
        
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session('success') }}
        </div>
        
        @endif
        
        <h1 class="title_deg">Pending Posts</h1>

        <table class="table_deg">
            <tr class="th_deg">
                <th style="padding: 15px;">Post Title</th>
                <th style="padding: 15px;">Description</th>
                <th style="padding: 15px;">Posted By</th>
                <th style="padding: 15px;">Post Status</th>
                <th style="padding: 15px;">User Type</th>
                <th style="padding: 15px;">Image</th>
                <th style="padding: 15px;">Status Accept</th>
                <th style="padding: 15px;">Status Reject</th>
            </tr>

            @foreach($post as $post)
            <tr>
                <td class="td_deg">{{$post->title}}</td>
                <td class="td_deg td_description">{{$post->description}}</td>
                <td class="td_deg">{{$post->name}}</td>
                <td class="td_deg">{{$post->post_status}}</td>
                <td class="td_deg">{{$post->type}}</td>
                <td class="td_deg">
                    <img class="img_deg" src="postimages/{{$post->image}}">
                </td>
                <td class="td_deg">
                    <a href="{{url('accept_post',$post->id)}}" class="btn btn-success">Accept</a>
                </td>
                <td class="td_deg">
                    <a href="{{url('delete_post',$post->id)}}" class="btn btn-danger" onclick="return confirm('Would You Like to Proceed ?')">Reject</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    @include('admin.footer')
</div>

</body>
</html>
