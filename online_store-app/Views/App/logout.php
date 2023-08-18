<?php
/**
 * include necessary files and classes
 */
declare(strict_types=1);

use OnlineStore\FlowersStore\Controllers\UsersController;

require_once __DIR__ . '/../../Controllers/UsersController.php';
/**
 * create instance of class and call the function to logout
 */
$userController = new UsersController();

$userController->logoutUser();
session_destroy();