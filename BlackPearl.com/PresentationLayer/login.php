<?php 

	//set_include_path('C:/Users/Cem/xampp/htdocs/BlackPearl.com');
	require_once(dirname(__FILE__) . "/../LogicLayer/UserManager.php");
	
	$errorMeesage = "";
	
	if( isset($_POST["tcno"]) && isset($_POST["password"]) ) {
		
		

		$tcno = trim($_POST["tcno"]);;
		$password = trim($_POST["password"]);;
		
	
		$errorMeesage = "";
		$user = UserManager::loginUser($tcno, $password);
		
		//echo $user[0]->getName();;
		
		session_start();
		$_SESSION['userid'] = $user[0]->getID();;
		$_SESSION['tcno'] = $user[0]->getTcno();;
		$_SESSION['name'] = $user[0]->getName();;
		$_SESSION['surname'] = $user[0]->getSurname();;
		$_SESSION['email'] = $user[0]->getEmail();;
		$_SESSION['phone'] = $user[0]->getPhone();;
		$_SESSION['birthdate'] = $user[0]->getBirthdate();;
		$_SESSION['gender'] = $user[0]->getGender();;
		$_SESSION['password'] = $user[0]->getPassword();;
		$_SESSION['nationality'] = $user[0]->getNationality();;
		$_SESSION['isadmin'] = $user[0]->getIsadmin();;
		
		if($user[0]->getIsadmin() == 0)
			header("location: tickets.php");
		else
			header("location: adminpage.php");
		
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
			text-align:center;
			
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
			  <li ><a href="/BlackPearl.com/PresentationLayer/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			  <li class="active"><a href="/BlackPearl.com/PresentationLayer/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		  </div>
		</nav>
		
		<div class="container-fluid contaier-form container-center">
			<h2>PERSONAL INFORMATION</h2>
			<form method="POST" action="<?php $_PHP_SELF ?>" class="form-inline" >
						
							<div class="form-group ">
								<label for="tcno">Enter TC NO / SSN:</label>
								<input type="text" class="form-control" id="name" placeholder="TC / SSN" name="tcno" required>
							</div>
							<br/>
							<div class="form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
							</div>
							<br/>
							
							<button type="submit" class="btn btn-default btn-lg" name="login"> LOG IN </button>
						
		
			</form>
		</div>
		
		
	</body>