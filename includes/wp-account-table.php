<?php
$acountTable = $table_prefix . 'account';

// Create Customer Table if not exist
  if( $wpdb->get_var( "show tables like '$acountTable'" ) != $acountTable ) {

    // Query - Create Table
    $sql = "CREATE TABLE `$acountTable` (";
    $sql .= " `id` int(11) NOT NULL auto_increment,";
    $sql .= " `user_id` int(11),";
    $sql .= " `publisher_key` varchar(500) NOT NULL,";
    $sql .= " `secert_key` varchar(500) NOT NULL,";
    $sql .= " `plugin_name` varchar(500) NOT NULL,";
    $sql .= " `plan` varchar(500) NOT NULL,";
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