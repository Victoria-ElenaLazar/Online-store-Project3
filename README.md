# Online Flower Store

Welcome to Online Flower Store, where you can explore and purchase a wide variety of beautiful flowers. This application is built using PHP and follows the MVC (Model-View-Controller)
pattern to ensure a clean and organized code structure.

## Features

- **User Authentication:**
    - Register an account to manage your orders.
    - Log in securely to access personalized features.

- **Browse Flowers:**
    - Explore a diverse collection of flowers with detailed descriptions.
    - Filter flowers by category, color, or occasion.

- **Shopping Cart:**
    - Add flowers to your shopping cart.
    - Adjust quantities and remove items as needed.

- **Checkout Process:**
    - Provide shipping details for delivery.
    - View a summary of your order before making a purchase.

## Getting Started

### Prerequisites

- PHP 8.0 or later
- MySQL or another relational database
- [Composer for dependency management](https://getcomposer.org/)

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Victoria-ElenaLazar/Online-store-Project3.git
   ```
   **Install dependencies**: navigate to your project root directory and install
   the required dependencies using Composer.
   ```bash
   composer install
   ```
2. **Create Database**: Open PHPMyAdmin and create the database for this application following the structure
provided in Setting/sql.php.

3. **Start development server**: Run the following command in your terminal:

   ````
   php -S localhost:8000 -t public/
   ````

4. **Visit the application**: Follow the link and navigate through the store. 