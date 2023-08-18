<?php
/**
 * include necessary files and classes
 */
declare(strict_types=1);

namespace OnlineStore\FlowersStore\Controllers\UsersController;

use OnlineStore\FlowersStore\Controllers\UsersController;

require_once __DIR__ . '/../../Controllers/UsersController.php';
session_start();
/**
 * create instance of class and call the function to login user
 */
$loginUser = new UsersController();

$loginUser->loginUser();

