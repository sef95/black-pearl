<?php

session_start();

	//set_include_path('C:/Users/Cem/xampp/htdocs/BlackPearl.com');
	require_once(dirname(__FILE__) . "/../LogicLayer/TicketManager.php");
	
	$errorMeesage = "";
	if(isset($_POST["userid"]) && isset($_POST["price"]) && isset($_POST["buydate"]) && isset($_POST["departureplace"]) && 
	isset($_POST["departuretime"]) && isset($_POST["landingplace"]) && isset($_POST["landingtime"])  && isset($_POST["insertbutton"]) && !isset($_POST["updatebutton"])) {
		
		$userid = trim($_POST["userid"]);;
		$price = trim($_POST["price"]);;
		$buydate = trim($_POST["buydate"]);;
		$departureplace = trim($_POST["departureplace"]);;
		$departuretime = trim($_POST["departuretime"]);;
		$landingplace = trim($_POST["landingplace"]);;
		$landingtime = trim($_POST["landingtime"]);;
		
		
		//$birthdate = $day . "/" . $month . "/" . $year;
		//
		$errorMeesage = "";
		$result = TicketManager::insertNewTicket($userid, $price, $buydate, $departureplace, $departuretime, $landingplace, $landingtime);
		if(!$result) {
			$errorMeesage = "Yeni kullanıcı kaydı başarısız!";
		}
		
	}
	
	if (isset($_GET['ticketid'])) {
    
		$result = TicketManager::deleteTicket($_GET['ticketid']);
	
    }
	
	if(isset($_POST["userid"]) && isset($_POST["price"]) && isset($_POST["buydate"]) && isset($_POST["departureplace"]) && isset($_POST["ticketid"]) &&
	isset($_POST["departuretime"]) && isset($_POST["landingplace"]) && isset($_POST["landingtime"]) && isset($_POST["landingtime"])   && isset($_POST["updatebutton"]) && !isset($_POST["insertbutton"])) {
		
		
		$ticketid = trim($_POST["ticketid"]);;
		$userid = trim($_POST["userid"]);;
		$price = trim($_POST["price"]);;
		$buydate = trim($_POST["buydate"]);;
		$departureplace = trim($_POST["departureplace"]);;
		$departuretime = trim($_POST["departuretime"]);;
		$landingplace = trim($_POST["landingplace"]);;
		$landingtime = trim($_POST["landingtime"]);;
		
		
		$errorMeesage = "";
		$result = TicketManager::updateTicket($ticketid, $userid, $price, $buydate, $departureplace, $departuretime, $landingplace, $landingtime);
		if(!$result) {
			$errorMeesage = "Yeni kullanıcı kaydı başarısız!";
		}
		
	}


?>






