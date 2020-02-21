<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;
use App\Tag;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    $post = Post::create(['name'=>'My second post']);
    $tag1 = Tag::findOrFail(3);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'video2.mov']);
    $tag2 = Tag::findOrFail(4);
    $video->tags()->save($tag2);
});

Route::get('/read', function () {
    $post = Post::findOrFail(2);

    foreach ($post->tags as $tag){
        echo $tag->name."<br>";
    }
});

Route::get('/update', function () {
    $post = Post::findOrFail(2);

    foreach ($post->tags as $tag){
        $tag->whereName('PHP')->update(['name'=>'Laravel PHP']);
    }
});

Route::get('/delete', function () {
    $post = Post::findOrFail(1);

    foreach ($post->tags as $tag){
        $tag->whereId(3)->delete();
    }
});
