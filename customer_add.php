<?php
$con = mysqli_connect("localhost", "root", "", "finance_tracking");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert
if (isset($_POST['insert_submit'])) {
    $name = $_POST['insert_name'];
    $contact = $_POST['insert_contact'];
    $stmt = mysqli_prepare($con, "INSERT INTO customer (Name, contact_info) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $name, $contact);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: customer_page.php");
    header("Location: http://localhost/FinTrack/customer_page.php");
    exit();
}

// Update
if (isset($_POST['update_submit'])) {
    $id = $_POST['update_id'];
    $name = $_POST['update_name'];
    $contact = $_POST['update_contact'];
    $stmt = mysqli_prepare($con, "UPDATE customer SET Name = ?, contact_info = ? WHERE customer_id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $name, $contact, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: customer_page.php");
    exit();
}

// Delete
if (isset($_POST['delete_submit'])) {
    $id = $_POST['delete_id'];
    $stmt = mysqli_prepare($con, "DELETE FROM customer WHERE customer_id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: customer_page.php");
    exit();
}

mysqli_close($con);
?>