<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>BlackPearl-Tickets</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="Blackpearl.com/style/site.css">
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
		hr { 
			display: block;
			margin-top: 0.5em;
			margin-bottom: 0.5em;
			margin-left: auto;
			margin-right: auto;
			border-style: inset;
			border-width: 1px;
		} 
		
		</style>
		
		<script>
		function delete(id)
		{
			window.alert(id);
			
			
			
		}
		
		
		
		
		</script>
	</head>
	
	<body>
	
		<nav class="navbar navbar-inverse ">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">BlackPearl</a>
			</div>
			<ul class="nav navbar-nav">
			  <li ><a href="#">Home</a></li>
			  <li class="active" ><a href="/BlackPearl.com/PresentationLayer/tickets.php">Tickets</a></li>
			  <li><a href="#">About</a></li>
			  <li><a href="#">Feedback</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li ><a href="/BlackPearl.com/PresentationLayer/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			  <li><a href="/BlackPearl.com/PresentationLayer/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		  </div>
		</nav>
		
		
		<div class="container-fluid contaier-form">
			<h2> HOSGELDIN <?php echo $_SESSION["name"] ?> </h2>
			<form method="GET" action="<?php $_PHP_SELF ?>"  >
				<table>
				<?php 
					
						require_once("C:/Users/Cem/xampp/htdocs/BlackPearl.com/LogicLayer/TicketManager.php");
						$tickets;
						
						
						$tickets = TicketManager::getAllTickets();
						
						
						for($i = 0; $i < count($tickets); $i++) {
						?>
						
						<tr>
							<td ><h2> TicketID </h2></td>
							<td ><h2> UserID </h2></td>
							<td ><h2> Departure Place </h2></td>
							<td ><h2> Departure Time </h2></td>
							<td ><h2> Landing Place </h2></td>
							<td ><h2> Landing Time </h2></td>
							<td ><h2> Price </h2></td>
							<td ><h2> Buy Date </h2></td>
							
						</tr>
						<tr>
							<td ><?php echo $tickets[$i]->getTicketid(); ?></td>
							<td ><?php echo $tickets[$i]->getUserid(); ?></td>
							<td ><?php echo $tickets[$i]->getDepartureplace(); ?></span>
							<td ><?php echo $tickets[$i]->getDeparturetime(); ?></span></td>
							<td ><?php echo $tickets[$i]->getLandingplace(); ?></td>
							<td ><?php echo $tickets[$i]->getLandingtime(); ?></td>
							<td ><?php echo $tickets[$i]->getPrice(); ?></td>
							<td ><?php echo $tickets[$i]->getBuydate(); ?></td>
							<!--td ><button type="submit" class="btn btn-default btn-lg" name="deletebutton" onclick="delete('idgelecek');"> Delete </button></td-->
							
							<td><a href='adminpage.php?ticketid=<?php echo $tickets[$i]->getTicketid(); ?>'>Delete</a></td>
							
							
							<td><input type="hidden" name="chosenid" value="<?php echo $tickets[$i]->getTicketid(); ?>"></td>
						</tr>
						<tr>
							<td colspan="14"><hr></td>
						</tr>
						<?php
							}
						
					?>
				</table>
			</form>
			
			<form method="POST" action="<?php $_PHP_SELF ?>"  >
			
			<div class="form-group">
				<label for="userid">UserID:</label>
				<input type="text" class="form-control" id="userid" placeholder="Enter user id" name="userid">
			</div>
			<div class="form-group">
				<label for="departureplace">Departure Place:</label>
				<input type="text" class="form-control" id="departureplace" placeholder="Enter dep.place" name="departureplace">
			</div>
			
			<div class="form-group">
				<label for="departuretime">Departure Time:</label>
				<input type="text" class="form-control" id="departuretime" placeholder="Enter dep.time" name="departuretime">
			</div>
			<div class="form-group">
				<label for="landingplace">Landing Place:</label>
				<input type="text" class="form-control" id="landingplace" placeholder="Enter Land.place" name="landingplace">
			</div>
			
			<div class="form-group">
				<label for="landingtime">Landing Time:</label>
				<input type="text" class="form-control" id="landingtime" placeholder="Enter Land.time" name="landingtime">
			</div>
			<div class="form-group">
				<label for="price">Price:</label>
				<input type="text" class="form-control" id="price" placeholder="Enter Price" name="price">
			</div>
			
			<div class="form-group">
				<label for="buydate">Buy date:</label>
				<input type="text" class="form-control" id="buydate" placeholder="Enter Buy Date" name="buydate">
			</div>
			<button type="submit" class="btn btn-default btn-lg" name="insertbutton" >ADD</button>
			
			
			
			
			<div class="form-group">
				<label for="ticketid">Ticket ID:</label>
				<input type="text" class="form-control" id="ticketid" placeholder="Enter Ticket id to update" name="ticketid">
			</div>
			
			<button type="submit" class="btn btn-default btn-lg" name="updatebutton" >UPDATE</button>
			
			
			</form>
			
		</div>
		
		<div class="container-fluid contaier-form">
		
		<form action="bankwebservice.php" method="POST"> 
					<table>
						<tr>
							<td>
								TC NO: 
							</td>
							<td>
								<input type="text" name="tcno" id="tcno" title="Örn: 01234567891" required />
							</td>
						</tr>
						
						<tr>
							<td>
								Format : 
							</td>
							<td>
								<input type="radio" name="format" value="json" id="radioJson" checked>
								<label for="radioJson">JSON</label>
								<br>
								<input type="radio" name="format" value="xml" id="radioXml">
								<label for="radioXml">XML</label>
							</td>
						</tr>
						
						<tr>
							<td>
								<input type="submit" value="Submit Form!" />
							</td>
							
						</tr>
					</table>
				</form> 
		
		
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</body>