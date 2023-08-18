<?php
/**
 * require necessary files and classes
 */
declare(strict_types=1);

namespace OnlineStore\FlowersStore\Views;

use OnlineStore\FlowersStore\Controllers\ProductsController;

require __DIR__ . '/../../Settings/vendor/autoload.php';
require_once __DIR__ . '/../../Controllers/ProductsController.php';
/**
 * instantiate classes to display the products in products page
 */
$productsController = new ProductsController();
$pagedProducts = $productsController->displayProducts();

