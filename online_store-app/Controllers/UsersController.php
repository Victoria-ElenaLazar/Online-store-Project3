<?php
declare(strict_types=1);

namespace OnlineStore\FlowersStore\Controllers;

use OnlineStore\FlowersStore\Views\UsersModel;

require '../Settings/vendor/autoload.php';
require_once '../Models/UsersModel.php';

class UsersController
{
    /**
     * @return void
     * function to handle the login action, validate data, fetch information from Models
     */
    public function loginUser(): void
    {
        if (isset($_POST['login'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error_message'] = "Invalid email format. Please try again!";
                header("Location: login.php");
                exit();
            }

            $userModel = new UsersModel();
            $userData = $userModel->findByEmail($email);

            session_start();
            if ($userData && password_verify($password, $userData['user_password'])) {
                $_SESSION['user_id'] = $userData['user_id'];
                $_SESSION['user_email'] = $userData['user_email'];
                header("Location: http://localhost/online_store-app/Views/index.php");
            } else {
                $_SESSION['error_message'] = "Invalid email or password. Please try again or register!";
                header("Location: http://localhost/online_store-app/Views/login.php");
                exit();
            }
        }
    }

    /**
     * @return void
     * handle the logout function and redirect the user to the login page
     */
    public function logoutUser(): void
    {
        session_start();

        $_SESSION = array();

        session_destroy();

        header("Location: http://localhost/online_store-app/Views/login.php");
        exit();
    }

}
