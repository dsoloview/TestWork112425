<?php

namespace App\Http\Controllers\api\v1;

use App\Contracts\ShopsRepositoryContract;
use App\Http\Controllers\Controller;
use App\Http\Resources\ShopResource;
use Illuminate\Http\Request;

class ShopApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected ShopsRepositoryContract $shopsRepository;
    public function __construct(ShopsRepositoryContract $shopsRepository)
    {
        $this->shopsRepository = $shopsRepository;
    }
    public function index(Request $request)
    {
        $shops = $this->shopsRepository->filteredOrderedShops($request);
        return ShopResource::collection($shops);
    }
}
