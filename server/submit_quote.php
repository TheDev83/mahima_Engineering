<?php
include 'db.php'; // your database connection

/* ---------- GET FORM DATA ---------- */
$full_name    = mysqli_real_escape_string($conn, $_POST['full_name'] ?? '');
$company_name = mysqli_real_escape_string($conn, $_POST['company_name'] ?? '');
$email        = mysqli_real_escape_string($conn, $_POST['email'] ?? '');
$phone        = mysqli_real_escape_string($conn, $_POST['phone'] ?? '');
$service      = mysqli_real_escape_string($conn, $_POST['service_type'] ?? '');
$material     = mysqli_real_escape_string($conn, $_POST['material'] ?? '');
$quantity     = mysqli_real_escape_string($conn, $_POST['quantity'] ?? '');
$delivery     = mysqli_real_escape_string($conn, $_POST['delivery_date'] ?? '');
$message      = mysqli_real_escape_string($conn, $_POST['message'] ?? '');

/* ---------- FILE UPLOAD ---------- */
$file_path = NULL;

if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {

    $upload_dir = __DIR__ . '/uploads/'; // admin/uploads/

    // create folder if missing
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // check folder writable
    if (!is_writable($upload_dir)) {
        die("Upload folder is not writable: " . $upload_dir);
    }

    $original_name = basename($_FILES['file']['name']);
    $extension = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));

    // allowed file types
    $allowed = ['pdf','dwg','dxf'];
    if (!in_array($extension, $allowed)) {
        die("Invalid file type. Only PDF, DWG, DXF allowed.");
    }

    // generate unique file name
    $new_name = time() . "_" . uniqid() . "." . $extension;
    $destination = $upload_dir . $new_name;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
        $file_path = 'uploads/' . $new_name; // saved in DB
    } else {
        die("Failed to move uploaded file.");
    }
}

/* ---------- DATABASE INSERT ---------- */
$file_path_safe = mysqli_real_escape_string($conn, $file_path);

$sql = "INSERT INTO Clientquotations 
(full_name, company_name, email, phone, service_type, material, quantity, delivery_date, message, file_path)
VALUES
('$full_name', '$company_name', '$email', '$phone', '$service', '$material', '$quantity', '$delivery', '$message', '$file_path_safe')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
        alert('Quotation submitted successfully!');
        window.location='../index.php';
    </script>";
} else {
    echo "Error submitting quotation: " . mysqli_error($conn);
}
?>
