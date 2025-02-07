<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the POST variables are set
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Check if any of the fields are empty
        if (empty($name) && empty($email) && empty($subject) && empty($message)) {
            echo "All fields are required.";
        } else {
            // Email configuration and sending process (using PHPMailer or PHP mail() function)
            $to = "kommirisettichaitanya@gmail.com";  // Replace with your email address
            $headers = "From: " . $email;
            $body = "Message from: $name ($email)\nSubject: $subject\nMessage: $message";

            if (mail($to, "New Contact Form Submission: $subject", $body, $headers)) {
                echo "Message sent successfully!";
            } else {
                echo "Failed to send the message.";
            }
        }
    } else {
        echo "Form data is missing!";
    }
}
?>
