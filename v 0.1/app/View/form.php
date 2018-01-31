<?php
	class Form{
		public static function create($submitValue){
			echo '<form action = "" method = "POST">
				Name: <input type = "text"><br>
				Surname: <input type = "text"><br>
				Password: <input type = "password"><br>
				'. Button::create($submitValue) .'
			</form>';
		}
	}