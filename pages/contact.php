<?php
    // include_once '../includes/db_connect.php';
    // include_once '../includes/functions.php';
    $database = new Database();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/contact.css">
        <link rel="stylesheet" href="/css/portfolio.css">
        <script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <script src="/animation.js"></script>
    </head>
    <div class="container_contact">
        <div class="row">
            <h1>contact us</h1>
        </div>
        <div class="row input-container">
            <form action="handle_contact_form.php" method="post">
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <input type="text" name="name" required />
                        <label>Name</label>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input">
                        <input type="text" name="email" required />
                        <label>Email</label>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="styled-input" style="float:right;">
                        <input type="text" name="phone" required />
                        <label>Phone Number</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="styled-input wide">
                        <textarea name="message" required></textarea>
                        <label>Message</label>
                    </div>
                </div>
                <div class="col-xs-12">
                    <button type="submit" class="btn-lrg submit-btn">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</html>