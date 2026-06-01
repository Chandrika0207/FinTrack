<?php
$con = mysqli_connect("localhost", "root", "", "finance_tracking");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bill Management</title>
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

<br>
<center>
<!-- Bill Management Section -->
<div class="entity-box" onclick="toggleBox(this)">
    <div class="entity-title">Manage Bills</div>
    <div class="entity-content">

        <!-- Insert Bill Form -->
        <div class="form-section">
            <h3>Add Bill</h3>
            <form action="billcrud.php" method="POST">
                <input type="text" name="bill_Id" placeholder="Bill ID" required>
                <input type="text" name="customer_Id" placeholder="Customer ID" required>
                <input type="text" name="Unit_Price_of_Items" placeholder="Unit Price of Items" required>
                <input type="text" name="Total_Items" placeholder="Total Items" required>
                <input type="text" name="Total_Bill_Amount" placeholder="Total Bill Amount" required>
                <input type="text" name="Tax_Amount" placeholder="Tax Amount" required>
                <select name="Payment_Method" required>
                    <option value="">--- Payment Method ---</option>
                    <option value="Cash">Cash</option>
                    <option value="Credit">Credit Card</option>
                    <option value="UPI">UPI Payment</option>
                </select>
                <button type="submit" name="insert_submit">Insert Bill</button>
            </form>
        </div>

        <!-- Update Bill Form -->
        <div class="form-section">
            <h3>Update Bill</h3>
            <form action="billcrud.php" method="POST">
                <input type="text" name="bill_Id" placeholder="Bill ID to Update" required>
                <input type="text" name="Unit_Price_of_Items" placeholder="New Unit Price of Items" required>
                <input type="text" name="Total_Items" placeholder="New Total Items" required>
                <input type="text" name="Total_Bill_Amount" placeholder="New Total Bill Amount" required>
                <input type="text" name="Tax_Amount" placeholder="New Tax Amount" required>
                <select name="Payment_Method" required>
                    <option value="">--- Payment Method ---</option>
                    <option value="Cash">Cash</option>
                    <option value="Credit">Credit Card</option>
                    <option value="UPI">UPI Payment</option>
                </select>
                <button type="submit" name="update_submit">Update Bill</button>
            </form>
        </div>

        <!-- Delete Bill Form -->
        <div class="form-section">
            <h3>Delete Bill</h3>
            <form action="billcrud.php" method="POST">
                <input type="text" name="bill_Id" placeholder="Bill ID to Delete" required>
                <button type="submit" name="delete_submit">Delete Bill</button>
            </form>
        </div>

    </div>
</div>

</center>

<?php
$product_query = "SELECT * FROM bill";
$product_result = mysqli_query($con, $product_query);
?>

<h2 style="text-align:center;">All Bills</h2>

<table>
    <tr>
        <th>Bill ID</th>
        <th>Customer ID</th>
        <th>Unit Price of Items</th>
        <th>Total Items</th>
        <th>Total Bill Amount</th>
        <th>Tax Amount</th>
        <th>Payment Method</th>
        <th>Bill Date</th>
    </tr>

<?php
while ($row = mysqli_fetch_assoc($product_result)) {
    echo "<tr>";
    echo "<td>" . $row["Bill_Id"] . "</td>";
    echo "<td>" . $row["Customer_Id"] . "</td>";
    echo "<td>" . $row["Unit_Price_of_Items"] . "</td>";
    echo "<td>" . $row["Total_Items"] . "</td>";
    echo "<td>" . $row["Total_Bill_Amount"] . "</td>";
    echo "<td>" . $row["Tax_Amount"] . "</td>";
    echo "<td>" . $row["Payment_Method"] . "</td>";
    echo "<td>" . $row["BillDate"] . "</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>
