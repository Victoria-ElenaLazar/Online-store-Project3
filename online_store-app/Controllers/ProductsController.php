<?php
/**
 * require specific files and classes
 */
declare(strict_types=1);

namespace OnlineStore\FlowersStore\Controllers;

use OnlineStore\FlowersStore\Models\ProductsModel;


require __DIR__ . '/../Settings/vendor/autoload.php';
require_once __DIR__ . '/../Models/ProductsModel.php';


class ProductsController
{
    public ProductsModel $productsModel;

    public function __construct()
    {
        $this->productsModel = new ProductsModel();
    }

    /**
     * @param $productId
     * @return array
     * function to display one product with all of its details
     * require VIEWS to display the product
     */
    public function displayOneProduct($productId): array
    {
        $product = $this->productsModel->findById($productId);

        require_once __DIR__ . '/../Views/product_details.php';

        return $product;
    }

    /**
     * @return array
     * display all products on product page
     * use function findAllProducts(), called from Models to retrieve information from database
     * require VIEWS to display products on page
     */
    public function displayProducts(): array
    {
        $productsPerPage = 12;
        $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;

        // Call the "findAllProducts" function to get all products
        $products = $this->productsModel->findAllProducts();

        // Calculate the total number of products and pages
        $totalProducts = count($products);
        $totalPages = ceil($totalProducts / $productsPerPage);

        // Calculate the starting index for the current page
        $startIndex = ($currentPage - 1) * $productsPerPage;

        // Slice the products array based on the current page and items per page
        $pagedProducts = array_slice($products, $startIndex, $productsPerPage);

        require_once __DIR__ . '/../Views/list_products.php';
        return $products;
    }
}
