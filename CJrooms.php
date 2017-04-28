<?php

//simple variable debug function
//usage: pr($avariable);
if (!function_exists('pr')) {
  function pr($var) { echo '<pre>Diagnostics: '; var_dump($var); echo '</pre>';}
}





//-------------------------------------------------------------------
/* add in the jquery library and AJAX support to our plugin 
 * add in our custom CSS and custom js for form validation
 * https://github.com/malsup/form
 * http://bassistance.de/jquery-plugins/jquery-plugin-validation/
 * http://docs.jquery.com/Plugins/Validation */
// add_action( 'wp_enqueue_scripts', 'WAD_load_scripts2' );
// function WAD_load_scripts2() {
// //custommmm styles
//     wp_enqueue_style( 'WAD11', plugins_url('css/WAD11.css',__FILE__));

// }




add_shortcode('rooms', 'listRooms');
function listRooms(){
    CJ_room_details();
}






//========================================================================================
//just display a list of the records in the database
// this assumes the WAD11.sql has been preloaded
function CJ_list_rooms() {
    global $wpdb, $page_id;

	//grab all the rooms from the database
    $query = "SELECT * FROM CJ_room";
    $allrecs = $wpdb->get_results($query);
	
    $buffer = '<hr /><table>';
    foreach ($allrecs as $rec) {
		$buffer .= '<tr><td>'.$rec->room_type.'</td><td>'.$rec->rooms_available.'</td><td>'.$rec->rate.'</td><td>'.$rec->utillities.'</td></tr>';
		//$buffer .= '<td><a href="?page_id='.$page_id.'&cmd=second&bid='.$rec->id.'">Select</a></td>';	
    }
    $buffer .= '</table>';
    echo $buffer;
}





//-------------------------------------------------------------------
function CJ_room_details() {
	echo '<h2>Room Details</h2>';
	CJ_list_rooms();
}








?>