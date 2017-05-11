<?php 
	require_once("/LogicLayer/UserManager.php");
	
	$errorMeesage = "";
	
	if(isset($_POST["username"]) && isset($_POST["phonenumber"])) {
		$name = trim($_POST["username"]);
		$phone = trim($_POST["phonenumber"]);
		
		$errorMeesage = "";
		$result = UserManager::insertNewUser($name, $phone);
		if(!$result) {
			$errorMeesage = "Yeni kullanıcı kaydı başarısız!";
		}
	}
?>
<!DOCTYPE html>
<html> 
	<head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <title>BlackPearl</title>
		<link rel="stylesheet" type="text/css" href="style/site.css">
	</head>
	<body> 
		<div id="dvMain">
			<form method="POST" action="<?php $_PHP_SELF ?>">
				<table id="tblUsers">
					<tbody>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Phone No</th>
						</tr>
						<?php 
							$userList = UserManager::getAllUsers();
							
							for($i = 0; $i < count($userList); $i++) {
							?>
							<tr>
								<td><?php echo $userList[$i]->getID(); ?></td>
								<td><?php echo $userList[$i]->getName(); ?></td>
								<td><?php echo $userList[$i]->getPhoneNumber(); ?></td>
							</tr>
							<?php
							}
						?>
						<tr>
							<td></td>
							<td>
								<input type="text" name="username" required />
							</td>
							<td>
								<input type="number" name="phonenumber" required />
								<input type="submit" name="save" value="Save!" />
								<?php 
									if(isset($errorMeesage)) {
										echo "<br>" . "<span style='color: red;'>" . $errorMeesage . "</span>";
									}
								?>
							</td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</body> 
</html>
