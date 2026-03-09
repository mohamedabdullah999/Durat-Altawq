<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductManager
{
    protected $cachKey = 'active_products';

    public function getAdminProducts($perPage = 10)
    {
        return Product::latest()->paginate($perPage);
    }

    public function getFrontendProducts()
    {
        return cache()->rememberForever($this->cachKey, function () {
            return Product::latest()->get();
        });
    }

    public function createProduct(array $data)
    {
        $product = Product::create($data);
        Cache::forget($this->cachKey);
        return $product;
    }

    public function updateProduct(Product $product, array $data)
    {
        $product->update($data);
        Cache::forget($this->cachKey);
        return $product;
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        Cache::forget($this->cachKey);
    }
}
