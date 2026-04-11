<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function findBySlug(string $slug): ?Product
    {
        return Product::where('slug', $slug)->first();
    }

    public function getActive(): Collection
    {
        return Product::where('is_active', true)->get();
    }
}
