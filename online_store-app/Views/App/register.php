<?php
/**
 * require necessary files and classes
 */

namespace OnlineStore\FlowersStore\Controllers;

use OnlineStore\FlowersStore\Views\UsersModel;

require_once __DIR__ . '/../../Models/UsersModel.php';
require_once __DIR__ . '/../../Controllers/UsersController.php';
require_once __DIR__ . '/../../Settings/vendor/autoload.php';
/**
 * start session, create instance of class and call the function for registration
 */
session_start();
$newUser = new UsersModel();
$newUser->registerUser();
