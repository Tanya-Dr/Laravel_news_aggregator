<?php

namespace App\Queries;

use App\Models\Order;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderOrders implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Order::query();
    }

    public function getOrders(): LengthAwarePaginator
    {
        return Order::paginate(10);
    }
}
