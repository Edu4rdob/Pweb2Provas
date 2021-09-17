<?php
	class Usuario{
		private $fullname;
		private $usunome;
		private $email;
		private $password;
		
		function __construct($fullname, $usunome, $email, $password){
			$this->fullname = $fullname;
			$this->usunome = $usunome;
			$this->email = $email;
			$this->password = $password;
		}	
		public function getFullname(){
			return $this->fullname;
		}
		public function getUsunome(){
			return $this->usunome;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getPassword(){
			return $this->password;
		}
        public function setFullname($fullname){
			$this->fullname = $fullname;
		}
		public function setUsuario($usunome){
			$this->usunome = $usunome;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function setPassword($password){
			$this->password = $password;
		}	
	}
?>