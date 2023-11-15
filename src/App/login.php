<?php
/**
 * include necessary files and classes
 */
declare(strict_types=1);


use OnlineStore\FlowersStore\Controllers\UsersController;
require __DIR__ . '/../../vendor/autoload.php';


session_start();
/**
 * create instance of class and call the function to login user
 */
$loginUser = new UsersController();

$loginUser->loginUser();

