<?php
/**
 * include necessary files and classes
 */
declare(strict_types=1);

use OnlineStore\FlowersStore\Controllers\UsersController;
require __DIR__ . '/../../vendor/autoload.php';


/**
 * create instance of class and call the function to logout
 */
$userController = new UsersController();

$userController->logoutUser();
session_destroy();