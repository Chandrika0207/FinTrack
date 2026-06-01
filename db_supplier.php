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

  $supplier_query = "SELECT * FROM supplier";
      $supplier_result = mysqli_query($con, $supplier_query);

   ?>
   
<h2 style="text-align:center;">Supplier</h2>

<table>
  <tr>
    <th>Supplier Id</th>
    <th> Name</th>
    <th>Address</th>
    <th>Contact_Info</th>
    
  </tr>

<?php
  while ($row = mysqli_fetch_assoc($supplier_result)) {
      echo "<tr>";
      echo "<td>" . $row["Supplier_Id"] . "</td>";
      echo "<td>" . $row["Name"] . "</td>";
      echo "<td>" . $row["Address"] . "</td>";
      echo "<td>" . $row["Contact_Info"] . "</td>";
      echo "</tr>";
  }
  ?>
  </table>

  <br/><br/><br/>