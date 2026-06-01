<?php
session_start();

$con = mysqli_connect('localhost', 'root' );
if($con){
	// echo "conenction successful";
}else{
	echo "no connection";
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- <?php  include 'links.php' ?>  -->
</head>
<body>

<header>

 <h1 class="heading">Finance Tracking System</h1>
 <br/> <br/>
	<div >
		<div class="heading text-center mb-5 text-uppercase text-white"> ADMIN LOGIN PAGE </div>
		<br/>
		<div >
			
		</div>
	</div>
</header>

<div class="container md-3">
					<form action="logincheck.php" method="POST">
						<div >
							<label>Login ID</label>
							<input type="text" name="user" value=""   autocomplete="off">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="pass" value=""   autocomplete="off">
						</div>
						<input type="submit" class="btn btn-success" name="submit" >
				</form>
			</div>
</body>
</html>