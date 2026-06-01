<?php
$con = mysqli_connect("localhost", "root", "", "finance_tracking");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// INSERT
if (isset($_POST['insert_submit'])) {
    $name = $_POST['insert_name'];
    $address = $_POST['insert_address'];
    $info = $_POST['insert_info'];

    $sql = "INSERT INTO supplier (Name, Address, Contact_Info ) VALUES (?, ?, ? )";
    echo $sql;
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $name, $address, $info);

    if (mysqli_stmt_execute($stmt)) {
        echo "✅ Supplier inserted successfully.";
        header("Location: http://localhost/FinTrack/supplier_page.php");
    } else {
        echo "❌ Insert Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

// UPDATE
if (isset($_POST['update_submit'])) {
    $name = $_POST['update_name'];
    $address = $_POST['update_address'];
    $contact = $_POST['update_contact'];
    $upd_id = $_POST['update_id'];

    $sql = "UPDATE supplier SET Name = ?, Address = ?, Contact_Info = ?  WHERE Supplier_Id = ?";
    
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $address, $contact,  $upd_id);

    if (mysqli_stmt_execute($stmt)) {
        echo "✅ Supplier updated successfully.";
    } else {
        echo "❌ Update Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}

// DELETE
if (isset($_POST['delete_submit'])) {
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM supplier WHERE Supplier_Id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Supplier deleted successfully.";
    } else {
        echo "Delete Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}
mysqli_close($con);
?>
