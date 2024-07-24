<?php

use App\Models\Post;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', function () {
    // truy vấn lấy tất cả
    $data = Post::all();
    $data = Post::query()->get();
    $data = Post::query()->where('id', '>=', '1')
    ->get();
    // Thêm
    //c1
    // $post = new Post();
    // $post->title = "Bài viết số 2";
    // $post->content = "Nội dung bài viết 2";
    // $post->save();
    //c2
    $post = Post::query()->create([
        'title' => "bai viet so 3",
        'content' => "noi dung bai viet so 3"
    ]);

    // Sửa
    // $post = Post::query()->find(2);
    // $post->title = "Bài viết số 21";
    // $post->content = "Nội dung bài viết 21";
    // $post->save();
    //c2
    $post = Post::query()->find(2)
    ->update([
        'title' => "bai viet so 12",
        'content' => "ND viet so 3",
    ]);

    // Xóa
    $post = Post::query()->find(4)->delete();
    dd($post);
});
