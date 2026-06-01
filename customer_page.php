<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Management</title>
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
    $contact = $_POST['insert_contact'];

    $stmt = mysqli_prepare($con, "INSERT INTO customer (Name, contact_info) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $name, $contact);

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
    $contact = $_POST['update_contact'];

    $stmt = mysqli_prepare($con, "UPDATE customer SET Name = ?, contact_info = ? WHERE customer_id = ?");
    mysqli_stmt_bind_param($stmt, "ssi", $name, $contact, $id);

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

    $stmt = mysqli_prepare($con, "DELETE FROM customer WHERE customer_id = ?");
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
<!-- Customer Block -->
<div class="entity-box">
  <div class="entity-title"><h2>Customer</h2></div>
  <div class="entity-content">

    <!-- Insert Customer -->
    <div class="form-section">
      <h3>Insert Customer</h3>
      <form method="POST">
        <input type="text" name="insert_name" placeholder="Name" required>
        <input type="text" name="insert_contact" placeholder="Contact Info" required>
        <button type="submit" name="insert_submit">Insert</button>
      </form>
    </div>

    <!-- Update Customer -->
    <div class="form-section">
      <h3>Update Customer</h3>
      <form method="POST">
        <select name="update_id" required>
          <option value="">- Select Customer -</option>
          <?php
            $result1 = mysqli_query($con, "SELECT * FROM customer");
            while ($row = mysqli_fetch_assoc($result1)) {
              echo "<option value='" . $row['customer_id'] . "'>" . $row['Name'] . "</option>";
            }
          ?>
        </select>
        <input type="text" name="update_name" placeholder="New Name" required>
        <input type="text" name="update_contact" placeholder="New Contact Info" required>
        <button type="submit" name="update_submit">Update</button>
      </form>
    </div>

    <!-- Delete Customer -->
    <div class="form-section">
      <h3>Delete Customer</h3>
      <form method="POST">
        <select name="delete_id" required>
          <option value="">- Select Customer to Delete -</option>
          <?php
            $result2 = mysqli_query($con, "SELECT * FROM customer");
            while ($row = mysqli_fetch_assoc($result2)) {
              echo "<option value='" . $row['customer_id'] . "'>" . $row['Name'] . "</option>";
            }
          ?>
        </select>
        <button type="submit" name="delete_submit" style="background:#e74c3c;">Delete</button>
      </form>
    </div>

  </div>
</div>
</center>

<!-- Customer Table BELOW the block -->
<?php
$customer_query = "SELECT * FROM customer";
$customer_result = mysqli_query($con, $customer_query);
?>

<table>
  <tr>
    <th>Customer Id</th>
    <th>Name</th>
    <th>Contact Info</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($customer_result)): ?>
    <tr>
      <td><?= $row['customer_id'] ?></td>
      <td><?= $row['Name'] ?></td>
      <td><?= $row['contact_info'] ?></td>
    </tr>
  <?php endwhile; ?>
</table>

<?php mysqli_close($con); ?>

</body>
</html>
