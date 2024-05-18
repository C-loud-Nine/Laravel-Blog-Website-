<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Models\Comment;

class MainController extends Controller
{
    //
    // public function index(){

    //     $post=Post::where('post_status','Active')->get();

    //     return view('index',compact('post'));
    // }

    public function index()
{
    $post = Post::where('post_status', 'Active')->get();
    $latestPosts = Post::where('post_status', 'Active')->orderBy('created_at', 'desc')->take(3)->get();
    return view('index', compact('latestPosts', 'post'));
}
    
    
    public function about(){
        return view('about');
    }
    public function services(){

        $post=Post::where('post_status','Active')->get();

        return view('services',compact('post'));
    }
    public function contact(){
        return view('contact');
    }
    public function blog(){
        return view('blog');
    }

    public function register(){
        return view('register');
    }

    public function login(){

        return view('login');
    }

    public function logout(){
        session()->forget('id');
        session()->forget('type');
        return redirect('/');
    }
    
    public function registerUser(Request $request)
    {
        $newUser = new User();
        
        
        $newUser->Fullname = $request->input('fullname');
        $newUser->Email = $request->input('email');
        $newUser->Password = $request->input('password'); 
        $newUser->picture = $request->file('file')->getClientOriginalName();
        $request->file('file')->move('uploads/profile/', $newUser->picture);
        $newUser->type = "Blogger";

        if ($newUser->save()) {
            return redirect('login')->with('success', 'User Registered Successfully!');
        }

        // Optionally handle the case where the user isn't saved successfully...
        return redirect()->back()->with('error', 'Failed to register user.');
    }  


   
   
   
   
    public function loginUser(Request $request)
{
    // Validate request input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Attempt to authenticate user
    $user = User::where('email', $request->email)->first();

    if ($user) {
        // If the user exists, check the password
        if ($request->password === $user->password) {
            // If the password is correct, log in the user
            session()->put('id', $user->id);
            session()->put('type', $user->type);
            session()->put('fullname', $user->fullname);
            session()->put('picture', $user->picture);

            // Retrieve all posts
            $posts = Post::where('post_status', 'Active')->get();

            // Redirect based on user type
            if ($user->type == "Blogger") {
                return redirect()->route('index')->with(compact('posts'));
            } else if ($user->type == "Admin") {
                return redirect()->route('admin.adminhome');
            }
            
            // Handle redirection for other user types if needed
        } else {
            // If the password is incorrect
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
    } else {
        // If the user does not exist
        return redirect()->back()->with('error', 'User does not exist');
    }
}


// public function adminHome()
//     {
//         // Logic for admin dashboard goes here
//         return view('admin.adminhome'); // Assuming 'admin.adminhome' is the view for the admin dashboard
//     }

public function post_details($id)
{
    $post = Post::find($id);
    $comments = Comment::where('post_id', $id)->get(); // Fetch comments associated with the post
    return view('post_details', compact('post', 'comments'));
}






    public function create_post()
    {
        return view('create_post');
    }

    public function user_post(Request $request)
    {

        // Retrieve user information from session variables
        $user_id = session('id');
        $fullname = session('fullname');
        $type = session('type');


         // Create a new Post instance
         $newPost = new Post();
        
         // Set the post attributes
         $newPost->title = $request->input('title');
         $newPost->description = $request->input('description');
         $newPost->post_status = 'Pending';
         $newPost->name = $fullname;
         $newPost->user_id = $user_id;
         $newPost->type = $type;
     
         // Handle image upload
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = time() . '.' . $image->getClientOriginalExtension();
             $image->move('postimages', $imageName);
             $newPost->image = $imageName;
         }
         
         // Save the post to the database
         if ($newPost->save()) {
             // Redirect back to the post page with success message
             return redirect()->back()->with('success', 'Post added successfully!');
         } else {
             // Redirect back to the post page with error message if saving fails
             return redirect()->back()->with('error', 'Failed to add post. Please try again.');
         }
    }

    public function my_post()
    {
        $user_id = session('id');

        $post = Post::where('user_id', $user_id)->get();

        
        return view('my_post', compact('post'));
    }

    public function my_post_del($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }

    public function post_update_page($id)
    {
        $post = Post::find($id);
        return view('post_update_page', compact('post'));
    }

    public function update_user_postdone(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('postimages', $imageName);
            $post->image = $imageName;
        }

        if ($post->save()) {
            return redirect()->back()->with('success', 'Post updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to update post. Please try again.');
        }
    }



    public function comment(Request $request, $id)
    {
        $post = Post::find($id);

        $newComment = new Comment();

        $newComment->post_id = $post->id;
        $newComment->user_id = session('id');
        $newComment->user_name = session('fullname');
        $newComment->user_image = session('picture');
        $newComment->comment = $request->input('content');

        if ($newComment->save()) {
            return redirect()->back()->with('success', 'Comment added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add comment. Please try again.');
        }
    }



    public function user_profile()
    {
        $user_id = session('id');
        $user = User::find($user_id);
        $published_blogs_count = Post::where('user_id', $user_id)->where('post_status', 'Active')->count();
        $pending_blogs_count = Post::where('user_id', $user_id)->where('post_status', 'Pending')->count();
        $comments = Comment::where('user_id', $user_id)->get();
        return view('user_profile', compact('user', 'comments', 'published_blogs_count', 'pending_blogs_count'));
    }


    public function edit_profile(Request $request, $id)
{
    $request->validate([
        'fullname' => 'required', // Ensure fullname is not empty
        'email' => 'required|email', // Ensure email is not empty and in correct format
        'password' => 'required', // Ensure password is not empty
        // Add more validation rules as needed
    ]);

    $user = User::find($id);

    $user->fullname = $request->input('fullname');
    $user->email = $request->input('email');
    $user->password = $request->input('password');

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads/profile', $imageName);
        $user->picture = $imageName;
    }

    // Save the updated user profile
    if ($user->save()) {
        return redirect()->back()->with('success', 'Profile updated successfully!');
    } else {
        return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
    }
}



public function delete_user($id)
{
    $user = User::find($id);
    $user->delete();
    session()->forget('id');
    session()->forget('type');
    return redirect('/');
    
    
}

public function admin_profile()
{

    $user_id = session('id');
    $user = User::find($user_id);
    $published_blogs_count = Post::where('user_id', $user_id)->where('post_status', 'Active')->count();
    $pending_blogs_count = Post::where('user_id', $user_id)->where('post_status', 'Pending')->count();
    $comments = Comment::where('user_id', $user_id)->get();
    return view('admin.admin_profile', compact('user', 'comments', 'published_blogs_count', 'pending_blogs_count'));
    
}


public function searchPost(Request $request)
{
    $query = $request->get('search');
    $posts = Post::where('title', 'LIKE', '%' . $query . '%')->get();

    if ($request->ajax()) {
        return response()->json($posts);
    }

    $allPosts = Post::all(); // Retrieve all posts for the main page
    return view('services', compact('allPosts'));
}


public function searchResults(Request $request)
{
    $search = $request->input('search');
    $posts = Post::where('title', 'LIKE', '%' . $search . '%')->get();

    return view('search_results', compact('posts', 'search'));
}

    

    

}
