<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\BaseRepositoryContract;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->get();
    }

    public function availableProducts(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->model->with('available');
    }

    public function availableFilter($fields)
    {
        if($fields->has('available')) {
            unset($fields['available']);
            return $this->availableProducts();
        }
    }
}
