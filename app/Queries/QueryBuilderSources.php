<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Source;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderSources implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Source::query();
    }

    public function getSources(): LengthAwarePaginator
    {
        return Source::withCount('news')->paginate(10);
    }
}
