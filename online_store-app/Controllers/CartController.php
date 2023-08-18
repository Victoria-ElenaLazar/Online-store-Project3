<?php
declare(strict_types=1);

namespace OnlineStore\FlowersStore\Controllers;

use OnlineStore\FlowersStore\Models\CartModel;

require __DIR__ . '/../Settings/vendor/autoload.php';
require_once __DIR__ . '/../Models/CartModel.php';

class CartController
{
    private CartModel $cartModel;

    /**
     * @param CartModel $cartModel
     */
    public function __construct(CartModel $cartModel)
    {
        $this->cartModel = $cartModel;
        if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    /**
     * @param $productId
     * @param $quantity
     * @return void
     * storing items in SESSION; if item already exist in the cart, update its quantity
     */
    public function addToCart($productId, $quantity = 1): void
    {
        $productDetails = $this->cartModel->addProductToCart($productId, $quantity);

        $existingCartItemKey = -1;
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $cartItem) {
                if ($cartItem['product_id'] == $productId) {
                    $existingCartItemKey = $key;
                    break;
                }
            }
        }
        if ($existingCartItemKey !== -1) {
            $_SESSION['cart'][$existingCartItemKey]['quantity'] = $quantity; // Update the quantity
        } else {
            $_SESSION['cart'][] = [
                'image_url' => $productDetails['image_url'],
                'product_id' => $productId,
                'product_name' => $productDetails['product_name'],
                'product_price' => $productDetails['product_price'],
                'quantity' => $quantity,
            ];
        }
    }

    /**
     * @return int, get the number of items in cart
     */
    public function getCartItemCount(): int
    {
        return count($_SESSION['cart'] ?? []);
    }

    /**
     * @return int, display in top right corner, icon cart, the number of items in cart
     */
    public function displayCartItemCount(): int
    {
        return $this->getCartItemCount();
    }

    /**
     * @return array, display the products from cart on the cart page
     */
    public function displayProductsInCartPage(): array
    {
        return $this->cartModel->getCartProducts();
    }

    /**
     * @param $productId
     * @return void, function to handle deleting one particular item from cart
     */
    public function deleteOneItem($productId): void
    {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($productId, $_SESSION['cart'])) {
                unset($_SESSION['cart'][$productId]);
            }
        }
        $subtotalAndTotal = $this->calculateSubtotalAndTotal();
        $_SESSION['subtotal'] = $subtotalAndTotal['subtotal'];
        $_SESSION['total'] = $subtotalAndTotal['total'];
    }

    /**
     * @param $productId
     * @param $newQuantity
     * @return void, function to update the number of products in cart page
     * once the quantity is changed, the subtotal and total is updated
     */
    public function updateQuantity($productId, $newQuantity): void
    {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity'] = $newQuantity;
        }
        $subtotalAndTotal = $this->calculateSubtotalAndTotal();
        $_SESSION['subtotal'] = $subtotalAndTotal['subtotal'];
        $_SESSION['total'] = $subtotalAndTotal['total'];
    }


    /**
     * @return array, function to calculate the subtotal and the total amount of money
     * the user have to pay for checkout
     */
    public function calculateSubtotalAndTotal(): array
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $productId => $cartItem) {
            $productPrice = floatval($cartItem['product_price']);
            $quantity = intval($cartItem['quantity']);

            $subtotal += $productPrice * $quantity;
        }
        $total = $subtotal + 2.99; // Add shipping cost

        return [
            'subtotal' => $subtotal,
            'total' => $total,
        ];
    }

    /**
     * @return void
     * function to handle the checkout action and reset the cart count to 0
     */
    public function checkout(): void
    {
        $_SESSION['cart'] = [];

        $_SESSION['cart_count'] = 0;

        header("Location: http://localhost/online_store-app/Views/checkout.php");
        exit();
    }

}
