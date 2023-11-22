<?php
// Setting Table
	  $contentWriterTable = $table_prefix . 'ContentWriterTable ';

	// Create Setting Table if not exist
    if( $wpdb->get_var( "show tables like '$contentWriterTable'" ) != $contentWriterTable ) {

      // Query - Create Table
      $sql = "CREATE TABLE `$contentWriterTable` (";
      $sql .= " `id` int(11) NOT NULL auto_increment, ";
      $sql .= " `user_id` int(11), ";
      $sql .= " `Language` varchar(500) NOT NULL,";
      $sql .= " `style` varchar(500) NOT NULL,";
      $sql .= " `tone` varchar(500) NOT NULL,";
      $sql .= " `heading` varchar(500) NOT NULL,";
      $sql .= " `heading_tag` varchar(500) NOT NULL,";
      $sql .= " `outline_editor` varchar(500) NOT NULL,";
      $sql .= " `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,";
      $sql .= " `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,";
      $sql .= " `deleted_at` TIMESTAMP  NULL,";
      $sql .= " PRIMARY KEY `id` (`id`) ";
      $sql .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";

      require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    
      dbDelta( $sql );
    }
?>