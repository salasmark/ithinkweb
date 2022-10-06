<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ProductRequest;
use App\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);

        return response()->json(
            $this->repository->paginate($perPage)
        );
    }
    
    public function store(ProductRequest $request): JsonResponse 
    {
        $productDetails = $request->only([
            'name',
            'description',
            'price',
        ]);

        return response()->json(
            [
                'data' => $this->repository->create($productDetails)
            ],
            Response::HTTP_CREATED
        );
    }
    
    public function show(Request $request, $id): JsonResponse 
    {
        return response()->json([
            'data' => $this->repository->show($id)
        ]);
    }
}
