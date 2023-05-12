<?php

namespace App\Repository\Post;

use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function get()
    {
        $data = Post::all();

        return $data;
    }

    public function show($id)
    {
        $result = Post::where('id', $id)->first();

        return $result;
    }
}


