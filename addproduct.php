<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finance Tracker DBMS</title>
  <link rel="stylesheet" href="style.css"> <!-- Link to external CSS -->
</head>

<body>

<?php include "db.php" ?>

<?php
  // Get all the categories from category table
  $sql = "SELECT * FROM `category`";
  $all_categories = mysqli_query($con, $sql);
?>
<br>
<center>
<!-- Products -->
<div class="entity-box" onclick="toggleBox(this)">
  <div class="entity-title">Products</div>
  <div class="entity-content">

    <!-- Insert Product -->
    <div class="form-section">
      <h3>Insert Product</h3>
      <form action="products_insert.php" method="POST">
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="number" name="price" placeholder="Price" required>
        <select name="Category" required>
          <?php 
            while ($category = mysqli_fetch_array($all_categories, MYSQLI_ASSOC)):
          ?>
            <option value="<?php echo $category["Id"]; ?>">
              <?php echo $category["category_name"]; ?>
            </option>
          <?php endwhile; ?>
        </select>
        <button type="submit" name="submit">Insert</button>
      </form>
    </div>

    <!-- Update Product -->
    <div class="form-section">
      <h3>Update Product</h3>
      <form action="products_update.php" method="POST">
        <div class="form-group">
          <label for="updateProduct">Select Product:</label>
          <select name="product_id" required>
            <option value="">- Select Product -</option>
            <?php
              $product_query = "SELECT * FROM products";
              $product_result = mysqli_query($con, $product_query);
              while ($row = mysqli_fetch_assoc($product_result)) {
                echo "<option value='" . $row['Product_Id'] . "'>" . $row['Product_Name'] . "</option>";
              }
            ?>
          </select>
        </div>
        <input type="text" name="product_name" placeholder="New Product Name" required>
        <input type="number" name="price" placeholder="New Price" required>
        <select name="Category" required>
          <?php 
            mysqli_data_seek($all_categories, 0); // Reset pointer
            while ($category = mysqli_fetch_array($all_categories, MYSQLI_ASSOC)) {
              echo "<option value='" . $category['Id'] . "'>" . $category['category_name'] . "</option>";
            }
          ?>
        </select>
        <button type="submit" name="update_submit">Update</button>
      </form>
    </div>

    <!-- Delete Product -->
    <div class="form-section">
      <h3>Delete Product</h3>
      <form action="products_delete.php" method="POST">
        <input type="text" name="product_id" placeholder="Product ID to Delete" required>
        <button type="submit" name="delete_submit">Delete</button>
      </form>
    </div>

  </div>
</div>

<?php include "db_products.php" ?>
 
#  <?php
#  header("Location: http://localhost/FinTrack/addproduct.php");
#  ?>
</center>
</body>
</html>
