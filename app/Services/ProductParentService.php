<?php

namespace App\Services;

use App\Models\ProductParent;

class ProductParentService
{
    public static function store(array $data): ProductParent
    {
        return ProductParent::create($data);
    }

    public static function update(ProductParent $product_parent,array $data): ProductParent
    {
        $product_parent->update($data);

        return $product_parent->fresh();
    }
}
