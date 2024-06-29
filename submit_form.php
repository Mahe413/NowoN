<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = htmlspecialchars(strip_tags(trim($_POST["email"])));
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Validate the input
    if (empty($name) || empty($email) || empty($message)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Email settings
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "Contact Form Submission from $name";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email content
    $email_content = "<html><body>";
    $email_content .= "<h2>Contact Form Submission</h2>";
    $email_content .= "<p><strong>Name:</strong> $name</p>";
    $email_content .= "<p><strong>Email:</strong> $email</p>";
    $email_content .= "<p><strong>Message:</strong></p>";
    $email_content .= "<p>$message</p>";
    $email_content .= "</body></html>";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you for contacting us. We will get back to you shortly.";
    } else {
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    echo "Invalid request method.";
}
?>