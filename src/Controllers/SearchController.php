<?php
declare(strict_types=1);
/**
 * include necessary files and classes
 */

namespace OnlineStore\FlowersStore\Controllers;

use OnlineStore\FlowersStore\Models\SearchModel;

require __DIR__ . '/../../vendor/autoload.php';

class SearchController
{
    private SearchModel $searchModel;

    public function __construct(SearchModel $searchModel)
    {
        $this->searchModel = $searchModel;
    }

    /**
     * @return array
     * function to search the product and return the result
     */
    public function searchProductController(): array
    {

        $product = [];
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $product = $this->searchModel->searchProduct($searchTerm);
        }
        return $product;
    }
}
