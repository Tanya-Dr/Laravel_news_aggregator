<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderUsers implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return User::query();
    }

    public function getUsers(): LengthAwarePaginator
    {
        return User::select(['id', 'name', 'email', 'is_admin', 'created_at', 'updated_at', 'avatar'])
            ->paginate(10);
    }
}
