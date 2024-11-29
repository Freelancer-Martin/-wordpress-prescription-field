<?php
add_action( 'admin_enqueue_scripts', 'my_enqueues' );
function my_enqueues($hook) {
    if( 'index.php' != $hook ) {
	// Only applies to dashboard panel
	return;
    }

	//wp_enqueue_script( 'ajax-script', plugins_url( '/js/my_query.js', __FILE__ ), array('jquery') );

	// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
	wp_localize_script( 'ajax-script', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
}

// Same handler function...
add_action( 'wp_ajax_my_action', 'my_action' );
function my_action() {
	global $wpdb;
	$whatever = intval( $_POST['whatever'] );
	$whatever += 10;
        echo $whatever;
	wp_die();
}


add_action( 'wp_ajax_my_action', 'my_action' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action' );
