<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('index/{team_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);

Route::get('doctor/{doctor_id}/team_id/{team_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewDoctor']);
Route::get('blog-details/{blog_category_id}/team_id/{team_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewBlogCategory']);

Route::get('blog/{blog_id}/team_id/{team_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewBlog']);


// Route::get('/blog-details/{blog_category_id}/blog/{blog_id}/team_id/{team_id}', [App\Http\Controllers\Frontend\FrontendController::class, 'viewBlogdetails']);



//______________________________View English___________________________________________________________

Route::get('indexen/{team_id}', [App\Http\Controllers\Frontend\En\FrontendController::class, 'indexEN']);
Route::get('doctor-en/{doctor_id}/team_id/{team_id}', [App\Http\Controllers\Frontend\En\FrontendController::class, 'viewDoctor']);
Route::get('blog-details-en/{blog_category_id}/team_id/{team_id}', [App\Http\Controllers\Frontend\En\FrontendController::class, 'viewBlogCategory']);
Route::get('blog-en/{blog_id}/team_id/{team_id}', [App\Http\Controllers\Frontend\En\FrontendController::class, 'viewBlog']);
