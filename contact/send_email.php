<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "support@tolocobody.com";
    $subject = "New Message from Website Contact Form";

    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    if (empty($name) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        echo "Please fill out the form correctly.";
        exit;
    }

    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $headers = "From: $name <$email>";

    if (mail($to, $subject, $email_content, $headers)) {
        // Changed this line:
        echo "success";
    } else {
        echo "Something went wrong. Please try again.";
    }
} else {
    echo "There was a problem with your submission.";
}
?>
