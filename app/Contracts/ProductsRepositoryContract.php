<?php

namespace App\Contracts;

use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface ProductsRepositoryContract
{
    public function productsWithShops(): Builder;
    public function filteredOrderedProducts(Request $request): Collection;
}
