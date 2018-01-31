<?php
	class Input{
		private static $inputs;

		public static function text($values){

			foreach($values as $key => $value)
			{
				self::$inputs .= $value;
				self::$inputs .= ': <input type = "$key" name = "$value"><br>';
			}

			return self::$inputs;
		}
	}