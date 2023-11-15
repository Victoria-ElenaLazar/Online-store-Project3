<?php
/**
 * require necessary files and classes
 */


use OnlineStore\FlowersStore\Views\UsersModel;


require __DIR__ . '/../../vendor/autoload.php';
/**
 * start session, create instance of class and call the function for registration
 */
session_start();
$newUser = new UsersModel();
$newUser->registerUser();
