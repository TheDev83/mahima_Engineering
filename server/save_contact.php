<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data safely
    $first   = trim($_POST['first_name']);
    $last    = trim($_POST['last_name']);
    $company = trim($_POST['company_name']);
    $contact = trim($_POST['contact_number']);
    $address = trim($_POST['address']);
    $email   = trim($_POST['email']);
    $msg     = trim($_POST['message']);

    // Basic validation
    if (empty($first) || empty($last) || empty($contact) || empty($email) || empty($msg)) {
        showAlert("All required fields must be filled!", "danger");
        exit;
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        showAlert("Please enter a valid email address!", "danger");
        exit;
    }

    // Contact number validation (India / general)
    if (!preg_match('/^[0-9+\-\s]{8,15}$/', $contact)) {
        showAlert("Please enter a valid contact number!", "danger");
        exit;
    }

    // Prepare & Insert
    $stmt = $conn->prepare(
        "INSERT INTO contacts 
        (first_name, last_name, company_name, contact_number, address, email, message) 
        VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        showAlert("Database error. Please try again later.", "danger");
        exit;
    }

    $stmt->bind_param(
        "sssssss",
        $first,
        $last,
        $company,
        $contact,
        $address,
        $email,
        $msg
    );

    if ($stmt->execute()) {
        showAlert("Thank you! Your message has been sent successfully.", "success");
    } else {
        showAlert("Something went wrong. Please try again.", "danger");
    }

    $stmt->close();
    $conn->close();
}

/* -----------------------------------
   Alert Function (Reusable & Clean)
----------------------------------- */
function showAlert($message, $type = "success") {
    echo "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Message Status</title>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>
        <style>
            body{
                background: linear-gradient(135deg, #fde6dc, #f6c9ae);
                display:flex;
                justify-content:center;
                align-items:center;
                height:100vh;
            }
            .alert-box{
                background:#fff;
                padding:30px;
                border-radius:16px;
                max-width:450px;
                width:100%;
            }
        </style>
    </head>
    <body>

    <div class='alert-box shadow-lg'>
        <div class='alert alert-$type text-center mb-4'>
            <strong>$message</strong>
        </div>
        <div class='text-center'>
            <a href='../index.php' class='btn btn-outline-secondary'>Go Back</a>
        </div>
    </div>

    </body>
    </html>
    ";
}
?>
