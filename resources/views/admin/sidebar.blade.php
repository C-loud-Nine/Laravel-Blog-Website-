<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
            <img src="uploads/profile/{{ session('picture') }}" alt="Profile Picture" class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">{{ session('fullname') }}</h1>
            <p>Admin</p>
        </div>
    </div>

    <!-- Sidebar Navigation Menus -->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{ Request::is('admin.adminhome') ? 'active' : '' }}">
            <a href="{{ url('admin.adminhome') }}"> <i class="icon-home"></i>Home</a>
        </li>
        <li class="{{ Request::is('post_page') ? 'active' : '' }}">
            <a href="{{ url('post_page') }}"> <i class="icon-grid"></i>Add Blog</a>
        </li>
        <li class="{{ Request::is('admin_profile') ? 'active' : '' }}">
            <a href="{{ url('admin_profile') }}"> <i class="icon-chart"></i>Admin Profile</a>
        </li>
        <li class="{{ Request::is('view_post') ? 'active' : '' }}">
            <a href="{{ url('view_post') }}"> <i class="fa fa-bar-chart"></i>View Blog</a>
        </li>
        <li class="{{ Request::is('post_approve') ? 'active' : '' }}">
            <a href="{{ url('post_approve') }}"> <i class="icon-padnote"></i>Blog Approval</a>
        </li>
        <li class="{{ Request::is('adminlist') ? 'active' : '' }}">
            <a href="{{ url('adminlist') }}"> <i class="icon-home"></i>Admin List</a>
        </li>
        <li class="{{ Request::is('bloggers') ? 'active' : '' }}">
            <a href="{{ url('bloggers') }}"> <i class="icon-chart"></i>Bloggers</a>
        </li>
        <li class="{{ Request::is('promotion') ? 'active' : '' }}">
            <a href="{{ url('promotion') }}"> <i class="fa fa-bar-chart"></i>Admin Promotion</a>
        </li>
        <li class="{{ Request::is('incomp_blog') ? 'active' : '' }}">
            <a href="{{ url('incomp_blog') }}"> <i class="icon-grid"></i>Incomplete Blogs</a>
        </li>
        
    </ul>
</nav>
