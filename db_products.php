<link rel="stylesheet" type="text/css" href="style.css">
   
  <style>
    table {
      border-collapse: collapse;
      width: 80%;
      margin: 20px auto;
    }
    th, td {
      border: 1px solid #aaa;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>


  <?php

  $product_query = "SELECT * FROM products";
      $product_result = mysqli_query($con, $product_query);

   ?>
   
<h2 style="text-align:center;">Products</h2>

<table>
  <tr>
    <th>Product Id</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Categorys</th>
    
  </tr>

<?php
  while ($row = mysqli_fetch_assoc($product_result)) {
      echo "<tr>";
      echo "<td>" . $row["Product_Id"] . "</td>";
      echo "<td>" . $row["Product_Name"] . "</td>";
      echo "<td>" . $row["Price"] . "</td>";
      echo "<td>" . $row["Category"] . "</td>";
      echo "</tr>";
  }
  ?>
  </table>

  <br/><br/><br/>