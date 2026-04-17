<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class ProductService
{
    public function __construct(private ProductRepositoryInterface $productRepository) {}

    public function getAllProducts(): Collection
    {
        return $this->productRepository->all();
    }

    public function getActiveProducts(): Collection
    {
        return $this->productRepository->getActive();
    }

    public function findProduct(int $id): ?Product
    {
        /** @var Product|null */
        return $this->productRepository->find($id);
    }

    public function findBySlug(string $slug): ?Product
    {
        return $this->productRepository->findBySlug($slug);
    }

    public function createProduct(array $data): Product
    {
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        /** @var Product */
        return $this->productRepository->create($data);
    }

    public function updateProduct(int $id, array $data): bool
    {
        return $this->productRepository->update($id, $data);
    }

    public function deleteProduct(int $id): bool
    {
        return $this->productRepository->delete($id);
    }
}
