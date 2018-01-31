<?php
	/**
	 * @author Aleksander Dishnica <adishnica@yahoo.com>
	 * @data 1/25/2018
	 */
	class Button{
		public static function create($buttonName, $buttonClass = 'btn-success'){
			echo '<button class = "btn ' . $buttonClass . '">'.$buttonName.'</button>';
		}
	}