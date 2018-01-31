<?php
	class User{
		private $name = '';
		private $surname = 'Dishnica';
	
		public function __construct($name){
			$this->name = $name;
		}
	
		public function getName(){
			echo $this->name;
		}

		public function setName($name){
			$this->name = $name;
		}
	}