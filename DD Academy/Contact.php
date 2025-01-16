<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Email configuration
    $to = "info@dreamdevtraings.com"; // Replace with your email address
    $email_subject = "Contact Form Submission: " . $subject;
    $email_body = "You have received a new message from your contact form.\n\n" .
                  "Here are the details:\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Mobile: $mobile\n" .
                  "Message: \n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "Thank you for contacting us. Your message has been sent.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
