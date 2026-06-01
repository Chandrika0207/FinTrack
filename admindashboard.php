<!DOCTYPE html>
<html>
<head>
  <title>Finance Tracking System</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php include 'header.php' ?>

<center>
  <div class="grid">

    <!-- Supplier -->
    <div class="entity-box">
      <a href="supplier_page.php" style="text-decoration: none;">
        <div class="entity-title">Supplier</div>
      </a>
    </div>
    <br>

    <!-- Products -->
    <div class="entity-box">
      <a href="addproduct.php" style="text-decoration: none;">
        <div class="entity-title">Products</div>
      </a>
    </div>
    <br>

    <!-- Customer -->
    <div class="entity-box">
      <a href="customer_page.php" style="text-decoration: none;">
        <div class="entity-title">Customer</div>
      </a>
    </div>
    <br>

    <!-- Bill -->
    <div class="entity-box">
      <a href="addbill.php" style="text-decoration: none;">
        <div class="entity-title">Bill</div>
      </a>
    </div>

  </div>
</center>

<script src="script.js"></script>

</body>
</html>
