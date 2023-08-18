<?php
/**
 * require necessary files and classes
 */
declare(strict_types=1);
namespace OnlineStore\FlowersStore\Models;

require_once __DIR__ . '/../Settings/db_connection.php';

use PDO;
use PDOException;

class CartModel
{
    private ?PDO $connection;

    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    /**
     * @return PDO|null,
     * establish the connection and close it
     */
    private function getConnection(): ?PDO
    {
        try {
            return new PDO(
                DB_DRIVER . ':host=' . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASSWORD
            );
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            return null;
        }
    }

    /**
     * @param $productId
     * @return mixed|null
     * retrieve information from database for a particular product based on its id
     * handle errors
     */
    private function getProductDetails($productId): mixed
    {
        try {
            $sth = "SELECT * FROM products WHERE product_id = :productId";
            $stmt = $this->connection->prepare($sth);
            $stmt->execute([':productId' => $productId]);
            $productDetails = $stmt->fetch(PDO::FETCH_ASSOC);
            return $productDetails;
        } catch (PDOException $e) {
            echo "Error fetching product details: " . $e->getMessage();
            return null;
        }
    }

    /**
     * @param $productId
     * @param $quantity
     * @return array
     * function to add one product to cart, fetch data from database by getProductDetails()
     * and store it into session super global
     * if the product already exist in the cart, update its quantity
     */
    public function addProductToCart($productId, $quantity = 1): array
    {
        $cartItem = [];

        $productDetails = $this->getProductDetails($productId);

        if ($productDetails) {
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            } else {
                $cartItem = [
                    'image_url' => $productDetails['image_url'],
                    'product_id' => $productId,
                    'product_name' => $productDetails['product_name'],
                    'product_price' => $productDetails['product_price'],
                    'quantity' => max(1, $quantity) // Ensure quantity is at least 1
                ];

                $_SESSION['cart'][$productId] = $cartItem;
            }
        }
        return $cartItem;
    }

    /**
     * @return array,
     * function to return the products added to cart
     */
    public function getCartProducts(): array
    {
        return is_array($_SESSION['cart'] ?? []) ? $_SESSION['cart'] : [];
    }

}
