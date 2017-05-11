<?php
	if(isset($_POST['tcno'])) {
		// connect DB
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "blackpearl";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
			die("Connection error: " . $conn->connect_error);
		}
		
		$conn->set_charset("utf8");
		
		
		
		// read POST variables
		$format = strtolower($_POST['format']) == 'json' ? 'json' : 'xml'; // xml is the default
		$tcno = $_POST['tcno'];
		
		// prepare, bind and execute SQL statement
		$stmt = $conn->prepare("SELECT tcno, birthdate FROM user WHERE user.tcno = ?");
		$stmt->bind_param("s", $tcno); // si: string integer
		$stmt->execute();
		$stmt->bind_result($tcno, $birthdate);
		
		
		$people = array();
		while ($stmt->fetch()) {
			array_push( $people, array("TCNO"=>$tcno, "Birthdate"=>$birthdate) );
		}
		
		$stmt->close(); // close statement
		
		
		if($format == 'json') { // JSON output
			header('Content-type: application/json');
			echo json_encode(array('person'=>$people));
		}
		else { // XML output
			header('Content-type: text/xml');
			echo '<people>';
			
			foreach($people as $index => $person) {
				
				echo '<person>';
				foreach($person as $key => $value) {
					echo '<',$key,'>';
					echo htmlentities($value);
					echo '</',$key,'>';
				}
				echo '</person>';
				
			}
			
			echo '</people>';
		}
		
		
		
		$conn->close(); // close DB connection
	}
?>		