<?php

namespace App\Contracts;

use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface ShopsRepositoryContract
{
    public function shopsWithProducts(): Builder;
    public function filteredOrderedShops(Request $request): Collection;
}
