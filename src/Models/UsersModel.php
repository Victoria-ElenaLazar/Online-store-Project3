<?php
/**
 * require necessary files and classes
 */
declare(strict_types=1);

namespace OnlineStore\FlowersStore\Models;

namespace OnlineStore\FlowersStore\Views;

use PDO;
use PDOException;

require_once __DIR__ . '/../Settings/db_connection.php';

class UsersModel
{
    /**
     * @param $email
     * @return mixed|void
     * find the user by the email he/she registered with
     */
    public function findByEmail($email)
    {
        try {
            $pdo = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $sth = "SELECT * FROM users WHERE user_email = :email";
            $stmt = $pdo->prepare($sth);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $pdo = null;
    }

    /**
     * @return void
     * function to register a new user and insert the new user into the database
     * hash the password to prevent the hacker to have access to user's login credentials
     * validate data
     */
    public function registerUser(): void
    {
        if (isset($_POST['register'])) {
            $userId = $_POST['user_id'] ?? '';
            $firstName = filter_input(INPUT_POST, 'first_name');
            $lastName = filter_input(INPUT_POST, 'last_name');
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            try {
                $pdo = new PDO(DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
                $stmt = $pdo->prepare("INSERT INTO users (user_id, user_first_name, user_last_name, user_email, user_password) VALUES (:user_id, :first_name, :last_name, :email, :password)");
                $stmt->bindParam(':user_id', $userId);
                $stmt->bindParam(':first_name', $firstName);
                $stmt->bindParam(':last_name', $lastName);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();

                header("Location: http://localhost/online_store-app/Views/login.php");
                exit();
            } catch (PDOException $e) {
                echo "Connection failed!" . $e->getMessage();
            }
            $pdo = null;

        }
    }
}