<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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



    $document = YamlFrontMatter::parseFile(resource_path('posts/2.html'));

    ddd($document->title);

    // return view('posts', [
    //     'posts' => Post::all()
    // ]);
});


Route::get('posts/{post}', function ($slug) {

    $post = Post::find($slug);
    return view(
        'post',
        [
            'post' => $post
        ]
    );
})->whereNumber('post');

// Route::get('/home', 'IndexController@home');
