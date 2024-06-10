<?php

namespace Benzo\SingleEntryPoint\Product\Service;


use Benzo\SingleEntryPoint\Application\Logger;
use Benzo\SingleEntryPoint\Product\Model\Product;
use Benzo\SingleEntryPoint\Product\Model\ProductRepository;

class ProductService
{
    private ProductRepository $productsRepository;

    public function __construct(ProductRepository $productsRepository)
    {
        $this->productsRepository = $productsRepository;
    }

    public function create(int $id, string $name, string $price): bool
    {
        $product = new Product($id, $name, $price);

        try {
            $this->productsRepository->create($product);
        } catch (\Exception $e) {
            Logger::getInstance()->error("Create new products in repo error");
            return false;
        }
        return true;
    }

    public function update($id, $name, $price): bool
    {
        try {
            $this->productsRepository->update($id, $name, $price);
        } catch (\Exception $e) {
            Logger::getInstance()->error("Update repo error");
            return false;
        }
        return true;
    }

    public function delete($id): bool
    {
        try {
            $this->productsRepository->delete($id);
        } catch (\Exception $e) {
            Logger::getInstance()->error("Deleting product from repo error");
            return false;
        }
        return true;
    }
}