<?php
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "finance_tracking");

// Check if connection was successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form was submitted
if (isset($_POST['update_submit'])) {
    // Get the submitted form data
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category_id = $_POST['Category'];

    // Prepare the update query
    $sql = "UPDATE products 
            SET Product_Name = ?, Price = ?, Category = ?
            WHERE Product_Id = ?";

    // Use prepared statements for security
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sdii", $product_name, $price, $category_id, $product_id);

    // Execute the update query
    if (mysqli_stmt_execute($stmt)) {
        echo "Product updated successfully.";
        
        header("Location: http://localhost/FinTrack/addproduct.php");
 
    } else {
        echo "Error updating product: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    echo "Form not submitted properly.";
}

// Close the database connection
mysqli_close($con);
?>
