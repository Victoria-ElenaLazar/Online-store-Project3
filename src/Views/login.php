<?php
declare(strict_types=1);
require_once __DIR__ . '/../App/login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="Style/login.css">
</head>
<body>
<!-- Navigation bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Flower Shop</a>
    </div>
</nav>

<!-- Flower Shop Header -->
<div class="header-container">
    <div class="header-overlay"></div>
    <div class="header-content">
        <div class="header-logo">Flower Shop</div>
        <p class="lead">Beautiful Flowers for Every Occasion</p>
    </div>
</div>
<!-- Page Content -->
<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-md-6">
            <h1 class="floral-background mb-4">Access your account</h1>


            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="email">Email
                        <input type="text" class="form-control" name="email" placeholder="Please enter your email"
                               required>
                    </label>
                </div>
                <div class="form-group">
                    <label for="password">Password
                        <input type="password" class="form-control" name="password" placeholder="Your password..."
                               required>
                    </label>
                    <?php if (isset($_SESSION['error_message'])): ?>
                        <div style="padding:10px" class="alert alert-danger">
                            <?php echo $_SESSION['error_message']; ?>
                        </div>
                        <?php unset($_SESSION['error_message']); ?>
                    <?php endif; ?>
                </div>
                <div style="padding-top: 20px">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>

            </form>
            <div class="mt-3">
                <a href="forgot_password_page.php">Forgot password?</a>
            </div>
            <div class="mt-3">
                <a href="register.php">Not Registered? Click here</a>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
