

<?php
include_once "php/config.php";
$currentTime = date('Y-m-d H:i:s');

if (isset($_POST['save'])) {

	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];

  
	$Email = $_POST['Email'];
	$Password=$_POST['Password'];
// && filter_var($Email, FILTER_VALIDATE_EMAIL)
    if(!empty($Fname) &&!empty($Lname) &&!empty($Password) ){
    if (!empty($Email)) {
		// $sql=mysqli_query($conn,"SELECT * FROM  users WHERE email=$Email");
		$sqlState=$conn->prepare('SELECT * FROM  users WHERE email=?');
		$sqlState->execute([$Email]);
		$result = $sqlState->get_result();

		// Check if email exists
		if ($result->num_rows > 0) {
			echo "Email exists in the database.";
			// Process the result further if needed
		}
		else{

			if(isset($_FILES['img'])){
				$uploadDirectory = "img/"; // Specify your upload directory

				$tmp_file = $_FILES["img"]["tmp_name"];
				$destination = $uploadDirectory . $_FILES["img"]["name"];
			
				// Move the uploaded file to the destination
				if (move_uploaded_file($tmp_file, $destination)) {

					$end_id=rand(time(),100000000);
					$status='Online';
					

		// $insert_tabl=mysqli_query($conn,"INSERT  IN  USERS (unique_id,fname,lname,email,password,status,img) VALUES ($end_id,$Fname,$Lname,$Email,$Password,$status,$img_name) ");


		// $sql = "INSERT INTO users (unique_id,fname,lname,email,password,status,img) VALUES (?,?,?,?,?,?,?)";
		// $stmt = $conn->prepare($sql);
		// $stmt->bind_param("sssssss",$end_id,$Fname,$Lname,$Email,$Password,$status,$destination);
		$sqlState=$conn->prepare('INSERT INTO users (unique_id,fname,lname,email,password,status,img) VALUES (?,?,?,?,?,?,?)');
		$sqlState->execute([$end_id,$Fname,$Lname,$Email,$Password,$status,$destination]);
		$result = $sqlState->get_result();
		$sqlState=$conn->prepare('INSERT INTO  timee VALUES  (?,?)');
		$sqlState->execute([$currentTime,$end_id]);
header("location:login.php");
	

				}else{
					echo "err img";
				}
			}
		}
       
    } }
	else {
		
	}
	
}


?>





<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v2 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="resistion.css">


		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</head>

	<body>

		<div class="wrapper"  >
			<div class="inner">
				<form action="#" method="post" enctype="multipart/form-data" autocomplete="off" >
					<h3 style="" >Sing in </h3>
					<div class="form-group">
						<div class="form-wrapper" >
							<label for="" style="color: rgb(254, 254, 254);">first Name</label>
							<input type="text" class="form-control"  name="Fname" placeholder="first Name" required >
						</div>
						<div class="form-wrapper">
							<label for="" style="color: rgb(254, 254, 254);">last name</label>
							<input type="text" class="form-control" name="Lname"  placeholder="last name" required>
						</div>
					</div>
					<div class="form-wrapper">
						<label for="" style="color: rgb(254, 254, 254);">Email</label>
						<input type="Email" class="form-control"  name="Email"  placeholder="Email" required>
						

					</div>
					<div class="form-wrapper">
						<label for="" style="color: rgb(254, 254, 254);">Password</label>
						<input type="password" class="form-control"name="Password"  placeholder="Password" required>
					</div>
					<div class="form-wrapper">
						<label for="" style="color: rgb(254, 254, 254);">profile image </label>
						<input type="file"  name="img" >
					</div>
					<div class="checkbox">
						<!-- <label>
							<input type="checkbox"> I caccept the Terms of Use & Privacy Policy.
							<span class="checkmark"></span>
						</label> -->
						<a href="sinup.php" style="color: #08c1b4;"> Login in your count</a>
					</div>
					<button name="save" style="color: rgb(254, 254, 254);">Register Now</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>