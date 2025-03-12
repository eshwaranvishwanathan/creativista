<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "ask@creativista.in"; // Your Email
    $subject = "New Contact Form Submission";
    
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $mobile = htmlspecialchars($_POST["mobile"]);
    $message = htmlspecialchars($_POST["message"]);

    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    $email_body = "You have received a new contact form submission:\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Mobile: $mobile\n".
                  "Message: \n$message";

    if (mail($to, $subject, $email_body, $headers)) {
        echo "Success! Your message has been sent.";
    } else {
        echo "Error sending message. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
