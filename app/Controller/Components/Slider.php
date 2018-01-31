<?php
	class Slider{
		public static function create($range = array(0,100), $step = '10'){

			foreach($range as $min => $max){
				echo '<input type = "range" min = "$min" max = "$max" step = "$step">';
			}
		}
	}