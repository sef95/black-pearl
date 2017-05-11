<?php 
    session_start();
	set_include_path('C:/xampp/htdocs/BlackPearl.com');
	require_once("LogicLayer/ShipManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["name"]) && isset($_POST["productionplace"]) && isset($_POST["type"]) && isset($_POST["capacity"]) && isset($_POST["year"]) 
		&& isset($_POST["month"]) && isset($_POST["day"]) && isset($_POST["year1"]) && !isset($_POST["updatebutton"]) && isset($_POST["insertbutton"]) 
		&& isset($_POST["month1"]) && isset($_POST["day1"])) {
		
		$name = trim($_POST["name"]);;
		$productionplace = trim($_POST["productionplace"]);;
		$type = trim($_POST["type"]);;
		$day = trim($_POST["day"]);;
		$month = trim($_POST["month"]);;
		$year = trim($_POST["year"]);;
		$day1 = trim($_POST["day1"]);;
		$month1 = trim($_POST["month1"]);;
		$year1 = trim($_POST["year1"]);;
		$capacity = trim($_POST["capacity"]);;
		
		$productiondate  = $day . "/" . $month . "/" . $year;
		$lastmaintenancedate = $day1 . "/" . $month1 . "/" . $year1;
		
		$errorMeesage = "";
		$result = ShipManager::insertNewShip($name, $productionplace, $productiondate, $type, $lastmaintenancedate, $capacity);
		if(!$result) {
			$errorMeesage = "Yeni ship kaydı başarısız!";
		}
		
	}
	if(isset ($_POST["shipid"]) && isset($_POST["name"]) && isset($_POST["productionplace"]) && isset($_POST["type"]) && isset($_POST["capacity"]) && isset($_POST["year"]) 
		&& isset($_POST["month"]) && isset($_POST["day"]) && isset($_POST["year1"]) && isset($_POST["updatebutton"]) && !isset($_POST["insertbutton"]) 
		&& isset($_POST["month1"]) && isset($_POST["day1"])) {
		
		$shipid = trim($_POST["shipid"]);;
		$name = trim($_POST["name"]);;
		$productionplace = trim($_POST["productionplace"]);;
		$type = trim($_POST["type"]);;
		$day = trim($_POST["day"]);;
		$month = trim($_POST["month"]);;
		$year = trim($_POST["year"]);;
		$day1 = trim($_POST["day1"]);;
		$month1 = trim($_POST["month1"]);;
		$year1 = trim($_POST["year1"]);;
		$capacity = trim($_POST["capacity"]);;
		
		$productiondate  = $day . "/" . $month . "/" . $year;
		$lastmaintenancedate = $day1 . "/" . $month1 . "/" . $year1;
		
		$errorMeesage = "";
		$result = ShipManager::updateShip($shipid, $name, $productionplace, $productiondate, $type, $lastmaintenancedate, $capacity);
		if(!$result) {
			$errorMeesage = "Yeni ship kaydı başarısız!";
		}
		
	}
	
	if (isset($_GET['shipid'])) {
    
		$result = ShipManager::deleteShip($_GET['shipid']);
	
    }
?>



