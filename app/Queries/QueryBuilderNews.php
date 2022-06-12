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

    public function getNews(int $pagNumber): LengthAwarePaginator
    {
        return News::with('category')
            ->with('source')
            ->orderBy('pub_date', 'desc')
            ->paginate($pagNumber);
    }

    public function getNewsOrderById(int $pagNumber): LengthAwarePaginator
    {
        return News::with('category')
            ->with('source')
            ->orderBy('id', 'asc')
            ->paginate($pagNumber);
    }

    public function getNewsByCategory(Category $category): LengthAwarePaginator
    {
        return News::where('category_id', '=', $category->id)
            ->orderBy('pub_date', 'desc')
            ->paginate(9);
    }

    public function getNewsBySource(Source $source): LengthAwarePaginator
    {
        return News::where('source_id', '=', $source->id)
            ->orderBy('pub_date', 'desc')
            ->paginate(9);
    }

    public function getNewsBySlug(string $slug): Builder
    {
        return News::where('slug', '=', $slug)->with('category')->with('source');
    }
}
