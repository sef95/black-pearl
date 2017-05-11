<?php 
	class User {
		private $id;
		private $tcno;
		private $name;
		private $surname;
		private $email;
		private $phone;
		private $birthdate;
		private $gender;
		private $password;
		private $nationality;
		private $isadmin;
		
		function __construct($id = NULL, $tcno = NULL, $name = NULL, $surname = NULL, $email = NULL, $phone = NULL, $birthdate = NULL, $gender = NULL, $password = NULL, $nationality = NULL, $isadmin = NULL) {
			$this->id = $id;
			$this->tcno = $tcno;
			$this->name = $name;
			$this->surname = $surname;
			$this->email = $email;
			$this->phone = $phone;
			$this->birthdate = $birthdate;
			$this->gender = $gender;
			$this->password = $password;
			$this->nationality = $nationality;
			$this->isadmin = $isadmin;
		}
		
		public function getID() {
			return $this->id;
		}
		
		public function getTcno() {
			return $this->tcno;
		}
		
		public function getName() {
			return $this->name;	
		}
		
		public function getSurname() {
			return $this->surname;
		}
		
		public function getEmail() {
			return $this->email;
		}
		
		public function getPhone() {
			return $this->phone;	
		}
		
		public function getBirthdate() {
			return $this->birthdate;
		}
		
		public function getGender() {
			return $this->gender;
		}
		
		public function getPassword() {
			return $this->password;	
		}
		
		public function getNationality() {
			return $this->nationality;	
		}
		
		public function getIsadmin() {
			return $this->isadmin;
		}
	}
?>