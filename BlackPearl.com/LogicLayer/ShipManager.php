<?php 
	set_include_path('C:/xampp/htdocs/BlackPearl.com');
	require_once("DataLayer/DB.php");
	require_once("LogicLayer/Ship.php");
	
	class ShipManager {
		
		public static function getAllShips () {
			$db = new DB();
			$result = $db->getDataTable("SELECT * FROM ship");
			
			$ships = array();
			
			while($row = $result->fetch_assoc()) {
				$shipObj = new Ship($row["shipid"], $row["name"], $row["productionplace"], $row["productiondate"], $row["type"], $row["lastmaintenancedate"], $row["capacity"]);
				array_push($ships, $shipObj);
			}
			
			return $ships;
		}

		
		public static function insertNewShip($name, $productionplace, $productiondate, $type, $lastmaintenancedate, $capacity) {
			$db = new DB();
			$success = $db->executeQuery("INSERT INTO ship(name, productionplace, productiondate, type,lastmaintenancedate, capacity) VALUES ('$name', '$productionplace', '$productiondate', '$type', '$lastmaintenancedate','$capacity')");
			return $success;
		}
		
		public static function updateShip($shipid, $name, $productionplace, $productiondate, $type, $lastmaintenancedate, $capacity) {
			$db = new DB();
			$success = $db->executeQuery("UPDATE ship SET ship.shipid = $shipid, ship.name = '$name', ship.productionplace = '$productiondate', ship.type = '$type', ship.lastmaintenancedate = '$lastmaintenancedate', ship.capacity = $capacity WHERE ship.shipid = $shipid" );
			
			return $success;
		}
		
		public static function changeLastmaintenance($Shipid, $newLastmaintenance) {
			$db = new DB();
			$success = $db->executeQuery("UPDATE Ship SET Ship.lastmaintenance='$newLastmaintenance' WHERE Ship.Shipid=$Shipid");
			
			return $success;
		}
		
		public static function deleteShip($shipid) {
			$db = new DB();
			$success = $db->executeQuery("DELETE FROM ship WHERE ship.shipid=$shipid");
			return $success;
		}
		
	}