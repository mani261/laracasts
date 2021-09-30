<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});


Route::get('posts/{post}', function($slug){
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if (! file_exists($path)) {
        abort(404);
    }

    $post = cache()->remember("posts.{$slug}", now()->addDays(1), function () use ($path)
    {
        // var_dump("file get contents");
        return file_get_contents($path);
    });

    return view('post', [
        'title' => $post
    ]);
})->whereNumber('post');

/* Route::get('/posts', function () {
    return view('index');
});

Route::get('/post', function () {
    return view('post');
}); */

Route::get('/login', function(){
    return view('form');
});

Route::post('submit', function(Request $request){
    // dd($_POST);
    echo $request['email'];
    // dd($request->all());
});

// Route::get('/home', 'IndexController@home');