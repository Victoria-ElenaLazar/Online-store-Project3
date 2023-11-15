<?php
/**
 * require necessary files and classes
 */
declare(strict_types=1);


use OnlineStore\FlowersStore\Controllers\ProductsController;

require __DIR__ . '/../../vendor/autoload.php';
/**
 * instantiate classes to display the products in products page
 */
$productsController = new ProductsController();
$pagedProducts = $productsController->displayProducts();

