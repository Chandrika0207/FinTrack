<?php
$con = mysqli_connect("localhost", "root", "", "finance_tracking");

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['product_id'])) {
  $product_id = $_POST['product_id'];

  $sql = "DELETE FROM products WHERE product_id = '$product_id'";
  if (mysqli_query($con, $sql)) {
    echo "Product deleted successfully.";
  } else {
    echo "Error deleting product: " . mysqli_error($con);
  }
} else {
  echo "No product selected.";
}

mysqli_close($con);

// Optional: redirect back
header("Location: products_form.php");
exit();
