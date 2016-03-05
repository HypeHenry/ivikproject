<?php
namespace myMvc\System;

class View {

	private static $sections;

	/**
	 * Load the View with section content
	 * @param  [type] $section [description]
	 * @param  [type] $view        [description]
	 * @param  [type] $data        [description]
	 * @return [type]               [description]
	 */
	public static function view ($section, $view, $data = null) {
		self::$sections[$section] = [
			'view' => $view,
			'data' => $data
		];
	}

	public static function fetch ($layout, $data) {
		if (is_array($data)) {
			# Cast all arrays to objects
			foreach ($data as $key => $value) {
				if (is_array($value)) {
					$data[$key] = (object) $value;
				}
			}
			
			extract($data);
		}

		ob_start();
		include($layout);
		$result = ob_get_contents();
		ob_end_clean();
		return $result;
	}

	public static function display ($layout, $data) {
		echo self::fetch($layout, $data);
	}

	/**
	 * Display a section
	 * @param  [type] $section [description]
	 * @return [type]           [description]
	 */
	public static function section ($section) {
		if (!empty(self::$sections)) {
			if (array_key_exists($section, self::$sections)) {
				
				/*
				 * Parse placeholder settings
				 */
				# Get items for the placeolder
				$view = self::$sections[$section]['view'];
				$data = self::$sections[$section]['data'];

				# Extract the data from the data array into variables
				if (is_array($data)) {

					# Cast all arrays to objects
					foreach ($data as $key => $value) {
						if (is_array($value)) {
							$data[$key] = (object) $value;
						}
					}
					
					extract($data);
				}

				/*
				 * Load and parse the view into a variable
				 * Return the parsed view
				 */
				# Turn on output buffering
				ob_start();
				
				# Include the view
				include($view);
				
				# Get the contents of the output buffer
				$parsed = ob_get_contents(); // 
				
				# Clean (erase) the output buffer and turn off output buffering
				ob_end_clean(); //  

				# return the parsed view
				return $parsed;

			} else {
				return null;
			}
		}
	}
}