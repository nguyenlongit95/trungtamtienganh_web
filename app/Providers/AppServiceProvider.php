<?php

namespace App\Providers;

use App\Repositories\Article\ArticleEloquentRepository;
use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\Blog\BlogEloquentRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use App\Repositories\Category\CategoryEloquentRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Contact\ContactEloquentRepository;
use App\Repositories\Contact\ContactRepositoryInterface;
use App\Repositories\Tags\TagsEloquentRepository;
use App\Repositories\Tags\TagsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Paygates\PaygateRepositoryInterface::class,
            \App\Repositories\Paygates\PaygateEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Widgets\WidgetRepositoryInterface::class,
            \App\Repositories\Widgets\WidgetEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Users\UserRepositoryinterface::class,
            \App\Repositories\Users\UserEloquentRepository::class
        );
        $this->app->bind(
            \App\Repositories\Menus\MenusRepositoryInterface::class,
            \App\Repositories\Menus\MenusEloquentRepository::class
        );
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryEloquentRepository::class
        );
        $this->app->bind(
            ArticleRepositoryInterface::class,
            ArticleEloquentRepository::class
        );
        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogEloquentRepository::class
        );
        $this->app->bind(
            TagsRepositoryInterface::class,
            TagsEloquentRepository::class
        );
        $this->app->bind(
            ContactRepositoryInterface::class,
            ContactEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
