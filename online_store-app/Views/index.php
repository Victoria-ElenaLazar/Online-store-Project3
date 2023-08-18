<?php
declare(strict_types=1);
require_once __DIR__ . '/templates/header.php' ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid hero-image rounded mb-3" src="https://picsum.photos/id/152/3888/2592" alt=" ">
                <h2 class="mb-3">Welcome to our Flower Shop</h2>
                <p class="welcome-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget sapien
                    blandit.</p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card product-card mb-3">
                            <img src="https://picsum.photos/id/248/3872/2592"
                                 class="card-img-top" alt="Product 1">
                            <div class="card-body text-center">
                                <h3 class="card-title">Laris</h3>
                                <p class="card-text">$10.99</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card product-card mb-3">
                            <img src="https://picsum.photos/id/306/1024/768"
                                 class="card-img-top" alt="Product 2">
                            <div class="card-body text-center">
                                <h3 class="card-title">Ipsum</h3>
                                <p class="card-text">$15.99</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card product-card mb-3">
                            <img src="https://picsum.photos/id/360/1925/1280"
                                 class="card-img-top" alt="Product 3">
                            <div class="card-body text-center">
                                <h3 class="card-title">Lorem</h3>
                                <p class="card-text">$12.50</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__ . '/templates/footer.php';
