
<?php

    // Connect to database 
    $con = mysqli_connect("localhost","root","","finance_tracking");
    
    // mysqli_connect("servername","username","password","database_name")
 
    // Get all the categories from category table
    $sql = "SELECT * FROM `category`";
    $all_categories = mysqli_query($con,$sql);
 
    echo "Stage-1";
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly

    $name = mysqli_real_escape_string($con,$_POST['product_name']);
       
    $price = mysqli_real_escape_string($con,$_POST['price']); 
    // Store the Category ID in a "id" variable
    $id = mysqli_real_escape_string($con,$_POST['Category']); 

    echo "Name : " . $name . "<br/>";  
    echo $price . "<br/>";  
    echo $id . "<br/>";  


    if(isset($_POST['submit']))
    {
        echo "Stage-2";
        // Store the Product name in a "name" variable
        $name = mysqli_real_escape_string($con,$_POST['product_name']);
       
        $price = mysqli_real_escape_string($con,$_POST['price']); 
        // Store the Category ID in a "id" variable
        $id = mysqli_real_escape_string($con,$_POST['Category']); 
       
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `products`(`category`,`price`,`product_name`)
            VALUES ($id, $price, '$name')";
         
         echo $sql_insert;
          // The following code attempts to execute the SQL query
          // if the query executes with no errors 
          // a javascript alert message is displayed
          // which says the data is inserted successfully
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Product added successfully")</script>';
           
            header("Location: http://localhost/FinTrack/addproduct.php");
 
        }
    }
?>