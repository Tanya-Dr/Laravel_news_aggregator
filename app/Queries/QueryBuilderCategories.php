<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderCategories implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Category::query();
    }

    public function getCategories(): LengthAwarePaginator
    {
        return Category::select(['id','title','description','created_at','updated_at'])
            ->withCount('news')
            ->paginate(10);
    }

    public function getCategoryById(int $id)
    {
        return Category::select(['id','title','description','created_at'])
            ->findOrFail($id);
    }
}
