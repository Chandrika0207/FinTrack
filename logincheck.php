

PHP page for checking: Login Check Page 

Here we are also, setting the Session. Using, the session we can use the admin name throughout our pages. Also, when admin login into the page then we will use to the username to be shown on the main page of admin and that is possible by using session.


<?php
session_start();

$con = mysqli_connect('localhost', 'root' );
if($con){
	echo "conenction successful";
}else{
	echo "no connection";
}

$db = mysqli_select_db($con, 'finance_tracking');

if(isset($_POST['submit'])){
	$username = $_POST['user'];
	$password = $_POST['pass'];

	$sql = " select * from  admin where username ='$username' and password='$password' ";
	$query = mysqli_query($con,$sql);

	$row = mysqli_num_rows($query);
		if($row == 1){
			echo "login successful";
			$_SESSION['user'] = $username;
			header('location:admindashboard.php');
		}else{
			echo "login failed";
			header('location:login.php');
		}

}


?>
