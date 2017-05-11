<?php 
	session_start();
	set_include_path('C:/xampp/htdocs/BlackPearl.com');
	require_once("LogicLayer/UserManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["phone"]) && 
	isset($_POST["day"]) && isset($_POST["month"]) && isset($_POST["year"]) && isset($_POST["gender"]) && isset($_POST["password"]) && isset($_POST["nationality"]) && isset($_POST["tcno"]) && isset($_POST["termsaccept"])) {
		
		

		$tcno = trim($_POST["tcno"]);;
		$name = trim($_POST["name"]);;
		$surname = trim($_POST["surname"]);;
		$email = trim($_POST["email"]);;
		$phone = trim($_POST["phone"]);;
		$day = trim($_POST["day"]);;
		$month = trim($_POST["month"]);;
		$year = trim($_POST["year"]);;
		$gender = trim($_POST["gender"]);;
		$password = trim($_POST["password"]);;
		$nationality = trim($_POST["nationality"]);;
		
		$birthdate = $day . "/" . $month . "/" . $year;
		
		$errorMeesage = "";
		$result = UserManager::insertNewUser($tcno, $name, $surname, $email, $phone, $birthdate, $gender, $password, $nationality);
		if(!$result) {
			$errorMeesage = "Yeni kullanýcý kaydý baþarýsýz!";
		}
		
	}
	
?>



<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>BlackPearl-Sign up</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style/site.css">
		<style>
		body {
			background-color: white;
			font: 20px Montserrat, sans-serif;
			
			background: url('http://cdn.wonderfulengineering.com/wp-content/uploads/2014/04/ship-image-5.jpg') center top no-repeat;
			background-size: cover;
			background-attachment: fixed;
			
		}

		h1 {
			color: black;
			text-align: left;
		}

		p {
			font-family: verdana;
			font-size: 20px;
		}
		div {
			align:justify;
		}
		.form-group {
			padding:5px;
		}
		.right {
			padding-left:8cm;
			
		}
		
		.container-fluid {
			
			align:5px;
		}
		.contaier-form {
			width:60%;
			border-style:solid;
			background-color:white;
			
		}
		</style>

	</head>
	<body> 
		
		<nav class="navbar navbar-inverse ">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">BlackPearl</a>
			</div>
			<ul class="nav navbar-nav">
			  <li ><a href="#">Home</a></li>
			  <li><a href="/BlackPearl.com/PresentationLayer/tickets.php">Tickets</a></li>
			  <li><a href="#">About</a></li>
			  <li><a href="#">Feedback</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span> MyAccount</a></li>
			  <li><a href="/BlackPearl.com/PresentationLayer/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		  </div>
		</nav>
		
		<div class="container-fluid contaier-form">
			<h2>My Account</h2>
			<form method="POST" action="<?php $_PHP_SELF ?>" class="form-inline" >
						
							<div class="form-group">
								<label for="name">Name:</label>
								<?php
								echo $_SESSION["name"];
								?>
							</div>
							<div class="form-group right">
								<label for="Surname">Surname:</label>
								<?php
								echo $_SESSION["surname"];
								?>
							</div>
						</br>
						</br></br>
							<div class="form-group">
								<label for="password">Enter New Password:</label>
								<input type="password" class="form-control" id="password" name="password">
								<button name="changedPasswordbutton" type="submit" class="btn btn-default btn-lg">Change Password</button>
							</div>
							
							<?php
							function changePassword()
							{
							   $userid = $_SESSION["userid"];
							   $newpassword = trim($_POST["password"]);;
							   $result = UserManager::changePassword($userid, $newpassword);
							}
							
							if(array_key_exists('changedPasswordbutton',$_POST)){
							   changePassword();
							}
							?>
							</br></br>
							<button name="deletebutton" type="submit" class="btn btn-default btn-lg" style="margin-left:20cm"  >Delete Account</button>
							</br></br>
							<?php
							function deleteUser()
							{
							   $userid = $_SESSION["userid"];
							   $result = UserManager::deleteUser($userid);
							}
							
							if(array_key_exists('deletebutton',$_POST)){
							   deleteUser();
							}
							?>
							
							<?php 
									if(isset($errorMeesage)) {
										echo "<br>" . "<span style='color: red;'>" . $errorMeesage . "</span>";
									}
								?>
			</form>
		</div>
		
	</body> 
</html>