<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
    }

    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            // abort(404);
            throw new ModelNotFoundException();
        }

        return file_get_contents($path);

        // return cache()->remember("posts.{$slug}", now()->addSeconds(10), fn() => file_get_contents($path));

    }
}
