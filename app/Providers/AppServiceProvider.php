<?php

namespace App\Providers;

use App\Http\Controllers\Admin\MainController;
use App\Interfaces\ArticleInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\GuestArticleInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\UserInterface;
use App\Repositories\ArticleRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\GuestArticleRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use App\Utils\ModelStats;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ArticleInterface::class, ArticleRepository::class);
        $this->app->bind(GuestArticleInterface::class, GuestArticleRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
