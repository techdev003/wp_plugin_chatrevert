<?php
function prompt_base_ui(){
	$categoaryArray = array();
	foreach($promptBaseArray as $key=>$promptBaseDataCategory){
			$explodepromptBaseDataCategory = explode(',',$promptBaseDataCategory['category']);
			for($i=0;$i<count($explodepromptBaseDataCategory);$i++){
				$categoaryArray[] =$explodepromptBaseDataCategory[$i];
		}
	
}
$categoryArrayUnique = array_unique($categoaryArray);
	    include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-account-logo.php');
    	include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-prompt-base-ui.php');
		include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');



}


?>