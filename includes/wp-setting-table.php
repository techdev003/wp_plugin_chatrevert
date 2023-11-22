<?php
// Setting Table
	  $setttingTable = $table_prefix . 'setting';

	// Create Setting Table if not exist
    if( $wpdb->get_var( "show tables like '$setttingTable'" ) != $setttingTable ) {

      // Query - Create Table
      $sql = "CREATE TABLE `$setttingTable` (";
      $sql .= " `id` int(11) NOT NULL auto_increment, ";
      $sql .= " `user_id` int(11), ";
      $sql .= " `model` varchar(500) NOT NULL,";
      $sql .= " `temperature` varchar(500) NOT NULL,";
      $sql .= " `max_token` varchar(500) NOT NULL,";
      $sql .= " `top_p` varchar(500) NOT NULL,";
      $sql .= " `best_of` varchar(500) NOT NULL,";
      $sql .= " `frequency_penalty` varchar(500) NOT NULL,";
      $sql .= " `presence_penalty` varchar(500) NOT NULL,";
      $sql .= " `api_key` varchar(500) NOT NULL,";
      $sql .= " `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,";
      $sql .= " `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,";
      $sql .= " `deleted_at` TIMESTAMP  NULL,";
      $sql .= " PRIMARY KEY `customer_id` (`id`) ";
      $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

      require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    
      dbDelta( $sql );
    }
?>  
