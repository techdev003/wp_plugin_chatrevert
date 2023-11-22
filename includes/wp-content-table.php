<?php
$contentTable = $table_prefix . 'content';

// Create Customer Table if not exist
  if( $wpdb->get_var( "show tables like '$contentTable'" ) != $contentTable ) {

    // Query - Create Table
    $sql = "CREATE TABLE `$contentTable` (";
    $sql .= " `id` int(11) NOT NULL auto_increment,";
    $sql .= " `user_id` int(11),";
    $sql .= " `title` varchar(500) NOT NULL,";
    $sql .= " `date` DATE NOT NULL,";
    $sql .= " `token` varchar(500) NOT NULL,";
    $sql .= " `model` varchar(500) NOT NULL,";
    $sql .= " `author` varchar(500) NOT NULL,";
    $sql .= " `type`  varchar(500) NOT NULL,";
    $sql .= " `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,";
    $sql .= " `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,";
    $sql .= " `deleted_at` TIMESTAMP  NULL,";
    $sql .= " PRIMARY KEY `id` (`id`) ";
    $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
    // Include Upgrade Script
    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    // Create Table
    dbDelta( $sql );
}

?>