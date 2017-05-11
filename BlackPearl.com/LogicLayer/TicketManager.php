<?php 
	//set_include_path('C:/Users/Cem/xampp/htdocs/BlackPearl.com');
	require_once(dirname(__FILE__) . "/../DataLayer/DB.php");
	require_once(dirname(__FILE__) . "/../LogicLayer/Ticket.php");
	
	class TicketManager {
		
		
		
		public static function getTickets ($tcno) 
		{
			$db = new DB();
			$result = $db->getDataTable("SELECT * FROM ticket, user WHERE ticket.userid = user.userid AND user.tcno = '$tcno'");
			
			$tickets = array();
			
			while($row = $result->fetch_assoc()) {
				$ticketObj = new Ticket($row["ticketid"],$row["userid"],$row["price"], $row["buydate"], $row["departureplace"], $row["departuretime"], $row["landingplace"], $row["landingtime"]);////////
				array_push($tickets, $ticketObj);
			}
			
			return $tickets;
		}
		
		public static function deleteTicket($ticketid)
		{
			$db = new DB();
			$success = $db->executeQuery("DELETE FROM ticket WHERE ticket.ticketid=$ticketid");

			return $success;
		}
		
		public static function updatePrice($ticketid, $newprice)
		{
			$db = new DB();
			$success = $db->executeQuery("UPDATE ticket SET ticket.price=$newprice WHERE ticket.ticketid=$ticketid");

			return $success;
		}
		
		public static function getAllTickets () 
		{
			$db = new DB();
			$result = $db->getDataTable("SELECT * FROM ticket");
			
			$tickets = array();
			
			while($row = $result->fetch_assoc()) {
				$ticketObj = new Ticket($row["ticketid"],$row["userid"],$row["price"], $row["buydate"], $row["departureplace"], $row["departuretime"], $row["landingplace"], $row["landingtime"]);
				array_push($tickets, $ticketObj);
			}
			
			return $tickets;
		}
		public static function insertNewTicket($userid, $price, $buydate, $departureplace, $departuretime, $landingplace, $landingtime) {
			$db = new DB();
			$success = $db->executeQuery("INSERT INTO `ticket`( `userid`, `price`, `buydate`, `departureplace`, `departuretime`, `landingplace`, `landingtime`) VALUES ('$userid','$price','$buydate','$departureplace','$departuretime','$landingplace','$landingtime')");
			
			return $success;
		}
		public static function updateTicket($ticketid, $userid, $price, $buydate, $departureplace, $departuretime, $landingplace, $landingtime) {
			$db = new DB();
			$success = $db->executeQuery("UPDATE ticket SET ticket.userid = $userid, ticket.price = $price, ticket.buydate = '$buydate', ticket.departureplace = '$departureplace', ticket.departuretime = '$departuretime', ticket.landingplace = '$landingplace',
			ticket.landingtime = '$landingtime' WHERE ticket.ticketid = $ticketid" );
			
			return $success;
		}
		
	}
?>
