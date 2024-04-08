<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
        </div>
    </div>
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <div class="row">
                <!-- Total Users -->
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-user-1"></i></div><strong>Total Users</strong>
                            </div>
                            <div class="number dashtext-1">{{ $totalUsers }}</div>
                        </div>
                    </div>
                </div>
                <!-- Total Bloggers -->
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-user-1"></i></div><strong>Total Bloggers</strong>
                            </div>
                            <div class="number dashtext-1">{{ $totalBloggers }}</div>
                        </div>
                    </div>
                </div>
                <!-- Admins -->
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Admins</strong>
                            </div>
                            <div class="number dashtext-4">{{ $totalAdmins }}</div>
                        </div>
                    </div>
                </div>
                <!-- Last Admin Log -->
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Admin Log</strong>
                            </div>
                            <div class="number dashtext-3" style="font-size: smaller;">{{ $lastAdminLog }}</div>
                        </div>
                    </div>
                </div>
                <!-- Total Blogs -->
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-contract"></i></div><strong>Total Blogs</strong>
                            </div>
                            <div class="number dashtext-2">{{ $totalBlogs }}</div>
                        </div>
                    </div>
                </div>
                <!-- Active Blogs -->
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-contract"></i></div><strong>Active Blogs</strong>
                            </div>
                            <div class="number dashtext-2">{{ $activeBlogs }}</div>
                        </div>
                    </div>
                </div>
                <!-- Pending Blogs -->
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Pending Blogs</strong>
                            </div>
                            <div class="number dashtext-3">{{ $pendingBlogs }}</div>
                        </div>
                    </div>
                </div>
                <!-- Incomplete Blogs -->
                <div class="col-md-3 col-sm-6">
                    <div class="statistic-block block">
                        <div class="progress-details d-flex align-items-end justify-content-between">
                            <div class="title">
                                <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Incomplete Blogs</strong>
                            </div>
                            <div class="number dashtext-3">{{ $incompleteBlogs }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






        <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Posted In</strong><span class="d-block">Last 24 Hours</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome1"></canvas>
                        <div class="text"><strong class="d-block">{{ $postsLast24Hours }}</strong><span class="d-block">Posts</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Posted In</strong><span class="d-block">Last 7 Days</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome2"></canvas>
                        <div class="text"><strong class="d-block">{{ $postsLast7Days }}</strong><span class="d-block">Posts</span></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Posted In</strong><span class="d-block">Last 2 Months</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome3"></canvas>
                        <div class="text"><strong class="d-block">{{ $postsLast2Months }}</strong><span class="d-block">Posts</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Joined In</strong><span class="d-block">Last 24 Hours</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome1"></canvas>
                        <div class="text">
                            <strong class="d-block">{{ $usersLast24Hours }}</strong>
                            <span class="d-block">Users</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Joined In</strong><span class="d-block">Last 7 Days</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome"></canvas>
                        <div class="text">
                            <strong class="d-block">{{ $usersLast7Days }}</strong>
                            <span class="d-block">Users</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="stats-with-chart-2 block">
                    <div class="title"><strong class="d-block">Joined In</strong><span class="d-block">Last 2 Months</span></div>
                    <div class="piechart chart">
                        <canvas id="pieChartHome3"></canvas>
                        <div class="text">
                            <strong class="d-block">{{ $usersLast2Months }}</strong>
                            <span class="d-block">Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>









     