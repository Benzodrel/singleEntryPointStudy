<?php

use Benzo\SingleEntryPoint\Product\Controller\ProductController;

return [
    'GET ' . ProductController::INDEX_URL => [
        'controller' => ProductController::class,
        'action' => 'indexAction',
    ],
    'GET ' . ProductController::FORM_URL => [
        'controller' => ProductController::class,
        'action' => 'showCreateNewProductFormAction',
    ],
    'POST ' . ProductController::INDEX_URL => [
        'controller' => ProductController::class,
        'action' => 'createProductAction',
    ],
    'POST ' . ProductController::DELETE_URL => [
        'controller' => ProductController::class,
        'action' => 'deleteProductAction',
    ],
    'POST ' . ProductController::UPDATE_URL => [
        'controller' => ProductController::class,
        'action' => 'updateProductAction',
    ],
    'GET ' . ProductController::UPDATE_URL => [
        'controller' => ProductController::class,
        'action' => 'showDeleteOrUpdateFormAction',
    ]
];