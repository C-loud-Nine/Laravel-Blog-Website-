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
            margin: 0 auto; /* Center the table horizontally */
            border-collapse: collapse; /* Collapse borders */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
            background-color: #f8f9fa; /* Change background color */
            color: #333; /* Change text color */
        }

        .th_deg {
            background-color:  #007bff; /* Change header background color */
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

        .user-picture {
            width: 50px;
            height: auto;
        }

        .remove-btn {
            padding: 8px 16px; /* Adjust button padding */
            margin: 5px; /* Add margin around button */
            background-color: #dc3545; /* Change button background color to red */
            color: white; /* Change button text color to white */
            border: none; /* Remove button border */
            border-radius: 5px; /* Add border radius */
            cursor: pointer; /* Add cursor style */
            transition: background-color 0.3s ease-in-out; /* Add transition effect */
        }

        .remove-btn:hover {
            background-color: #c82333; /* Darken button color on hover */
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
            
        
        <h1 class="title_deg">Admin List</h1>
            <table class="table_deg">
                <thead>
                    <tr class="th_deg">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Profile Picture</th>
                        <th>Joined At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bloggers as $blogger)
                    <tr class="td_deg">
                        <td>{{ $blogger->id }}</td>
                        <td>{{ $blogger->fullname }}</td>
                        <td>{{ $blogger->email }}</td>
                        <td class="td_deg">
                            <img class="img_deg" src="uploads/profile/{{$blogger->picture}}" alt="Profile Picture">
                        </td>
                        <td>{{ $blogger->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('admin.footer')
    </div>
</body>
</html>
