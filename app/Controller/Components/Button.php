<?php
	/**
	 * @author Aleksander Dishnica <adishnica@yahoo.com>
	 * @data 1/25/2018
	 */
	class Button{
		public static function create($buttonName, $params = ''){
			return '<button '.$params.'>'.$buttonName.'</button>';
		}
	}