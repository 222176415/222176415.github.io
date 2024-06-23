<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['Message']);

    // Set the recipient email address
    $to = "Ntimanethemba27@gmail.com";

    // Set the email subject
    $subject = "New Contact Form Submission";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $email_content, $email_headers)) {
        // Redirect to a thank you page (or show a success message)
        header("Location: thank_you.html");
        exit;
    } else {
        // Error handling (could be improved)
        echo "Oops! Something went wrong, and we couldn't send your message.";
    }
} else {
    // Prevent direct access to the script
    echo "There was a problem with your submission, please try again.";
}
?>
