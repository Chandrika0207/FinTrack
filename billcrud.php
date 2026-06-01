<?php
include 'db.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // ----------- INSERT BILL -----------
    if (isset($_POST['insert_submit'])) {
        $billId = $_POST['bill_Id'];
        $customerId = $_POST['customer_Id'];
        $unitPrice = $_POST['Unit_Price_of_Items'];
        $totalItems = $_POST['Total_Items'];
        $totalBill = $_POST['Total_Bill_Amount'];
        $taxAmount = $_POST['Tax_Amount'];
        $paymentMethod = $_POST['Payment_Method'];

        $insert_query = "INSERT INTO bill (Bill_Id, Customer_Id, Unit_Price_of_Items, Total_Items, Total_Bill_Amount, Tax_Amount, Payment_Method) 
                         VALUES ('$billId', '$customerId', '$unitPrice', '$totalItems', '$totalBill', '$taxAmount', '$paymentMethod')";

        if (mysqli_query($con, $insert_query)) {
            echo "<script>alert('Bill inserted successfully!'); window.location.href='addbill.php';</script>";
        } else {
            echo "Error inserting bill: " . mysqli_error($con);
        }
    }

    // ----------- UPDATE BILL -----------
    elseif (isset($_POST['update_submit'])) {
        $billId = $_POST['bill_Id'];
        $unitPrice = $_POST['Unit_Price_of_Items'];
        $totalItems = $_POST['Total_Items'];
        $totalBill = $_POST['Total_Bill_Amount'];
        $taxAmount = $_POST['Tax_Amount'];
        $paymentMethod = $_POST['Payment_Method'];

        $update_query = "UPDATE bill 
                         SET Unit_Price_of_Items='$unitPrice', 
                             Total_Items='$totalItems', 
                             Total_Bill_Amount='$totalBill', 
                             Tax_Amount='$taxAmount', 
                             Payment_Method='$paymentMethod' 
                         WHERE Bill_Id='$billId'";

        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Bill updated successfully!'); window.location.href='addbill.php';</script>";
        } else {
            echo "Error updating bill: " . mysqli_error($con);
        }
    }

    // ----------- DELETE BILL -----------
    elseif (isset($_POST['delete_submit'])) {
        $billId = $_POST['bill_Id'];

        $delete_query = "DELETE FROM bill WHERE Bill_Id='$billId'";

        if (mysqli_query($con, $delete_query)) {
            echo "<script>alert('Bill deleted successfully!'); window.location.href='addbill.php';</script>";
        } else {
            echo "Error deleting bill: " . mysqli_error($con);
        }
    }
}
?>
