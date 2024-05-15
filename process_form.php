<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Validate input (you can add more validation)
    if (empty($fullname) || empty($email) || empty($message)) {
        http_response_code(400); // Bad Request
        echo "Please fill out all required fields.";
        exit;
    }

    // Send email (example using PHP's mail function)
    $to = "ajaykrishnansuresh@gmail.com"; // Change this to your email address
    $subject = "New Contact Form Submission";
    $body = "Name: $fullname\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200); // Success
        echo "Thank you! Your message has been sent.";
    } else {
        http_response_code(500); // Server Error
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Method not allowed.";
}
?>
