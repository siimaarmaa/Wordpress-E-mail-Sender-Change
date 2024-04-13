<?php
/*
  Plugin Name: WordPress E-mail default sender changer by Aarmaa - aarmaa.ee
  Description: Changes Wordpress default sender address.
*/

// Please edit the address and name below.
// Change the From address.
add_filter( 'wp_mail_from', function ( $original_email_address ) {
    return 'no-reply@aarmaa.ee';
} );

// Change the From name.
add_filter( 'wp_mail_from_name', function ( $original_email_from ) {
    return 'Aarmaa';
} );
