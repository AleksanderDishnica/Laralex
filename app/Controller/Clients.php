<?php
	/**
	 * @author Aleksander Dishnica <adishnica@yahoo.com>
	 * @data 1/26/2018
	 */
	class Clients{
		CONST TABLE = 'Clients';
 
 		/**
 		 * Show the clients.
 		 * @param  int $id    The id of the client
 		 * @param  string $names The name of the client
 		 * @return associative array Shows the result
 		 */
		public static function callClients($id, $names){
			echo '{ id : ' . $id . ' }<br>';

			foreach($names as $key => $name){
				echo '{ ' . $key . ' : ' . $name . ' }<br>';
			}
		}
	}