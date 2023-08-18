<?php require_once __DIR__ . '/templates/header.php'?>
<div class="container">
    <div class="container">
        <div class="contact-content">
            <h1>Contact Us</h1>
            <p>If you have any questions, comments, or inquiries, please feel free to get in touch with us. We'd love to hear from you!</p>
            <div class="contact-form">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="4" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once __DIR__ . '/templates/footer.php';