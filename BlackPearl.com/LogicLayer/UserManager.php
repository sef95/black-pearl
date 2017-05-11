<?php 
	//set_include_path('C:/Users/Cem/xampp/htdocs/BlackPearl.com');
	require_once(dirname(__FILE__) . "/../DataLayer/DB.php");
	require_once(dirname(__FILE__) . "/../LogicLayer/User.php");
	
	class UserManager {
		
		public static function getAllUsers () {
			$db = new DB();
			$result = $db->getDataTable("select ID, Name, Phone from users order by Name");
			
			$allUsers = array();
			
			while($row = $result->fetch_assoc()) {
				$userObj = new User($row["ID"], $row["Name"], $row["Phone"]);
				array_push($allUsers, $userObj);
			}
			
			return $allUsers;
		}
		
		public static function insertNewUser($tcno, $name, $surname, $email, $phone, $birthdate, $gender, $password, $nationality) {
			$db = new DB();
			$success = $db->executeQuery("INSERT INTO `user`(`tcno`, `name`, `surname`, `email`, `phone`, `birthdate`, `gender`, `password`, `nationality`) VALUES ('$tcno','$name','$surname','$email','$phone','$birthdate','$gender','$password','$nationality')");
			
			return $success;
		}
		
		
		
		public static function loginUser($tcno, $password)
		{
			$db = new DB();
			
			$result = $db->getDataTable("SELECT * FROM USER WHERE user.tcno='$tcno' AND user.password='$password'");
			
			$row = $result->fetch_assoc();
		
			$allUsers = array();
			$userObj = new User($row["userid"], $row["tcno"], $row["name"], $row["surname"], $row["email"], $row["phone"], $row["birthdate"], $row["gender"], $row["password"], $row["nationality"], $row["isadmin"] );
			array_push($allUsers, $userObj);
			
			return $allUsers;
		}
	}
?>

