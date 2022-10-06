<?php

namespace App\Interfaces;

interface ProductRepositoryInterface 
{
    public function paginate($perPage);
    public function create(array $productDetails);
}