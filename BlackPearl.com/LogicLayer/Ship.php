<?php 
	class Ship {
		private $shipid;
		private $name;
		private $productionplace;
		private $productiondate;
		private $type;
		private $lastmaintenancedate;
		private $capacity;
		
		function __construct($shipid = NULL, $name = NULL, $productionplace = NULL, $productiondate = NULL, $type = NULL, $lastmaintenancedate = NULL, $capacity = NULL) {
			$this->shipid = $shipid;
			$this->name = $name;
			$this->productionplace = $productionplace;
			$this->productiondate = $productiondate;
			$this->type = $type;
			$this->lastmaintenancedate= $lastmaintenancedate;
			$this->capacity = $capacity;
		}
		
		public function getShipid() {
			return $this->shipid;
		}
		
		public function getName() {
			return $this->name;
		}
		
		public function getProductionplace() {
			return $this->productionplace;	
		}
		
		public function getProductiondate() {
			return $this->productiondate;
		}
		
		public function getTypeship() {
			return $this->type;
		}
		
		public function getLastmaintenancedate() {
			return $this->lastmaintenancedate;	
		}
		
		public function getCapacity() {
			return $this->capacity;
		}
	}
?>