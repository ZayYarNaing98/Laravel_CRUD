<?php

namespace App\Repository\Post;

interface PostRepositoryInterface
{
    public function get();

    public function show($id);
}
