<?php 
	class Ticket {
		private $ticketid;
		private $userid;
		private $price;
		private $buydate;
		private $departureplace;
		private $departuretime;
		private $landingplace;
		private $landingtime;

		
		
		function __construct($ticketid = NULL, $userid = NULL, $price = NULL, $buydate = NULL, $departureplace = NULL, $departuretime = NULL, $landingplace = NULL, $landingtime = NULL) {
			$this->ticketid        = $ticketid;
			$this->userid          = $userid;
			$this->price           = $price;
			$this->buydate         = $buydate;
			$this->departureplace  = $departureplace;
			$this->departuretime   = $departuretime;
			$this->landingplace    = $landingplace;
			$this->landingtime     = $landingtime;
		}                            
		
		public function getTicketid() {
			return $this->ticketid;
		}
		
		public function getUserid() {
			return $this->userid;
		}
		
		public function getPrice() {
			return $this->price;	
		}
		
		public function getBuydate() {
			return $this->buydate;
		}
		
		public function getDepartureplace() {
			return $this->departureplace;
		}
		
		public function getDeparturetime() {
			return $this->departuretime;	
		}
		
		public function getLandingplace() {
			return $this->landingplace;
		}
		
		public function getLandingtime() {
			return $this->landingtime;
		}
		
	}
?>