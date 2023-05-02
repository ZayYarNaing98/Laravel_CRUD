<?php

namespace App\Service\Blog;

use App\Models\Blog;

class BlogService implements BlogServiceInterface
{
    public function store($data)
    {
        if($data['image'])
        {
            $imageName = time(). '.' .$data['image']->extension();
            $data['image']->move(public_path('blog_image'), $imageName);
            $data = array_merge($data, ['image' => $imageName]);
        }

        Blog::create($data);
    }
    public function update()
    {

    }
}
