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
// Database connection
$con = mysqli_connect("localhost", "root", "", "finance_tracking");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$customer_query = "SELECT * FROM customer";
$customer_result = mysqli_query($con, $customer_query);
?>

<h2 style="text-align:center;">Customer</h2>

<table>
  <tr>
    <th>Customer Id</th>
    <th>Name</th>
    <th>Contact Info</th>
  </tr>

  <?php
  while ($row = mysqli_fetch_assoc($customer_result)) {
      echo "<tr>";
      echo "<td>" . $row["customer_id"] . "</td>";
      echo "<td>" . $row["Name"] . "</td>";
      echo "<td>" . $row["contact_info"] . "</td>";
      echo "</tr>";
  }
  ?>
</table>

<br/><br/><br/>
