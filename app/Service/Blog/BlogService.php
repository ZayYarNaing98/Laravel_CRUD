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

        return Blog::create($data);
    }
    public function update($id, $data)
    {
        $result = Blog::where('id', $id)->first();

        if($data['image'] ?? false)
        {
            $imageName = time(). '.' .$data['image']->extension();
            $data['image']->move(public_path('blog_image'), $imageName);
            $data = array_merge($data, ['image' => $imageName]);

            // $old_image = public_path('blog_image/' . $result->image);

            // if(file_exists($old_image)){
            //     unlink($old_image);
            // }
            $result -> author_id = $data['author_id'];
        }
        return $result->update($data);
    }
}
