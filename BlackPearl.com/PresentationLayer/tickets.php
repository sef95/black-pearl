<?php 

	//set_include_path('C:/Users/Cem/xampp/htdocs/BlackPearl.com');
	require_once("../LogicLayer/TicketManager.php");
	
	

	if (array_key_exists('operation', $_GET)) {

		if($_GET["operation"] == "delete")
		{
			if(isset($_GET["ticketid"]))
			{
				$result = TicketManager::deleteTicket($_GET["ticketid"]);
			}
		}
		
		if($_GET["operation"] == "update")
		{
			if(isset($_GET["ticketid"]) && isset($_GET["oldprice"]))
			{
				$newprice = $_GET["oldprice"] - 5;
				if($newprice < 0)
					$newprice = 0;
				$result = TicketManager::updatePrice($_GET["ticketid"],$newprice);
			}
		}
	
	}
	session_start();
	

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
		
		<div class="container-fluid contaier-form container-center">
		
			<h2>SEARCH TICKETS</h2>
			<form method="POST" action="<?php $_PHP_SELF ?>" class="form-inline" >
						
							<div class="form-group">
								<label for="tcno">TCNo:</label>
								<input type="text" class="form-control" id="tcno" placeholder="Enter TC / SSN" name="tcno">
							</div>
							
							<button type="submit" class="btn btn-default btn-lg""  >Search</button>
			</form>
		
		</div>
		
		
		<div class="container-fluid contaier-form">
		
			<form method="POST" action="<?php $_PHP_SELF ?>"  >
				<table>
				<?php 
				
					//set_include_path('C:/Users/Cem/xampp/htdocs/BlackPearl.com');
					require_once("C:/Users/Cem/xampp/htdocs/BlackPearl.com/LogicLayer/TicketManager.php");
					$tickets;
					if( isset($_POST["tcno"]) ) {
						$tcno = trim($_POST["tcno"]);
						
						$errorMeesage = "";
						$tickets = TicketManager::getTickets($tcno);
					
					
						for($i = 0; $i < count($tickets); $i++) {
					?>
					<tr>
						<td colspan="6"><h2> VOYAGE SUMMARY </h2></td>
					</tr>
					<tr>
						<td colspan="2"><?php echo $tickets[$i]->getDepartureplace(); ?><span class="glyphicon glyphicon-star" ></span></td>
						<td colspan="2"><?php echo $tickets[$i]->getDeparturetime(); ?><span class="glyphicon glyphicon-star" ></span></td></td>
						<td colspan="2"><?php echo $tickets[$i]->getLandingplace(); ?><span class="glyphicon glyphicon-star" ></span></td></td>
						<td colspan="2"><?php echo $tickets[$i]->getLandingtime(); ?><span class="glyphicon glyphicon-star" ></span></td></td>
						<td colspan="2"><?php echo $tickets[$i]->getPrice(); ?><span class="glyphicon glyphicon-star" ></span></td></td>
						<td colspan="2"><?php echo $tickets[$i]->getBuydate(); ?></td>
						<td><a href='tickets.php?ticketid=<?php echo $tickets[$i]->getTicketid(); ?>&operation=delete'>Delete</a></td>
						<td colspan="2"><input type="text" name="discountcode" placeholder="Enter your discount code!"> </td>
						<td><a href='tickets.php?ticketid=<?php echo $tickets[$i]->getTicketid(); ?>&operation=update&oldprice=<?php echo $tickets[$i]->getPrice(); ?>'>Discount</a></td>
						
						
					</tr>
					<tr>
						<td colspan="14"><hr></td>
					</tr>
					<?php
						}
					}
				?>
				</table>
			</form>
		</div>
		
		
	
	
	</body>