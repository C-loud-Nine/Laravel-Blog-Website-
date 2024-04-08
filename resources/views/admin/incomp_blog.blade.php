<!DOCTYPE html>
<html>
<head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .table_deg {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
            color: #333;
        }

        .th_deg {
            background-color: #007bff;
            color: white;
            padding: 15px;
            font-weight: bold;
            text-align: center;
            border: 1px solid #ccc;
        }

        .td_deg {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .img_deg {
            width: 100px;
            height: auto;
            padding: 5px;
            display: block;
            margin: 0 auto;
        }

        .user-picture {
            width: 50px;
            height: auto;
        }

        .remove-btn {
            padding: 8px 16px;
            margin: 5px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .remove-btn:hover {
            background-color: #c82333;
        }

        .tick-mark::after {
            content: '\2713'; /* Checkmark symbol */
            color: green;
            font-size: 18px;
        }

        .cross-mark::after {
            content: '\2717'; /* Cross symbol */
            color: red;
            font-size: 18px;
        }

        /* Custom table colors */
        .table_deg thead tr {
            background-color: #007bff;
            color: white;
        }

        .table_deg tbody tr:nth-child(even) {
            background-color: #f2f2f2;
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

        <h1 class="title_deg">Incomplete Blogs</h1>
        <table class="table_deg">
            <thead>
                <tr class="th_deg">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Posted By</th>
                    <th>User ID</th> 
                    <th>User Type</th>
                    <th>Action</th> <!-- Add column for action -->
                </tr>
            </thead>
            <tbody>
                @foreach ($incomp_blog as $blog)
                <tr class="td_deg">
                    <!-- Display blog information -->
                    <td>{{ $blog->id }}</td>
                    <td>@if ($blog->title) {{ $blog->title }} @else <span class="cross-mark"></span> @endif</td>
                    <td class="@if ($blog->description) tick-mark @else cross-mark @endif"></td>
                    <td class="@if ($blog->image) tick-mark @else cross-mark @endif"></td>
                    <td class="@if ($blog->user) tick-mark @else cross-mark @endif"></td>
                    <td class="@if ($blog->user_id) tick-mark @else cross-mark @endif"></td>
                    <td class="@if ($blog->type) tick-mark @else cross-mark @endif"></td>
                    <td class="td_deg">
                        <a href="{{url('delete_post',$blog->id)}}" class="btn btn-danger" onclick="return confirm('Would You Like to Proceed ?')">Delete</a>
                    </td> <!-- Button to delete -->
                </tr>
                @endforeach
            </tbody>
        </table>
        </div> 
        @include('admin.footer')
    </div>

</body>
</html>
