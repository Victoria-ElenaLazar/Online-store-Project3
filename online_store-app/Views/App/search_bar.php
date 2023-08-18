<?php
declare(strict_types=1);

/**
 * require necessary files and classes
 */

use OnlineStore\FlowersStore\Controllers\SearchController;
use OnlineStore\FlowersStore\Models\SearchModel;

require_once __DIR__ . '/../../Settings/vendor/autoload.php';
require_once __DIR__ . '/../../Controllers/SearchController.php';
/**
 *  Create an instance of SearchModel, SearchController
 */
$searchModel = new SearchModel();

$searchController = new SearchController($searchModel);
/**
 *  Check if the search form was submitted and if so, perform the retrieve result
 */
if (isset($_GET['search'])) {
    $searchedProduct = $searchController->searchProductController();
}