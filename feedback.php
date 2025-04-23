<?php
session_start();
require_once 'config/db_connect.php';

$success = false;
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $feedback = trim($_POST['feedback']);

    // Validate form data
    if (empty($name)) {
        $error = "Name is required";
    } elseif (empty($email)) {
        $error = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format";
    } elseif (empty($feedback)) {
        $error = "Feedback message is required";
    }

    // If no validation errors, save feedback
    if (empty($error)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO feedback (name, email, feedback) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $feedback]);
            $success = true;
        } catch(PDOException $e) {
            $error = "Failed to submit feedback: " . $e->getMessage();
        }
    }
}

// Redirect back to the page with status
if ($success) {
    header("Location: index.php?feedback=success#feedback");
} else {
    header("Location: index.php?feedback=error&message=" . urlencode($error) . "#feedback");
}
exit();
?> 