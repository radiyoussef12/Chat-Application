<?php
include_once "php/config.php";
session_start();
$currentTime = date('H:i:s');



if (isset($_POST['Login'])) {
	$Email = $_POST['Email'];
	$Password=$_POST['Password'];
	if(!empty($Email) &&!empty($Password)){
		$sqlState=$conn->prepare('SELECT * FROM  users WHERE email=? AND password=?');
		$sqlState->execute([$Email,$Password]);
		$result = $sqlState->get_result();

		// Check if email exists
		if ($result->num_rows > 0) {
    $status='Online';
	$row = mysqli_fetch_array($result);
	
	// echo $row['unique_id'];
	$sqlState=$conn->prepare('UPDATE  users SET status=? WHERE unique_id=?');
	$sqlState->execute([$status,$row['unique_id']]);
	$result = $sqlState->get_result();
$_SESSION['unique_id']=$row['unique_id'];
header("Location: user/dist/user.php");


	$sqlState=$conn->prepare('UPDATE   timee SET time=? WHERE id=?');
	$sqlState->execute([$currentTime,$row['unique_id']]);

		}else{
			echo 'not found';
		}



	}





}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v2 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="resistion.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class="wrapper" >
			<div class="inner">
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off" >
					<h3>Login</h3>
					<div class="form-wrapper">
						
				
					</div>
					<div class="form-wrapper">
						<label for=""  style="color: rgb(254, 254, 254);">Email</label>
						<input type="email" class="form-control" name="Email">
					</div>
					<div class="form-wrapper">
						<label for=""  style="color: rgb(254, 254, 254);">Password</label>
						<input type="password" class="form-control"  name="Password">
					</div>
					
					<div class="checkbox">
					<a href="sinin.php" style="color:#08c1b4;;">have acount .</a>

					</div>
					<button style="color: rgb(254, 254, 254);"  name="Login">Login Now</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>