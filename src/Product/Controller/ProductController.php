<?php

namespace Benzo\SingleEntryPoint\Product\Controller;

use Benzo\SingleEntryPoint\Application\Logger;
use Benzo\SingleEntryPoint\Application\Presenter\HtmlPresenter;
use Benzo\SingleEntryPoint\Application\Presenter\JsonPresenter;
use Benzo\SingleEntryPoint\Product\Model\ProductRepository;
use Benzo\SingleEntryPoint\Product\Service\ProductService;

class ProductController extends BaseController
{
    const INDEX_URL = '/entry/products';
    const FORM_URL = '/entry/products/new';
    const UPDATE_URL = '/entry/products/update';
    const DELETE_URL = '/entry/products/delete';

    public function indexAction()
    {
        $repository = new ProductRepository();
        $products = $repository->getAll();

        if (!$this->request->isApiRequest()) {
            $presenter = new HtmlPresenter(__DIR__ . "/../View/products.php", ['products' => $products]);
        } else {
            $presenter = new JsonPresenter(['products' => $products]);
        }
        return $presenter->render();
    }

    public function createProductAction()
    {
        $id = $this->request->get('id');
        $name = $this->request->get('name');
        $price = $this->request->get('price');

        // валидация
        if (!$id || !$name || !$price) {
            return $this->renderError('Fill all forms');
        }

        $repository = new ProductRepository();
        $service = new ProductService($repository);

        if (!$service->create($id, $name, $price)) {
            return $this->renderError('OOPS ERROR');
        }

        $this->redirect(self::INDEX_URL);
    }


    public function showCreateNewProductFormAction()
    {
        $presenter = new HtmlPresenter(__DIR__ . '/../View/create_product_form.php');
        return $presenter->render();
    }

    public function showDeleteOrUpdateFormAction()
    {
        $repository = new ProductRepository();
        $products = $repository->getAll();
        $presenter = new HtmlPresenter(__DIR__ . '/../View/delete_and_update_form.php', ["products" => $products]);
        return $presenter->render();
    }

    public function deleteProductAction()
    {
        $id = $this->request->get('id');
        $repository = new ProductRepository();
        $service = new ProductService($repository);
        $service->delete($id);
        $this->redirect(self::UPDATE_URL);
    }

    public function updateProductAction()
    {
        $id = $this->request->get('id');
        $name = $this->request->get('name');
        $price = $this->request->get('price');
        $repository = new ProductRepository();
        $service = new ProductService($repository);
        $service->update($id, $name, $price);
        $this->redirect(self::UPDATE_URL);

    }
}