<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>BlackPearl-Add Ship</title>
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
			width:80%;
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
			  <li><a href="/BlackPearl.com/PresentationLayer/Ship.php">Ships</a></li>
			  <li><a href="#">About</a></li>
			  <li><a href="#">Feedback</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li class="active"><a href="/BlackPearl.com/PresentationLayer/adminPage.php"><span class="glyphicon glyphicon-user"></span> Admin Page</a></li>
			  <li><a href="/BlackPearl.com/PresentationLayer/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		  </div>
		</nav>
		
		<div class="container-fluid contaier-form">
			<h2> HOSGELDIN <?php echo $_SESSION["name"] ?> </h2>
			<form method="POST" action="<?php $_PHP_SELF ?>"  class="form-inline" >
				<table>
				<?php 
					
						require_once("C:/xampp/htdocs/BlackPearl.com/LogicLayer/ShipManager.php");
						$ships;
						
						
						$ships = ShipManager::getAllShips();
						?>
						<tr>
							<td ><h3> ShipID &nbsp;&nbsp; &nbsp;</h3></br></td>
							<td ><h3> Name &nbsp; &nbsp; &nbsp;</h3></br></td>
							<td ><h3> Production Date &nbsp;&nbsp; &nbsp;</h3></br></td>
							<td ><h3> Production Place &nbsp;&nbsp; &nbsp;</h3></br></td>
							<td ><h3> Type &nbsp;&nbsp; &nbsp;</h3></br></td>
							<td ><h3> Last Maintenance Date &nbsp; &nbsp;</h3></br></td>
							<td ><h3> Capacity &nbsp;&nbsp;</h3></br></td>		
					
						</tr>
						
						<?php
						for($i = 0; $i < count($ships); $i++) {
						?>
						
						
						
						<tr>
							<td ><?php echo $ships[$i]->getShipid(); ?></td>
							<td ><?php echo $ships[$i]->getName(); ?></td>
							<td ><?php echo $ships[$i]->getProductiondate(); ?></span>
							<td ><?php echo $ships[$i]->getProductionplace(); ?></span></td>
							<td ><?php echo $ships[$i]->getTypeship(); ?></td>
							<td ><?php echo $ships[$i]->getLastmaintenancedate(); ?></td>
							<td ><?php echo $ships[$i]->getCapacity(); ?></td>
							
							<!--td ><button type="submit" class="btn btn-default btn-lg" name="deletebutton" onclick="delete('idgelecek');"> Delete </button></td-->
							
							<td><a href='adminPage.php?shipid=<?php echo $ships[$i]->getShipid(); ?>'>Delete</a></td>
							
							
							<td><input type="hidden" name="chosenid" value="<?php echo $ships[$i]->getShipid(); ?>"></td>
						</tr>
						<tr>
							<td colspan="14"><hr></td>
						</tr>
						<?php
							}
						
					?>
				</table>
			</form>
			
			<form method="POST" action="<?php $_PHP_SELF ?>" >
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
							</div>
						</br>
						
							<div class="form-group">
								<label for="ProductionDate">ProductionDate:</label>
								<select class="form-control" id="day" name="day">
									<option value="1" >1</option><option value="2">2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option><option value="6" >6</option><option value="7" >7</option>
									<option value="8" >8</option><option value="9" >9</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option>
									<option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option>
									<option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" >24</option>
									<option value="25" >25</option><option value="26" >26</option><option value="27" >27</option><option value="28" >28</option><option value="29" >29</option><option value="30" 30</option><option value="31" >31</option>
								</select>
								<select class="form-control" id="month" name="month">
									<option value="1" >1</option><option value="2" >2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option><option value="6" >6</option>
									<option value="7" >7</option><option value="8" >8</option><option value="9" >9</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option>
								</select>
								<select class="form-control" id="year" name="year">
									<option value="1973" >1973</option><option value="1974" >1974</option><option value="1975" >1975</option><option value="1976" >1976</option><option value="1977" >1977</option><option value="1978" >1978</option><option value="1979" >1979</option><option value="1980" >1980</option>
									<option value="1981" >1981</option><option value="1982" >1982</option><option value="1983" >1983</option><option value="1984" >1984</option><option value="1985" >1985</option><option value="1986" >1986</option><option value="1987" >1987</option>
									<option value="1988" >1988</option><option value="1989" >1989</option><option value="1990" >1990</option><option value="1991" >1991</option><option value="1992" >1992</option><option value="1993" >1993</option><option value="1994" >1994</option>
									<option value="1995" >1995</option><option value="1996" >1996</option><option value="1997" >1997</option><option value="1998" >1998</option><option value="1999" >1999</option>
									<option value="2000" >2000</option><option value="2001" >2001</option><option value="2002" >2002</option><option value="2003" >2003</option>
								</select>
							</div>
							</br>
							<div class="form-group">
								<label for="productionplace">ProductionPlace:</label>
								<input type="text" class="form-control" id="productionplace" placeholder="Enter Production Place" name="productionplace">
							</div>
							
							<div class="form-group">
								<label for="type">Type:</label>
								<select class="form-control" id="type" name="type">
									<option>Sal</option><option>Gemi</option><option>YükGemisi</option><option>At</option><option>Vapur</option>
								</select>
							</div>
							
							</br>
							
							<div class="form-group">
								<label for="LastMaintenanceDate">LastMaintenanceDate:</label>
								<select class="form-control" id="day1" name="day1">
									<option value="1" >1</option><option value="2">2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option><option value="6" >6</option><option value="7" >7</option>
									<option value="8" >8</option><option value="9" >9</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option>
									<option value="13" >13</option><option value="14" >14</option><option value="15" >15</option><option value="16" >16</option><option value="17" >17</option><option value="18" >18</option>
									<option value="19" >19</option><option value="20" >20</option><option value="21" >21</option><option value="22" >22</option><option value="23" >23</option><option value="24" >24</option>
									<option value="25" >25</option><option value="26" >26</option><option value="27" >27</option><option value="28" >28</option><option value="29" >29</option><option value="30" 30</option><option value="31" >31</option>
								</select>
								<select class="form-control" id="month1" name="month1">
									<option value="1" >1</option><option value="2" >2</option><option value="3" >3</option><option value="4" >4</option><option value="5" >5</option><option value="6" >6</option>
									<option value="7" >7</option><option value="8" >8</option><option value="9" >9</option><option value="10" >10</option><option value="11" >11</option><option value="12" >12</option>
								</select>
								<select class="form-control" id="year1" name="year1">
									<option value="1973" >1973</option><option value="1974" >1974</option><option value="1975" >1975</option><option value="1976" >1976</option><option value="1977" >1977</option><option value="1978" >1978</option><option value="1979" >1979</option><option value="1980" >1980</option>
									<option value="1981" >1981</option><option value="1982" >1982</option><option value="1983" >1983</option><option value="1984" >1984</option><option value="1985" >1985</option><option value="1986" >1986</option><option value="1987" >1987</option>
									<option value="1988" >1988</option><option value="1989" >1989</option><option value="1990" >1990</option><option value="1991" >1991</option><option value="1992" >1992</option><option value="1993" >1993</option><option value="1994" >1994</option>
									<option value="1995" >1995</option><option value="1996" >1996</option><option value="1997" >1997</option><option value="1998" >1998</option><option value="1999" >1999</option>
									<option value="2000" >2000</option><option value="2001" >2001</option><option value="2002" >2002</option><option value="2003" >2003</option>
								</select>
							</div>
							<div class="form-group ">
								<label for="capacity">Capacity:</label>
								<input type="text" class="form-control" id="capacity" placeholder="000-111-22-33" name="capacity">
							</div>
							<button type="submit" class="btn btn-default btn-lg" name="insertbutton" >ADD</button>
							
							
							<div class="form-group">
							</br>
							</br>
								<label for="ticketid">Ship ID:</label>
								<input type="text" class="form-control" id="shipid" placeholder="Enter Ship id to update" name="shipid">
							</div>
							
							<button type="submit" class="btn btn-default btn-lg" name="updatebutton" >UPDATE</button>
							
							<?php 
									if(isset($errorMeesage)) {
										echo "<br>" . "<span style='color: red;'>" . $errorMeesage . "</span>";
									}
								?>
			</form>
		</div>
		
	</body> 
</html>