<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderNews implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return News::query();
    }

    public function getNews(): LengthAwarePaginator
    {
        return News::with('category')->with('source')->paginate(9);
    }

    public function getNewsByCategory(Category $category): LengthAwarePaginator
    {
        return News::where('category_id', '=', $category->id)->paginate(9);
    }

    public function getNewsBySource(Source $source): LengthAwarePaginator
    {
        return News::where('source_id', '=', $source->id)->paginate(9);
    }
}
