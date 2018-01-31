<?php
	class Template extends Controller{
		private static $file;

		public static function create($file){
			self::$file = 'app/View/' . $file;

			if (!file_exists(self::$file)) {
				return "Error loading template file (self::$file).";
			}

			$output = file_get_contents(self::$file);

			// Find where { and } are in the string.
			$array1 = self::strpos_all($output, '{{');
			$array2 = self::strpos_all($output, '}}');
			$combine = array();
			
			// Combine as a string.
			$combineStr = '';

			for($i = 0; $i < count($array1); $i++)
			{
				array_push($combine, substr($output, $array1[$i]+2, ($array2[$i] - $array1[$i])-2));
			}

			for($i = 0; $i < count($combine); $i++)
			{
				$combineStr .= $combine[$i];
			}

			$combineStr = str_replace('\'', '', $combineStr);
			
			// Remove all ' and : from the string.
			$output = str_replace('\'', '', $output);
			$output = str_replace(':', '="', $output);

			// Split {{ and remove }}.
			$outputComponents = explode('{{', $output);
			$outputComponents = str_replace('}}', '', $outputComponents);

			// Check outputComponent.
			$outputComponent = array();

			// Split [ and ].
			for($i = 0; $i < count($outputComponents); $i++)
			{
				$outputComponents[$i] = explode('[', $outputComponents[$i]);

				for($j = 0; $j < count($outputComponents[$i]); $j++)
				{
					// Remove ].
					if($j === 1){
						$outputComponents[$i][$j] = 
							str_replace(']', '', $outputComponents[$i][$j]);

						// Combine all results into an array.
					}
				}
			}

			$outputComponents[0] = array_shift($outputComponents[0]);

			$elemets = [];
			$params = [];

			for($i = 0; $i < count($outputComponents); $i++)
			{
				for($j = 0; $j < count($outputComponents[$i]); $j++)
				{
					if($i !== 0)
					{
						if($j !== 0){
							$params[] = $outputComponents[$i][$j];
						}
					}
				}

				if($i !== 0)
				{
					$elements[] = $outputComponents[$i][0];
				}
			}

			$param = [];

			var_dump($elements); echo '<br>';

			for($i = 0; $i < count($params); $i++)
			{
				$params[$i] = rtrim($params[$i]);
				$params[$i] .= '"';
				$params[$i] = str_replace(',', '" ', $params[$i]);
			}
			
			$output = self::callComponents($elements[0], '', $output);

			foreach($elements as $key)
			{
				$output = self::callComponents($key, '', $output);
			}

			var_dump($elements);

			echo $output;
		}

		/**
		 * Replace component inside the string.
		 * @param  string $component A string to replace with component.
		 * @param  string $string    The whole string.
		 * @return object            Returns the object to be called.
		 */
		private static function replace($component, $params, $string){
			$result = '';

			switch($component)
			{
				case 'button':

					$result = str_replace('{{button}}', Button::create('submit', $params), $string);

				break;

				case 'form':

					$result = str_replace('{{form}}', Form::create('POST',
						array('text' => 'Name'), 'Submit'), $string);

				break;
			}

			return $result;
		}

		// Get the string in between.
		private static function getStringBetween($str,$from,$to){
			$sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
    		return substr($sub,0,strpos($sub,$to));
		}

		// Find all the positions of repeated strings in a haystack.
		private static function strpos_all($haystack, $needle) {
		    $offset = 0;
		    $allpos = array();
		    while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
		        $offset   = $pos + 1;
		        $allpos[] = $pos;
		    }
		    return $allpos;
		}

		// Replace the words with real components.
		private static function callComponents($component, $params, $string)
		{
			if(!empty(strpos($string, $component)))
			{
				return self::replace($component, $params, $string);
			}
			else
			{
				echo 'Component does not exist.';
			}
		}
	}