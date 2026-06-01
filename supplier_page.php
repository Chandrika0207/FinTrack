<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier Management</title>
  <link rel="stylesheet" href="style.css">
  <style>
    table {
      border-collapse: collapse;
      width: 80%;
      margin: 30px auto 10px auto;
    }
    th, td {
      border: 1px solid #aaa;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    .entity-box {
      width: 80%;
      margin: auto;
      padding: 20px;
      border: 2px solid #ccc;
      border-radius: 10px;
    }
    .form-section {
      margin: 20px 0;
    }
  </style>
</head>
<body>

<?php
// Database connection
$con = mysqli_connect("localhost", "root", "", "finance_tracking");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// INSERT
if (isset($_POST['insert_submit'])) {
    $name = $_POST['insert_name'];
    $address = $_POST['insert_address'];
    $contact = $_POST['insert_contact'];

    $stmt = mysqli_prepare($con, "INSERT INTO supplier (Name, Address, Contact_Info) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sss", $name, $address, $contact);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Error inserting: " . mysqli_error($con) . "</p>";
    }
    mysqli_stmt_close($stmt);
}

// UPDATE
if (isset($_POST['update_submit'])) {
    $id = $_POST['update_id'];
    $name = $_POST['update_name'];
    $address = $_POST['update_address'];
    $contact = $_POST['update_contact'];

    $stmt = mysqli_prepare($con, "UPDATE supplier SET Name = ?, Address = ?, Contact_Info = ? WHERE Supplier_Id = ?");
    mysqli_stmt_bind_param($stmt, "sssi", $name, $address, $contact, $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Error updating: " . mysqli_error($con) . "</p>";
    }
    mysqli_stmt_close($stmt);
}

// DELETE
if (isset($_POST['delete_submit'])) {
    $id = $_POST['delete_id'];

    $stmt = mysqli_prepare($con, "DELETE FROM supplier WHERE Supplier_Id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Error deleting: " . mysqli_error($con) . "</p>";
    }
    mysqli_stmt_close($stmt);
}
?>

<br>
<center>
<!-- Supplier Block -->
<div class="entity-box">
  <div class="entity-title"><h2>Supplier</h2></div>
  <div class="entity-content">

    <!-- Insert Supplier -->
    <div class="form-section">
      <h3>Insert Supplier</h3>
      <form method="POST">
        <input type="text" name="insert_name" placeholder="Name" required>
        <input type="text" name="insert_address" placeholder="Address" required>
        <input type="text" name="insert_contact" placeholder="Contact Info" required>
        <button type="submit" name="insert_submit">Insert</button>
      </form>
    </div>

    <!-- Update Supplier -->
    <div class="form-section">
      <h3>Update Supplier</h3>
      <form method="POST">
        <select name="update_id" required>
          <option value="">- Select Supplier -</option>
          <?php
            $result1 = mysqli_query($con, "SELECT * FROM supplier");
            while ($row = mysqli_fetch_assoc($result1)) {
              echo "<option value='" . $row['Supplier_Id'] . "'>" . $row['Name'] . "</option>";
            }
          ?>
        </select>
        <input type="text" name="update_name" placeholder="New Name" required>
        <input type="text" name="update_address" placeholder="New Address" required>
        <input type="text" name="update_contact" placeholder="New Contact Info" required>
        <button type="submit" name="update_submit">Update</button>
      </form>
    </div>

    <!-- Delete Supplier -->
    <div class="form-section">
      <h3>Delete Supplier</h3>
      <form method="POST">
        <select name="delete_id" required>
          <option value="">- Select Supplier to Delete -</option>
          <?php
            $result2 = mysqli_query($con, "SELECT * FROM supplier");
            while ($row = mysqli_fetch_assoc($result2)) {
              echo "<option value='" . $row['Supplier_Id'] . "'>" . $row['Name'] . "</option>";
            }
          ?>
        </select>
        <button type="submit" name="delete_submit" style="background:#e74c3c;">Delete</button>
      </form>
    </div>

  </div>
</div>
</center>

<!-- Supplier Table BELOW the block -->
<?php
$supplier_query = "SELECT * FROM supplier";
$supplier_result = mysqli_query($con, $supplier_query);
?>

<table>
  <tr>
    <th>Supplier Id</th>
    <th>Name</th>
    <th>Address</th>
    <th>Contact Info</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($supplier_result)): ?>
    <tr>
      <td><?= $row['Supplier_Id'] ?></td>
      <td><?= $row['Name'] ?></td>
      <td><?= $row['Address'] ?></td>
      <td><?= $row['Contact_Info'] ?></td>
    </tr>
  <?php endwhile; ?>
</table>

<?php mysqli_close($con); ?>

</body>
</html>
