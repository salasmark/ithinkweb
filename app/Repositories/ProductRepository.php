<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface 
{
    public function paginate($perPage) 
    {
        return Product::paginate($perPage);
    }

    public function create(array $productDetails) 
    {
        return Product::create($productDetails);
    }
}