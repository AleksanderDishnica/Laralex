<?php
	class Clients{
		CONST TABLE = 'Clients';

		public static function callClients($id, $names){
			echo '{ id : ' . $id . ' }<br>';

			foreach($names as $key => $name){
				echo '{ ' . $key . ' : ' . $name . ' }<br>';
			}
		}
	}