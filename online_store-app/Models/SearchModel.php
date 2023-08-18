<?php
declare(strict_types=1);

namespace OnlineStore\FlowersStore\Models;

use PDO;
use PDOException;

require_once __DIR__ . '/../Settings/db_connection.php';

class SearchModel
{
    private ?PDO $connection;

    /**
     * create and initialize the connection in the constructor
     */
    public function __construct()
    {
        $this->connection = $this->getConnection();
    }

    /**
     * @param string $searchTerm
     * @return array
     * Search for a particular product by name
     */
    public function searchProduct(string $searchTerm): array
    {
        $product = [];
        $sth = "SELECT * FROM products WHERE product_name LIKE :searchTerm";
        $stmt = $this->connection->prepare($sth);
        $stmt->bindValue(':searchTerm', '%' . $searchTerm . '%');
        $stmt->execute();
        $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $product;
    }

    /**
     * @return PDO|null
     * Establish connection and return it
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
}
