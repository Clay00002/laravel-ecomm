<?php
	/**
	 * 
	 */
	 class Availability
	 {
	 	
	 	public static function display($availability)
	 	{
	 		if ($availability == 0) {
	 			echo "Out of stock";
	 		}elseif ($availability ==1) {
	 			echo "In stock";
	 		}
	 	}

	 	public static function displayClass($availability)
	 	{
	 		if ($availability == 0) {
	 			echo "outofstock";
	 		}elseif ($availability ==1) {
	 			echo "instock";
	 		}
	 	}
	 } 
 ?>