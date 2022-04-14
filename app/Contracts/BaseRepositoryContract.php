<?php

namespace App\Contracts;

use Illuminate\Support\Collection;

interface BaseRepositoryContract
{
    public function all(): Collection;
    public function availableProducts(): \Illuminate\Database\Eloquent\Builder;
    public function availableFilter($fields);
}
