<?php
/*
  Plugin Name: WordPress E-mail Default Sender Changer by Aarmaa - aarmaa.ee
  Description: Changes WordPress default sender address.
  Version: 1.0
  Author: Aarmaa
  Author URI: https://aarmaa.ee
  License: GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain: email-sender-changer
*/

// Define constants for email and name
if ( ! defined( 'AARMAA_EMAIL' ) ) {
    define( 'AARMAA_EMAIL', 'no-reply@aarmaa.ee' );
}
if ( ! defined( 'AARMAA_NAME' ) ) {
    define( 'AARMAA_NAME', 'Aarmaa' );
}

// Validate email
function aarmaa_validate_email( $email ) {
    if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
        return $email;
    } else {
        return get_option( 'admin_email' ); // Fallback to admin email if invalid
    }
}

// Change the From address
add_filter( 'wp_mail_from', function ( $original_email_address ) {
    return aarmaa_validate_email( AARMAA_EMAIL );
} );

// Change the From name
add_filter( 'wp_mail_from_name', function ( $original_email_from ) {
    return sanitize_text_field( AARMAA_NAME );
} );
