<?php
/**
 * include necessary files and classes
 */
declare(strict_types=1);

namespace OnlineStore\FlowersStore\Views;

use OnlineStore\FlowersStore\Controllers\ProductsController;

require_once __DIR__ . '/../../Settings/vendor/autoload.php';
require_once __DIR__ . '/../../Controllers/ProductsController.php';
/**
 * create instance of class
 * check if the product_id parameter is set in the URL and pass the product_id to the controller
 */
$productsController = new ProductsController();
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $productDetails = $productsController->displayOneProduct($product_id);
}
