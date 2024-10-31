<?php

function offerte_internet_log_error( $response ) {
	if (is_wp_error($response)) {
		$msg = implode( " — ", $response->get_error_messages() );
	} elseif (isset($response['body'])) {
		$msg = 'Remote call unsuccessful: '. wp_remote_retrieve_response_message( $response );
	} else {
		$msg = 'Unknown error';
	}
	$err = "[" . date( "Y-m-d H:i:s" ) . "] " . $msg . "\n";
	
	error_log( $err, 3, plugin_dir_path( __FILE__ ) . "error_log" );
}

function offerte_internet_fetch_data(){
	// {@see https://codex.wordpress.org/HTTP_API}
	$response = wp_remote_get( 'https://5nnloavu9c.execute-api.eu-west-1.amazonaws.com/offx/offint' );

	if ( ! is_wp_error( $response ) ) {
		// The request went through successfully, check the response code against
		// what we're expecting
		if ( 200 == wp_remote_retrieve_response_code( $response ) ) {
			// Do something with the response
			update_option( 'offerte_internet_data', json_decode( wp_remote_retrieve_body( $response ), true ) );
		} else {
			// The response code was not what we were expecting, record the message
			offerte_internet_log_error( $response );
			return $error_message = wp_remote_retrieve_response_message( $response );
		}
	} else {
		// There was an error making the request
		offerte_internet_log_error( $response );
		return $error_message = $response -> get_error_message();
	}
}
