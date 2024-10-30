<?php
/*
Plugin Name: Calculate Page Execution Time
Description: This plugin will calculate page execution time for your WordPress website, just active it & View Page Source.
Author: Milap, Imneerav
Version: 0.1
Author URI: https://patelmilap.wordpress.com
Text Domain: calculate-page-execution-time
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

/* Define class if does not exist */
if ( !class_exists( 'Calculate_Page_Execution_time' ) ) {
	class Calculate_Page_Execution_time {
			private static $start_time;
			/* Get time when page started loading */
			static function get_start_time() {
				$time 				= 	microtime();
				$time 				= 	explode(' ', $time);
				self::$start_time 	= 	$time[1] + $time[0];
			}
			/* Calculate page execution time in footer */
			static function get_execution_time() {
				$end_time 		= 	microtime();
				$end_time 		= 	explode(' ', $end_time);
				$end_time 		= 	$end_time[1] + $end_time[0];
				$total_time 	= 	round(($end_time - self::$start_time), 4);
				_e("<!-- Page execution time " . $total_time . " Seconds.-->
<!-- Calculate Page Execution Time Plugin -->","calculate-page-execution-time");
			}
	}
}
add_action('wp_head',array('Calculate_Page_Execution_time','get_start_time'));
add_action('wp_footer',array('Calculate_Page_Execution_time','get_execution_time'),999999999);
?>