<x-header /> <!-- Include the header -->

<!-- services section start -->
<div class="services_section layout_padding" style="background-color: #f2f2f2; padding: 50px 0;">
    <div class="container">
        <!-- Title and search bar container -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h1 class="services_taital" style="color: #333; font-size: 36px;">Blog Posts</h1>
            <form action="{{ route('searchResults') }}" method="GET" id="searchForm" style="position: relative; display: flex;">
                <input type="text" name="search" id="searchBar" placeholder="Search posts..." style="padding: 10px; width: 300px; border: 1px solid #ccc; border-radius: 5px 0 0 5px;" autocomplete="off">
                <button type="submit" style="padding: 10px 20px; border: none; background-color: #837DB8; color: #fff; border-radius: 0 5px 5px 0; cursor: pointer;">Search</button>
                <div id="searchResults" style="position: absolute; top: 100%; left: 0; background: white; z-index: 10; width: 100%; border: 1px solid #ccc; border-radius: 5px; display: none; max-height: 200px; overflow-y: auto;"></div>
            </form>
        </div>

        <p class="services_text" style="color: #666; font-size: 18px; text-align: center; margin-bottom: 30px;">Explore our latest blog posts covering a wide range of topics including technology, lifestyle, travel, food, and more. Stay updated with insightful articles, captivating stories, and thought-provoking discussions.</p>
        <div class="services_section_2">
            <div class="row">
                @foreach($post as $post)
                    <div class="col-md-4" style="margin-bottom: 50px;">
                        <div class="post_image_container" style="height: 200px; display: flex; justify-content: center; align-items: center; overflow: hidden;">
                            <img src="postimages/{{$post->image}}" class="services_img" style="max-width: 100%; max-height: 100%; border-radius: 5px;">
                        </div>
                        <h2 style="margin-top: 20px; font-size: 24px; text-align: center;">{{$post->title}}</h2>
                        <p style="font-size: 16px; color: #666; text-align: center;">Posted By <b>{{$post->name}}</b></p>
                        <div class="btn_main text-center" style="margin-top: 20px;"><a href="{{url('post_details',$post->id)}}" style="text-decoration: none; background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px; display: inline-block;">READ MORE</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- services section end -->

<x-footer />

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- AJAX script for real-time search -->
<script>
    $(document).ready(function(){
        $('#searchBar').on('keyup', function(e){
            let query = $(this).val();
            if(e.key === 'Enter' && query.length > 0) {
                $('#searchForm').submit();
            } else if(query.length > 0) {
                $.ajax({
                    url: "{{ route('searchPost') }}",
                    type: "GET",
                    data: {'search': query},
                    success: function(data){
                        let searchResults = $('#searchResults');
                        searchResults.html('');
                        if(data.length > 0) {
                            searchResults.show();
                            $.each(data, function(index, post) {
                                searchResults.append(`
                                    <div class="search-result-item" style="display: flex; align-items: center; padding: 10px; border-bottom: 1px solid #ddd; cursor: pointer;">
                                        <div style="flex-shrink: 0; width: 50px; height: 50px; margin-right: 10px;">
                                            <img src="postimages/${post.image}" alt="${post.title}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 5px;">
                                        </div>
                                        <div>
                                            <a href="post_details/${post.id}" style="text-decoration: none; color: #2C67D1; font-size: 14px;">${post.title}</a>
                                        </div>
                                    </div>
                                `);
                            });
                        } else {
                            searchResults.hide();
                        }
                    }
                });
            } else {
                $('#searchResults').html('').hide();
            }
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#searchForm').length) {
                $('#searchResults').hide();
                $('#searchBar').val('');
            }
        });

        $('#searchResults').on('click', '.search-result-item', function() {
            window.location = $(this).find('a').attr('href');
        });
    });
</script>

<style>
    .post-item:hover {
        transform: scale(1.05);
        transition: transform 0.3s;
    }
    .search-result-item:hover {
        background-color: #C7CADA;
    }
</style>
