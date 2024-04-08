<x-header />

<div class="about_section layout_padding">
    <div class="container" style="width: 90%; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <img src="postimages/{{$post->image}}" class="post-image" style="width: 100%; max-width: 600px; height: auto; border-radius: 10px; margin: 0 auto 30px; display: block; border: 2px solid #ddd;">
        <h1 class="post-title" style="font-size: 30px; font-weight: bold; color: #333; margin-bottom: 20px; text-align: center;">{{$post->title}}</h1>
        <div class="post-description" style="font-size: 20px; color: #fff; margin-bottom: 30px; padding: 20px; background-color: #333; border-radius: 5px; line-height: 1.5;">
            <?php
                // Explode the description into an array of lines
                $lines = explode(PHP_EOL, $post->description);
                // Output each line with equal spacing
                foreach($lines as $line) {
                    echo '<div style="margin-bottom: 10px;">'.$line.'</div>';
                }
            ?>
        </div>
        <p class="post-meta" style="font-size: 16px; color: #888; margin-bottom: 20px; text-align: center;">Posted By <b>{{$post->name}}</b> | Type: {{$post->type}} | Posted At: {{$post->created_at}}</p>
    </div>
</div>

<!-- Comment Section -->
<div class="comment_section layout_padding">
    <div class="container" style="width: 90%; margin: 0 auto;">
        <h2 class="comment-heading" style="font-size: 24px; font-weight: bold; margin-bottom: 20px; text-align: center;">Comments</h2>
        
        <!-- Display comments -->
        <div class="comments">
            @foreach($comments as $comment)
            <div class="comment" style="margin-bottom: 20px; padding: 15px; border-radius: 10px; background-color: #f9f9f9;">
                <div style="display: flex; align-items: center;">
                    <img src="uploads/profile/{{ $comment->user_image }}" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                    <div>
                        <p style="font-weight: bold; color: #333; margin-bottom: 5px;">{{ $comment->comment }}</p>
                        <span style="font-weight: bold; color: #666;">By: {{ $comment->user_name }}</span> <!-- Assuming you have a relationship with the user who posted the comment -->
                        <span style="color: #888; margin-left: 10px;">Posted At: {{ $comment->created_at }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Comment Form -->
        <div class="comment-form" style="margin-top: 30px;">
            <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 20px; text-align: center;">Leave a Comment</h3>
            @if(session()->has('id')) <!-- Check if the user is logged in using sessions -->
                <form action="{{ URL::to('comment', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" placeholder="Your Comment" class="form-control" rows="5" style="border-radius: 10px; border: 1px solid #ddd; padding: 10px;" required></textarea>
                    </div>
                    <!-- Add hidden input field for storing user's picture -->
                    <button type="submit" class="btn btn-primary" style="border-radius: 10px; padding: 10px 20px;">Submit</button>
                </form>
            @else <!-- If the user is not logged in, prompt them to log in -->
                <p style="font-size: 16px; color: #666; text-align: center;">Please <a href="{{ URL::to('/login') }}" style="color: #007bff; text-decoration: none; font-weight: bold;">login</a> to leave a comment.</p>
            @endif
        </div>
    </div>
</div>

<x-footer />
