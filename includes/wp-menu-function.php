<?php
if(isset( $_GET['page']))
{
   for($i=0;$i<count($functionArray);$i++){
      if($functionArray[$i] === $_GET['page']){
       require_once MY_CUSTOM_PLUGIN_DIR . 'functionality/'.$_GET['page'].'.php';     
      }
   }

}

