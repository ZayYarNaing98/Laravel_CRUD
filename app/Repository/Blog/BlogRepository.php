<?php

namespace App\Repository\Blog;

use App\Models\Blog;


class BlogRepository implements BlogRepositoryInterface
{
    public function get()
    {
        $data = Blog::with('author')->get();

        return $data;
    }

    public function show($id)
    {
        $result = Blog::where('id', $id)->first();

        return $result;
    }
}
