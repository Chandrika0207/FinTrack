
<?php

    // Connect to database 
    $con = mysqli_connect("localhost","root","","finance_tracking");
    
    // mysqli_connect("servername","username","password","database_name")
 
    // Get all the categories from category table
    $sql = "SELECT * FROM `products`";
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


    if(isset($_POST['delete_submit']))
    {
        echo "Stage-2";
        // Store the Product name in a "name" variable
        $name = mysqli_real_escape_string($con,$_POST['product_id']);
       
       
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert = 
        "DELETE FROM `products` WHERE product_id = " . $name ;
         
        
          if(mysqli_query($con,$sql_insert))
        {
            echo '<script>alert("Product deleted successfully")</script>';
            header("Location: http://localhost/FinTrack/addproduct.php");
        }
    }
?>