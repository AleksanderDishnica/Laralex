<?php
	/**
	 * @author Aleksander Dishnica <adishnica@yahoo.com>
	 * @data 1/26/2018
	 */
	class Form{
		/**
		 * Create a new form.
		 * @param  string $submitValue Submit button text.
		 * @return string              Returns the form.
		 */
		public static function create($method, $inputs, $submitValue){
			return '<form action = "" method = "'.$method.'">'.
			// Classes.
			Input::text($inputs).
			Button::create($submitValue).'

			</form>';
		}
	}