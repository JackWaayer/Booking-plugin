<?php
session_start();

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




function CJ_list_rooms() {
    global $wpdb, $page_id;
	
	echo '<h2>Room Details</h2>';
	

	//grab all the rooms from the database
    $query = "SELECT * FROM cj_room";
    $allrecs = $wpdb->get_results($query);
	
    ?>
    <hr />
        <table>
            <th>Room Name</th>
            <th>Desription</th>
            <th>Price</th>
    <?php
    foreach ($allrecs as $rec) {
		?>
        <tr>
            <td><?php echo $rec->room_name ?></td>
            <td><?php echo $rec->description ?></td>
            <td><?php echo $rec->price ?></td>
        </tr>
    <?php
    }
    ?>
    </table>
    <?php

}



function CJ_get_room($roomID){
	global $wpdb;
	
	$qry = $wpdb->prepare("SELECT * FROM cj_room WHERE id = %s",$roomID);
	return $wpdb->get_results($qry);
}



function CJ_get_all_rooms(){
	global $wpdb;
	$query = "SELECT * FROM cj_room";
    return $wpdb->get_results($query);
}









?>