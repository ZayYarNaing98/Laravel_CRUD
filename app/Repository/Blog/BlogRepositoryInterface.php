<?php

namespace App\Repository\Blog;

interface BlogRepositoryInterface
{
    public function get();

    public function show($id);
}
