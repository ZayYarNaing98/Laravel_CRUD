<?php

namespace App\Service\Blog;

interface BlogServiceInterface
{
    public function store($data);

    public function update($id, $data);
}

