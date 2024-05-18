<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // public function adminHome(){

    //     return view('admin.adminhome');
    // }

//     public function adminHome()
// {
//     // Retrieve total users count
//     $totalUsers = User::count();

//     // Retrieve total blogs count
//     $totalBlogs = Post::count();

//     // Retrieve pending blogs count
//     $pendingBlogs = Post::where('post_status', 'Pending')->count();

//     // Retrieve total admins count (you need to define the criteria for admin users)
//     $totalAdmins = User::where('type', 'Admin')->count();

//     return view('admin.adminhome', [
//         'totalUsers' => $totalUsers,
//         'totalBlogs' => $totalBlogs,
//         'pendingBlogs' => $pendingBlogs,
//         'totalAdmins' => $totalAdmins,
//     ]);
// }



public function adminHome()
{

    if (session()->get('type') !== 'Admin') {
        // If the user is not an admin, redirect to 401 Unauthorized page
        return abort(401, 'Unauthorized Access');
    }


    try {
        // Retrieve total users count
        $totalUsers = User::count();

        // Retrieve total blogs count
        $totalBlogs = Post::count();

        // Retrieve pending blogs count
        $pendingBlogs = Post::where('post_status', 'Pending')->count();

        // Retrieve total admins count
        $totalAdmins = User::where('type', 'Admin')->count();

        // Retrieve total posts count for the last 24 hours
        $postsLast24Hours = Post::where('created_at', '>=', now()->subHours(24))->count() ?? 0;

        // Retrieve total posts count for the last 7 days
        $postsLast7Days = Post::where('created_at', '>=', now()->subDays(7))->count();

        // Retrieve total posts count for the last 2 months
        $postsLast2Months = Post::where('created_at', '>=', now()->subMonths(2))->count();

        // Retrieve users joined in the last 24 hours
        $usersLast24Hours = User::where('created_at', '>=', now()->subHours(24))->count() ?? 0;

        // Retrieve users joined in the last 7 days
        $usersLast7Days = User::where('created_at', '>=', now()->subDays(7))->count();

        // Retrieve users joined in the last 2 months
        $usersLast2Months = User::where('created_at', '>=', now()->subMonths(2))->count();

        // Retrieve total bloggers count (users who are not admins)
        $totalBloggers = User::where('type', '!=', 'Admin')->count();

        // Retrieve active blogs count (posts with a status other than "Pending")
        $activeBlogs = Post::where('post_status', '!=', 'Pending')->count();

        // Retrieve incomplete blogs count (posts that have at least one null attribute)
        $incompleteBlogs = Post::whereNull('image')
            ->orWhereNull('title')
            ->orWhereNull('description')
            ->orWhereNull('name')
            ->orWhereNull('user_id')
            ->orWhereNull('type')
            ->orWhereNull('id')
            ->count();

        // Retrieve last admin log timestamp
        $lastAdminLog = Post::latest()->value('created_at');

        return view('admin.adminhome', [
            'totalUsers' => $totalUsers,
            'totalBlogs' => $totalBlogs,
            'pendingBlogs' => $pendingBlogs,
            'totalAdmins' => $totalAdmins,
            'postsLast24Hours' => $postsLast24Hours,
            'postsLast7Days' => $postsLast7Days,
            'postsLast2Months' => $postsLast2Months,
            'usersLast24Hours' => $usersLast24Hours,
            'usersLast7Days' => $usersLast7Days,
            'usersLast2Months' => $usersLast2Months,
            'totalBloggers' => $totalBloggers,
            'activeBlogs' => $activeBlogs,
            'incompleteBlogs' => $incompleteBlogs,
            'lastAdminLog' => $lastAdminLog,
        ]);
    } catch (\Exception $e) {
        dd($e->getMessage()); // Print the exception message for debugging
    }
}




    
    
    
    
    public function post_page(){
        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }
        return view('admin.post_page');
    }

    public function add_post(Request $request){
        // Retrieve user information from session variables
        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }
        
        $user_id = session('id');
        $fullname = session('fullname');
        $type = session('type');
    
        // Create a new Post instance
        $newPost = new Post();
        
        // Set the post attributes
        $newPost->title = $request->input('title');
        $newPost->description = $request->input('description');
        $newPost->post_status = 'Active';
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

    public function view_post(){

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }
        
        $post=Post::where('post_status','Active')->get();


        return view('admin.view_post',compact('post'));
    }

    public function delete_post($id){

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        $post=Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }

    public function update_post($id){
        $post=Post::find($id);
        return view('admin.update_post',compact('post'));
    }

    public function update_postdone(Request $request,$id){

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->description=$request->input('description');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('postimages', $imageName);
            $post->image = $imageName;
        }
        $post->save();
        return redirect()->back()->with('success', 'Post updated successfully!');
    }


    public function post_approve(){

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        $post=Post::where('post_status','Pending')->get();
        return view('admin.post_approve',compact('post'));
    }

    public function accept_post($id){

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        $post=Post::find($id);
        $post->post_status='Active';
        $post->save();
        return redirect()->back()->with('success', 'Post approved successfully!');
    }

    public function bloggers(){

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        $bloggers=User::where('type','Blogger')->get();
        return view('admin.bloggers',compact('bloggers'));
    }

    public function remove_user($id){

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User removed successfully!');
    }


    public function incomp_blog()
    {
        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        $incomp_blog = Post::whereNull('image')
            ->orWhereNull('title')
            ->orWhereNull('description')
            ->orWhereNull('name')
            ->orWhereNull('user_id')
            ->orWhereNull('type')
            ->orWhereNull('id')
            ->get();
    
        return view('admin.incomp_blog', compact('incomp_blog'));
    }

    public function promotion()
    {
        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        // Calculate the timestamp for 48 hours ago
        $time = now()->subHours(48);

        // Retrieve bloggers who have joined at least 48 hours ago
        $bloggers = User::where('type', 'Blogger')
                        ->where('created_at', '<=', $time)
                        ->get();

        return view('admin.promotion', compact('bloggers'));
    }


    public function add_promotion($id){

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }

        $bloggers=User::find($id);
        $bloggers->type='Admin';
        $bloggers->save();
        return redirect()->back()->with('success', 'Admin added successfully!');
    }



    public function adminlist()
    {

        if (session()->get('type') !== 'Admin') {
            // If the user is not an admin, redirect to 401 Unauthorized page
            return abort(401, 'Unauthorized Access');
        }
        
        $bloggers = User::where('type', 'Admin')->get();
        return view('admin.adminlist', compact('bloggers'));
    }


    
    
}
