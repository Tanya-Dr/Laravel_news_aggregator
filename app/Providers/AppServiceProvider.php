<?php

namespace App\Providers;

use App\Queries\QueryBuilder;
use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderNews;
use App\Queries\QueryBuilderOrders;
use App\Queries\QueryBuilderReviews;
use App\Queries\QueryBuilderSources;
use App\Queries\QueryBuilderUsers;
use App\Services\Contract\Parser;
use App\Services\Contract\Social;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Pagination\Paginator;
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
        //query builders
        $this->app->bind(QueryBuilder::class, QueryBuilderCategories::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderNews::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderOrders::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderReviews::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderSources::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderUsers::class);

        //services
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
