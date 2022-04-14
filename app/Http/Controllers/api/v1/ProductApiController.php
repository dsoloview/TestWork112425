<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\ProductsRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected ProductsRepositoryContract $productsRepository;

    public function __construct(ProductsRepositoryContract $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }
    public function index(Request $request)
    {
        $products = $this->productsRepository->filteredOrderedProducts($request);
        return ProductResource::collection($products);
    }
}
