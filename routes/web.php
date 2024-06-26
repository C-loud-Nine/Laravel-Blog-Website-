<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;



//   MainController


Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/about', [MainController::class,'about']);
Route::get('/services', [MainController::class,'services']);
Route::get('/contact', [MainController::class,'contact']);
Route::get('/blog', [MainController::class,'blog']);
Route::get('/register', [MainController::class,'register']);
Route::get('/login', [MainController::class,'login']);
Route::post('/registerUser', [MainController::class,'registerUser']);
Route::post('/loginUser', [MainController::class,'loginUser']);
Route::get('/logout', [MainController::class,'logout']);


Route::get('/post_details/{id}', [MainController::class, 'post_details'])->name('post_details');
Route::post('/post_details/{id}', [MainController::class, 'post_details'])->name('post_details');
Route::get('/create_post', [MainController::class, 'create_post'])->name('create_post');
Route::post('/user_post', [MainController::class, 'user_post'])->name('user_post');
Route::get('/my_post', [MainController::class, 'my_post'])->name('my_post');
Route::get('/my_post_del/{id}', [MainController::class, 'my_post_del'])->name('my_post_del');

Route::get('/post_update_page/{id}', [MainController::class, 'post_update_page'])->name('post_update_page');
Route::post('/update_user_postdone/{id}', [MainController::class, 'update_user_postdone'])->name('update_user_postdone');
Route::get('/comment/{id}', [MainController::class, 'comment'])->name('comment');
Route::post('/comment/{id}', [MainController::class, 'comment'])->name('comment');

Route::get('/user_profile', [MainController::class, 'user_profile'])->name('user_profile');
Route::get('/edit_profile/{id}', [MainController::class, 'edit_profile'])->name('edit_profile');
Route::post('/edit_profile/{id}', [MainController::class, 'edit_profile'])->name('edit_profile');
Route::get('/delete_user/{id}', [MainController::class, 'delete_user'])->name('delete_user');
Route::get('/admin_profile', [MainController::class, 'admin_profile'])->name('admin_profile');

Route::get('/search', [MainController::class, 'searchPost'])->name('searchPost');
Route::get('/search-results', [MainController::class, 'searchResults'])->name('searchResults');





//  AdminController 


Route::get('/admin/adminhome', [AdminController::class, 'adminHome'])->name('admin.adminhome')->middleware('admin');
Route::post('/admin/adminhome', [AdminController::class, 'adminHome'])->name('admin.adminhome')->middleware('admin');

Route::get('/post_page', [AdminController::class, 'post_page'])->middleware('admin');
Route::get('/bloggers', [AdminController::class, 'bloggers'])->middleware('admin');

Route::post('/add_post', [AdminController::class, 'add_post'])->middleware('admin');
Route::get('/view_post', [AdminController::class, 'view_post'])->middleware('admin');
Route::get('/admin.adminhome', [AdminController::class, 'adminHome'])->middleware('admin');
Route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->middleware('admin');
Route::get('/update_post/{id}', [AdminController::class, 'update_post'])->middleware('admin');
Route::post('/update_postdone/{id}', [AdminController::class, 'update_postdone'])->middleware('admin');
Route::get('/post_approve', [AdminController::class, 'post_approve'])->middleware('admin');
Route::get('/accept_post/{id}', [AdminController::class, 'accept_post'])->middleware('admin');
Route::get('remove_user/{id}', [AdminController::class, 'remove_user'])->middleware('admin');
Route::get('/incomp_blog', [AdminController::class, 'incomp_blog'])->middleware('admin');
Route::get('/promotion', [AdminController::class, 'promotion'])->middleware('admin');
Route::post('/add_promotion', [AdminController::class, 'add_promotion'])->middleware('admin');
Route::get('/add_promotion/{id}', [AdminController::class, 'add_promotion'])->middleware('admin');
Route::get('/adminlist', [AdminController::class, 'adminlist'])->middleware('admin');




// NewsController

Route::get('/newsapi',[NewsController::class,'showNews']);
Route::get('/newsdetails/{id}', [NewsController::class, 'showNewsDetails'])->name('news.details');







