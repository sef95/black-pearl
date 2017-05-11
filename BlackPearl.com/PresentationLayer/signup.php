<?php 

	//set_include_path('C:/Users/Cem/xampp/htdocs/BlackPearl.com');
	require_once(dirname(__FILE__)."/../LogicLayer/UserManager.php");
	
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
			$errorMeesage = "Yeni kullanıcı kaydı başarısız!";
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
			  <li class="active"><a href="/BlackPearl.com/PresentationLayer/signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			  <li><a href="/BlackPearl.com/PresentationLayer/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		  </div>
		</nav>
		
		<div class="container-fluid contaier-form">
			<h2>PERSONAL INFORMATION</h2>
			<form method="POST" action="<?php $_PHP_SELF ?>" class="form-inline" >
						
							<div class="form-group">
								<label for="name">Name:</label>
								<input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
							</div>
							<div class="form-group right">
								<label for="Surname">Surname:</label>
								<input type="text" class="form-control" id="surname" placeholder="Enter Surname" name="surname">
							</div>
						</br>
						
							<div class="form-group" >
								<label for="gender">Gender:</label>
								<input type="radio" value="man" id="mancheck" name="gender">Man</label>
								<input type="radio" value="woman" id="womancheck" name="gender">Woman</label>
							</div>
							<div class="form-group right">
								<label for="Birthdate">Birthdate:</label>
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
								<label for="location">Location:</label>
								<select class="form-control" id="location">
									<option>Türkiye Cumhuriyeti</option><option>ABD</option><option>Azerbaycan</option><option>Hırvatistan</option><option>Suriye</option>
								</select>
							</div>
							<div class="form-group right">
								<label for="tcno">TC / SSN No:</label>
								<input type="text" class="form-control" id="tcno" placeholder="Enter TC / SSN" name="tcno">
							</div>
							</br>
							
							<div class="form-group">
								<label for="nationality">Nationality:</label>
								<select class="form-control" id="nationality" name="nationality">
									<option value="Türkiye Cumhuriyeti" >Türkiye Cumhuriyeti</option><option value="ABD" >ABD</option><option value="Azerbaycan">Azerbaycan</option><option value="Hırvatistan">Hırvatistan</option ><option value="Suriye">Suriye</option>
								</select>
							</div>
							<div class="form-group right">
								<label for="phone">Phone No:</label>
								<input type="text" class="form-control" id="phone" placeholder="000-111-22-33" name="phone">
							</div>
							</br>
							
							<div class="form-group">
								<label for="email">email:</label>
								<input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
							</div>
							<div class="form-group right">
								<label for="password">Password:</label>
								<input type="password" class="form-control" id="password" name="password">
							</div>
							</br>
							
						
							
							<h1>Terms and conditions</h1>
							<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eleifend mauris a dignissim malesuada. In sed porta lorem. Duis ac imperdiet mi. Curabitur quis libero a urna fermentum molestie. Aenean dui tellus, dignissim at eleifend eget, pellentesque eu erat. Etiam augue libero, dapibus in leo ac, sodales euismod elit. Fusce bibendum augue eros. Cras sit amet elementum turpis, eu laoreet felis. Aliquam augue orci, venenatis ac lobortis non, pretium a ex.</h2>
							
							<input type="radio" value="" id="termscheck" style="text-align:right" name="termsaccept" value="accept">I accept the terms & conditions</label>
							</br>
							<button type="submit" class="btn btn-default btn-lg" style="margin-left:20cm"  >Submit</button>
							
							<?php 
									if(isset($errorMeesage)) {
										echo "<br>" . "<span style='color: red;'>" . $errorMeesage . "</span>";
									}
								?>
			</form>
		</div>
		
	</body> 
</html>