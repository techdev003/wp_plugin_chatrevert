<?php
function menu_generator() {
    $menuJson = file_get_contents(MY_CUSTOM_PLUGIN_DIR.'json/menu.json');
    $arrayDataJson = json_decode($menuJson, true);
    foreach($arrayDataJson as $key=>$menuData){
        if($menuData['parent']==1){
            
            $menu_parent_slug  = $menuData['menu_parent_slug'];   
            $page_title =  $menuData['page_title']; 
            $menu_title =  $menuData['menu_title'];   
            $capability =  $menuData['capability'];  
            $function   =  $menuData['function'];   
            $icon_url   =  $menuData['icon_url'];     
            $functionArray[] = $menuData['function'];
            $position   = $menuData['position'];
            add_menu_page( $page_title,$menu_title,$capability,$menu_parent_slug,$function,$icon_url,$position );
            
        }
        elseif($menuData['parent']==0){
            $page_title = $menuData['page_title'];  
            $menu_title = $menuData['menu_title'];   
            $capability = $menuData['capability'];       
            $function   = $menuData['function'];    
            $icon_url   = $menuData['icon_url'];    
            $menu_slug  = $menuData['menu_slug']; 
            $functionArray[] = $menuData['function'];
            $position = $menuData['position'];
            add_submenu_page($menu_parent_slug,$page_title,$menu_title,$capability,$menu_slug,$function,$position);

        }     
    }
       require_once __DIR__ . '/wp-menu-function.php';
    }
    add_action('admin_menu', 'menu_generator');

    

    

    
    
    

    




    

    
 



?>