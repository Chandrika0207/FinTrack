<?php
$con = mysqli_connect("localhost", "root", "", "finance_tracking");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = mysqli_query($con, "SELECT c.Name, c.contact_info, b.Unit_Price_of_Items, b.Total_Items, b.Total_Bill_Amount, b.BillDate 
                             FROM bill b
                             INNER JOIN Customer c ON c.customer_id = b.Customer_Id");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bill Records</title>
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
</head>
<body>

<?php include 'header.php'; ?>

<h2 style="text-align:center;">Bill Data</h2>

<table>
    <tr>
        <th>Customer Name</th>
        <th>Contact Info</th>
        <th>Unit Price of Items</th>
        <th>Total Items</th>
        <th>Total Bill Amount</th>
        <th>Bill Date</th>
    </tr>

<?php
while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>" . $row["Name"] . "</td>";
    echo "<td>" . $row["contact_info"] . "</td>";
    echo "<td>" . $row["Unit_Price_of_Items"] . "</td>";
    echo "<td>" . $row["Total_Items"] . "</td>";
    echo "<td>" . $row["Total_Bill_Amount"] . "</td>";
    echo "<td>" . $row["BillDate"] . "</td>";
    echo "</tr>";
}
?>

</table>

<?php mysqli_close($con); ?>

</body>
</html>
