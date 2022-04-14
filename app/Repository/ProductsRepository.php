<?php

namespace App\Repository;

use App\Models\Product;
use App\Contracts\ProductsRepositoryContract;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductsRepository extends BaseRepository implements ProductsRepositoryContract
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function productsWithShops(): Builder
    {
        return $this->model->with('shops');
    }

    public function filteredOrderedProducts(Request $request): Collection
    {

        $fields = $request->collect();
        $query = $this->availableFilter($fields);
        unset($fields['available']);
        if (empty($query)) {
            $query = $this->productsWithShops();
        }

        if(!empty($fields)){
            $fields->each(function ($value, $key) use ($query) {
                if ($key == 'sort') {
                    list($sortName, $sortParam) = explode('|', $value);
                    $query->orderBy($sortName, $sortParam);
                } elseif ($key == 'price') {
                    list($min, $max) = explode("|", $value);
                    $query->whereBetween('price', [$min, $max]);
                } else {
                    $query->where($key, "LIKE", '%' . $value . '%');
                }

            });
        }

        return $query->get();
    }
}
