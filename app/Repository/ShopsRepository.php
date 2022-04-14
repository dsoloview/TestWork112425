<?php

namespace App\Repository;

use App\Contracts\ShopsRepositoryContract;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ShopsRepository extends BaseRepository implements ShopsRepositoryContract
{
    protected $model;

    public function __construct(Shop $model)
    {
        $this->model = $model;
    }

    public function shopsWithProducts(): Builder
    {
        return $this->model->with('products');
    }

    public function filteredOrderedShops(Request $request): Collection
    {


        $fields = $request->collect();
        $query = $this->availableFilter($fields);
        unset($fields['available']);
        if (empty($query)) {
            $query = $this->shopsWithProducts();
        }

        if($fields){
            $fields->each(function ($value, $key) use ($query) {
                if ($key == 'sort') {
                    list($sortName, $sortParam) = explode('|', $value);
                    $query->orderBy($sortName, $sortParam);
                } else {
                    $query->where($key, "LIKE", '%' . $value . '%');
                }

            });
        }

        return $query->get();
    }
}
