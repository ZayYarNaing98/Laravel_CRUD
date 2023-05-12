<?php

namespace App\Providers;

use App\Service\Blog\BlogService;
use Illuminate\Support\ServiceProvider;
use App\Repository\Blog\BlogRepository;
use App\Service\Blog\BlogServiceInterface;
use App\Repository\Blog\BlogRepositoryInterface;
use App\Repository\Post\PostRepository;
use App\Repository\Post\PostRepositoryInterface;
use App\Service\Post\PostService;
use App\Service\Post\PostServiceInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(BlogServiceInterface::class, BlogService::class);

        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(PostServiceInterface::class, PostService::class);

    }
}
