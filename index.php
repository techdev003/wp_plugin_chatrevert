
<?php
/**
 * The plugin bootstrap file
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
  * Plugin Name: Open Api
  * Plugin URI: https://vibhuti.biz/
  * Description:       ChatGPT, Content Writer, Auto Content Writer, ChatBot, Image Generator, Audio Converter, WooCommerce Product Writer, SEO optimizer, AI Training, Embeddings, Title Suggestions and hundreds of ready to use prompts and forms.
  * Version: 0.1
  * Author: Vibhuti Technology
  * Author URI: https://do-else.com/
**/

require_once __DIR__ . '/variable/global.php'; // define all variable in php
require_once __DIR__ . '/includes/wp-admin-menu.php'; //create menu in wordpress
global $iconsDataArray;
global $promptBaseArray;
function my_plugin_activate(){
  global $table_prefix, $wpdb;
  include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-setting-table.php');
  include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-account-table.php');
  include_once(MY_CUSTOM_PLUGIN_DIR.'includes/wp-content-table.php');
  include_once(MY_CUSTOM_PLUGIN_DIR.'includes/wp-language-table.php');
  include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-user-account-data.php');
  include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-audio-converter-table.php');
	
}
register_activation_hook( __FILE__, 'my_plugin_activate' );
register_deactivation_hook( __FILE__, "my_plugin_deactive" );

// function enqueue_related_pages_scripts_and_styles(){
//   wp_enqueue_style('related-pages-admin-styles',  plugins_url( 'assets/css/style.css' , __FILE__ ));
  
// }
// add_action('admin_enqueue_scripts','enqueue_related_pages_scripts_and_styles');

function add_my_stylesheet() 
{
    wp_enqueue_style( 'style', plugins_url( 'assets/css/style.css' , __FILE__ ));
    wp_enqueue_style( 'style-account',plugins_url( 'assets/css/style-account.css' , __FILE__ ));
}

add_action('admin_print_styles', 'add_my_stylesheet');

// Act on plugin activation


add_action( 'wp_ajax_my_account', 'my_account' );

function my_account() {
        global $wpdb; 
        global $current_user;
        wp_get_current_user();
        $user_id = $current_user->ID;
        $personal_key = $_POST['personal_key'];
        $secert_key =  $_POST['secert_key'];
        $plugin_name = "Open Ai";
        $plan = "Free";

        $tablename = $wpdb->prefix.'account';
        $sql = $wpdb->prepare( "INSERT INTO ".$tablename." (user_id, publisher_key, secert_key,plugin_name,plan) VALUES ( %d, %s,%s,%s,%s  )", $user_id , $personal_key, $secert_key,$plugin_name,$plan);
        $wpdb->query($sql);
        $id = $wpdb->insert_id;

        if($id){
          $message ="User Account Created Successfully";
          $response = [
                'result'  => 'Success',
                'message' => $message,
            ];
        
            http_response_code(200);
            echo json_encode($response); exit;
        }
        else{
          http_response_code(400);
          $message = $message ? $message : "Something went wrong. Please try again later!";
          echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
        }

}


add_action( 'wp_ajax_my_settng_insert', 'my_settng_insert' );

function my_settng_insert() {
          global $wpdb; 

        global $current_user;
        wp_get_current_user();
        $user_id                =   $current_user->ID;
        $model                  =   $_POST['model'];
        $temperature            =   $_POST['temperature'];
        $max_token              =   $_POST['max_token'];
        $api_key                =   $_POST['api_key'];
        $top_p                  =   $_POST['top_p'];
        $best_of                =   $_POST['best_of'];
        $frequency_penalty      =   $_POST['frequency_penalty'];
        $presence_penalty       =   $_POST['presence_penalty'];


        $tablename = $wpdb->prefix.'setting';
        $sql = $wpdb->prepare( "INSERT INTO ".$tablename." (user_id, model,temperature,max_token,top_p,best_of,frequency_penalty,presence_penalty,api_key) VALUES (%d,%s,%s,%s,%s,%s,%s,%s,%s  )", $user_id , $model, $temperature,$max_token,$top_p,$best_of,$frequency_penalty,$presence_penalty,$api_key);
        $wpdb->query($sql);
        $id = $wpdb->insert_id;

        if($id){
          $message ="Setting Account Setup Successfully";
          $response = [
                'result'  => 'Success',
                'message' => $message,
            ];
        
            http_response_code(200);
            echo json_encode($response); exit;
        }
        else{
          http_response_code(400);
          $message = $message ? $message : "Something went wrong. Please try again later!";
          echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
        }

}



add_action( 'wp_ajax_my_settng_update', 'my_settng_update' );

function my_settng_update() {
        global $wpdb;
        global $current_user;
        wp_get_current_user();
        $user_id                =   $current_user->ID;
        $model                  =   $_POST['model'];
        $temperature            =   $_POST['temperature'];
        $max_token              =   $_POST['max_token'];
        $api_key                =   $_POST['api_key'];
        $top_p                  =   $_POST['top_p'];
        $best_of                =   $_POST['best_of'];
        $frequency_penalty      =   $_POST['frequency_penalty'];
        $presence_penalty       =   $_POST['presence_penalty'];

        $tablename = $wpdb->prefix.'setting';
        $sqlUpdateQuery = $wpdb->prepare("UPDATE $tablename SET model='$model',temperature = '$temperature',max_token = '$max_token',api_key='$api_key',top_p='$top_p',frequency_penalty='$frequency_penalty',presence_penalty='$presence_penalty' WHERE user_id=$user_id");
        
        $updateSetting=$wpdb->query($sqlUpdateQuery);
        $message ="Setting Account Update Successfully";
        $response = [
          'result'  => 'Success',
          'message' => $message,
        ];
      
        http_response_code(200);
        echo json_encode($response); exit;

}


      add_action( 'wp_ajax_my_contact_email', 'my_contact_email' );

      function my_contact_email() {
              global $wpdb;
              global $current_user;
              wp_get_current_user();
              $user_name                  =   $_POST['user_name'];
              $user_email                 =   $_POST['user_email'];
              $subject                    =   $_POST['subject'];
              $message_area               =   $_POST['message_area'];
              $mailResult = false;
              $headers = "From: My Name $user_email" . "\r\n";
              $mailResult = wp_mail('adminvibhuti@yopmail.com', $subject, $message_area , $headers);
                if($mailResult){
                  $message ="Mail send sccesfully.";
                  $response = [
                    'result'  => 'Success',
                    'message' => $message,
                  ];
                
                  http_response_code(200);
                  echo json_encode($response); exit;
                }
                else{
                  http_response_code(400);
                  $message = $message ? $message : "Something went wrong. Please try again later!";
                  echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
                }
      }


      add_action( 'wp_ajax_my_content_post_page', 'my_content_post_page' );

      function my_content_post_page() {
              global $wpdb;
              global $current_user;
              wp_get_current_user();
              $user_id = $current_user->ID;                  
              $post_page_title   = $_POST['post_page_title'];           
              $post_page_content = $_POST['post_page_content'];                                
              $attrValue = $_POST['attrValue'];
              $wordpress_post = array(
                'post_title' => $post_page_title,
                'post_content' => $post_page_content,
                'post_status' => 'publish',
                'post_author' =>  $user_id,
                'post_type' => $attrValue
                );
                 
                wp_insert_post( $wordpress_post );
                  $message ="Post Publish Succesfully.";
                  $response = [
                    'result'  => 'Success',
                    'message' => $message,
                  ];
                
                  http_response_code(200);
                  echo json_encode($response); exit;
              
                
      }

      add_action( 'wp_ajax_my_content_data', 'my_content_data' );
      function my_content_data(){

        global $wpdb;
        global $current_user;
        wp_get_current_user();
        $user_id = $current_user->ID;
        $title = $_POST['title']; 
        $model = $_POST['model'];
        $token = $_POST['token'];
        $author=  $current_user->user_login;
        $type = $_POST['type'];
        $date = date('Y-m-d');

        $tablename = $wpdb->prefix.'content';
        $sql = $wpdb->prepare( "INSERT INTO ".$tablename." (user_id,title,date,token,model,author,type) VALUES ( %d,%s,%s,%s,%s,%s,%s)", $user_id,$title,$date,$token,$model,$author,$type);
        $wpdb->query($sql);
        $id = $wpdb->insert_id;

        if($id){
          $message ="Content Inserted Succesfully.";
          $response = [
                'result'  => 'Success',
                'message' => $message,
            ];
        
            http_response_code(200);
            echo json_encode($response); exit;
        }
        else{
          http_response_code(400);
          $message = $message ? $message : "Something went wrong. Please try again later!";
          echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
        }

      }


add_action( 'wp_ajax_my_save_content_data', 'my_save_content_data' );
      function my_save_content_data(){
               $new = array(
                'post_title' => $_POST['title'],
                'post_content' => $_POST['content_text'],
                'post_status' => 'publish'
            );

            $post_id = wp_insert_post( $new );

            if( $post_id ){
    echo "Post successfully published!";
} else {
    echo "Something went wrong, try again.";
}

      }



      add_action( 'wp_ajax_my_content_data_get', 'my_content_data_get' );

      function my_content_data_get(){
        $user_id = $current_user->ID;
        global $wpdb;
        global $current_user;
        wp_get_current_user();
        $user_id = $current_user->ID;
        $type = $_POST['type'];
        $tablename = $wpdb->prefix.'content';
        $userData = $wpdb->get_results( "SELECT `id`,`title`,`date`,`token`,`model`,`author` FROM $tablename where (user_id=$user_id AND type='$type')" );

        if($userData){
          $message ="Content get Successfully.";
          $response = [
                'result'  => 'Success',
                'message' => $message,
            'data' => $userData
            ];
        
            http_response_code(200);
            echo json_encode($response); exit;
        }
        else{
          http_response_code(400);
          $message = $message ? $message : "Something went wrong. Please try again later!";
          echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
        }

      }


      add_action( 'wp_ajax_my_language_content', 'my_language_content' );

      function my_language_content(){
        global $wpdb;
        global $current_user;
        wp_get_current_user();
        $user_id = $current_user->ID;
        $language = $_POST['language']; 
        $text = $_POST['text'];
        $translation = $_POST['translation'];
        $token = $_POST['token'];
        $model = $_POST['model'];
        $author=  $current_user->user_login;
        $date = date('Y-m-d');

        $tablename = $wpdb->prefix.'language';
        $sql = $wpdb->prepare( "INSERT INTO ".$tablename." (user_id,text,language,translation,date,token,model,author) VALUES ( %d,%s,%s,%s,%s,%s,%s,%s)", $user_id,$text,$language,$translation,$date,$token,$model,$author);
        $wpdb->query($sql);
        $id = $wpdb->insert_id;

        if($id){
          $message ="language Log Saved Succesfully.";
          $response = [
                'result'  => 'Success',
                'message' => $message,
            ];
        
            http_response_code(200);
            echo json_encode($response); exit;
        }
        else{
          http_response_code(400);
          $message = $message ? $message : "Something went wrong. Please try again later!";
          echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
        }
      }


    add_action( 'wp_ajax_my_language_data_get', 'my_language_data_get' );

      function my_language_data_get(){
        $user_id = $current_user->ID;
        global $wpdb;
        global $current_user;
        wp_get_current_user();
        $user_id = $current_user->ID;
        $tablename = $wpdb->prefix.'language';
        $userData = $wpdb->get_results( "SELECT `id`,`language`,`text`,`translation`,`token`,`model`,`author`,`date` FROM $tablename where user_id=$user_id" );

        if($userData){
          $message ="language Data get successfully.";
          $response = [
                'result'  => 'Success',
                'message' => $message,
            'data' => $userData
            ];
            http_response_code(200);
            echo json_encode($response); exit;
        }
        else{
          http_response_code(400);
          $message = $message ? $message : "Something went wrong. Please try again later!";
          echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
        }

      }

      function fiu_upload_file(){

                  $upload_dir = wp_upload_dir();
        
                  if ( ! empty( $upload_dir['basedir'] ) ) {
                      $user_dirname = $upload_dir['basedir'].'/transcription-translation';
                      if ( ! file_exists( $user_dirname ) ) {
                          wp_mkdir_p( $user_dirname );
                      }
                      global $current_user;
                      global $wpdb;
                      wp_get_current_user();
                      $user_id = $current_user->ID;
                      $temp = explode(".", $_FILES["file"]["name"]);
                      $newfilename = $user_id.round(microtime(true)) . '.' . end($temp);
                      $filename = wp_unique_filename( $user_dirname, $_FILES['file']['name'] );
                      $uploadFileInfo = move_uploaded_file($_FILES['file']['tmp_name'], $user_dirname .'/'. $newfilename);
                      $uploadDir = $upload_dir['baseurl'].'/transcription-translation/'.$newfilename;
                      if($uploadFileInfo){
                            $message ="Image Upload successfully.";
                            $response = [
                              'result'  => 'Success',
                              'message' => $message,
                              'data' => $uploadDir
                            ];
                            http_response_code(200);
                            echo json_encode($response); exit;

                      }
                      else{
                        http_response_code(400);
                        $message = $message ? $message : "Something went wrong. Please try again later!";
                        echo json_encode(['result' => 'Failure', 'message' => $message]); exit;

                      }
                       
                      // save into database $upload_dir['baseurl'].'/product-images/'.$filename;
                  }
              
         

    }
    
    add_action('wp_ajax_fiu_upload_file', 'fiu_upload_file');
    add_action('wp_ajax_nopriv_fiu_upload_file', 'fiu_upload_file');



    function my_audio_post_page() {
      global $wpdb;
      global $current_user;
      wp_get_current_user();
      $user_id = $current_user->ID;                  
      $post_page_title   = $_POST['post_page_title'];           
      $post_page_content = $_POST['post_page_content'];                                
      $attrValue = $_POST['attrValue'];
      $category    = $_POST['category'];
      $author = $_POST['author'];
      $status = $_POST['status'];
      $wordpress_post = array(
      'post_title' => $post_page_title,
      'post_content' => $post_page_content,
      'post_status' => 'publish',
      'post_author' =>  $author,
      'post_type' => $attrValue,
      'post_category'=>$category,
      'status'=>$status

      );
        
      wp_insert_post( $wordpress_post );
         $message ="Post Publish Succesfully.";
         $response = [
          'result'  => 'Success',
          'message' => $message,
         ];
       
         http_response_code(200);
         echo json_encode($response); exit;
     
       
}

add_action( 'wp_ajax_my_audio_post_page', 'my_audio_post_page' );


add_action( 'wp_ajax_my_log_audio_data', 'my_log_audio_data' );

function my_log_audio_data(){
  global $wpdb;
  global $current_user;
  wp_get_current_user();
  $user_id = $current_user->ID;
  $title =$_POST['title'];
  $purpose=$_POST['purpose'];
  $category=$_POST['category'];
  $author=$_POST['author'];
  $status=$_POST['status'];
  $date = date('Y-m-d');

  $tablename = $wpdb->prefix.'audio_converter';
  $sql = $wpdb->prepare( "INSERT INTO ".$tablename." (user_id,title,date,category,author,status,purpose) VALUES ( %d,%s,%s,%s,%s,%s,%s)", $user_id,$title,$date,$category,$author,$status,$purpose);
  $wpdb->query($sql);
  $id = $wpdb->insert_id;

  if($id){
    $message ="Log Saved Succesfully.";
    $response = [
      'result'  => 'Success',
      'message' => $message,
    ];
  
    http_response_code(200);
    echo json_encode($response); exit;
  }
  else{
    http_response_code(400);
    $message = $message ? $message : "Something went wrong. Please try again later!";
    echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
  }
}

add_action( 'wp_ajax_my_audio_log_data_get', 'my_audio_log_data_get' );


function my_audio_log_data_get(){

  $user_id = $current_user->ID;
  global $wpdb;
  global $current_user;
  wp_get_current_user();
  $user_id = $current_user->ID;
  $tablename = $wpdb->prefix.'audio_converter';
  $userData = $wpdb->get_results( "SELECT `id`,`title`,`purpose`,`date`,`category`,`author`,`status` FROM $tablename where user_id=$user_id" );

  if($userData){
    $message ="language Data get successfully.";
    $response = [
      'result'  => 'Success',
      'message' => $message,
      'data' => $userData
    ];
    http_response_code(200);
    echo json_encode($response); exit;
  }
  else{
    http_response_code(400);
    $message = $message ? $message : "Something went wrong. Please try again later!";
    echo json_encode(['result' => 'Failure', 'message' => $message]); exit;
  }

}

add_action('wp_ajax_my_prompt_content','my_prompt_content');
function my_prompt_content(){
  include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
  $responseData='';
  $promptBaseIncrement = 1;
  $promptBaseArray  = $_POST['promptData'];  
  $responseData.='<div class="panel-right-side-prompt">';
  $responseData .= '<div class="prompt-ai-wrap"><input type="text" class="text-generator-search" id="search"><button id="search-prompt" onclick="searchPrompt()">Search</button></div>';
  $responseData.='<div class="panel-right-side-prompt-container">';
  foreach($promptBaseArray as $key=>$promptBaseData){
      $responseData.= "<a href='javascript:void(0)' class='promptBaseId' attrId='$promptBaseData[id]'>";
          categoryData();      
          $color  = $promptBaseData['color'];
          $responseData.= '<div class="box-media-prompt">';
          $responseData.="<div class='box-media-image' style=background-color:$color>";

          $dom = new \DOMDocument();

          $svgIcon =$iconsDataArray[$promptBaseData['icon']];
          $dom->loadXML($svgIcon);
          $node = $dom->getElementsByTagName('svg')[0];
          $node->setAttribute('fill', "#fff");
          $iconImage =  $dom->saveXML();
          $responseData.=$iconImage;
          $responseData.= '</div>';
          $responseData.='<div class="box-media-content">';
          $responseData.= '<p class="title">';
          $responseData.= $promptBaseData['title'];
          $responseData.= '</p>';
          $responseData.= '<p class="description">';
          $responseData.= $promptBaseData['description'];
          $responseData.='</p>';
          $responseData.='</div>';
          $responseData.='</div>';
          $responseData.='</a>';
  }
  $responseData.='</div>';
  $responseData.='</div>';
  echo $responseData;
  exit;

}

add_action('wp_ajax_my_prompt_content_check_category','my_prompt_content_check_category');
function my_prompt_content_check_category(){
  include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
  $categoryValuesArray=$_POST['categoryValue'];
  $responseData='';
  $promptBaseIncrement = 1;
  $responseData.='<div class="panel-right-side-prompt">';
  $responseData .= '<input type="text" class="text-generator-search" id="search-value"><button id="search-prompt">Search</button>';
  $responseData.='<div class="panel-right-side-prompt-container">';
  foreach($promptBaseArray as $key=>$promptBaseData){

    $categortString = $promptBaseData['category'];

    $categoryArray = explode(',',$categortString);
    if(array_intersect($categoryArray, $categoryValuesArray)) {
          $responseData.= '<div class="box-media-prompt">';
          $responseData.='<div class="box-media-image">';
          $responseData.=$iconsDataArray[$promptBaseData['icon']];
          $responseData.= '</div>';
          $responseData.='<div class="box-media-content">';
          $responseData.= '<p class="title">';
          $responseData.= $promptBaseData['title'];
          $responseData.= '</p>';
          $responseData.= '<p class="description">';
          $responseData.= $promptBaseData['description'];
          $responseData.=$promptBaseData['category'];
          $responseData.='</p>';
          $responseData.='</div>';
          $responseData.='</div>';
 // echo $promptBaseIncrement;
  }
}
  $responseData.='</div>';
  $responseData.='</div>';
  echo $responseData;
  exit;



}
function categoryData(){
  include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');

}


function remove_cornerstone_menus() {
  remove_action('init', 'ai');
}

add_action('init', 'remove_cornerstone_menus');



function check_subscription() {
	global $wpdb;
	global $current_user;
	wp_get_current_user();
	$user_email = $current_user->user_email;

	// Set up the API request
	$login_api_url = 'https://api.aiharness.io/api/login';

	$login_api_request_args = array(
		'headers' => array(
			'Accept' => 'application/json',
			'userType' => 'shopify',
			'X-CSRF-TOKEN' => '',
		),
		'body' => array(
			'email' => $user_email
		)
	);

	// Send the API request
	$response = wp_remote_post($login_api_url, $login_api_request_args);

	$body = wp_remote_retrieve_body($response);
	$data = json_decode($body, true);
	
	$secret_key1 = $data['data']['secert_key'];
	
    // Set up the API request
    $api_url = 'https://api.aiharness.io/api/check-subscription';
    
    $request_args = array(
        'headers' => array(
            'Accept' => 'application/json',
            'secertkey' => $secret_key1,
            'userType' => 'shopify',
            'X-CSRF-TOKEN' => '',
        ),
    );

    // Send the API request
    $response = wp_remote_post($api_url, $request_args);
	
    // Check if the request was successful
    if (is_wp_error($response)) {
        // Error handling if the API request fails
        return false; // Subscription check failed
    }

    // Parse the API response
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Check the subscription status in the API response
    if ($data && isset($data['message']['status'])) {
        return $data['message']['status']; // Return the status value
    }
	
    return false; // Subscription status not found
}

// Assuming you already have the 'check_subscription' function defined

add_action('admin_menu', 'update_image_generator_menu');

function update_image_generator_menu() {
	
    $subscription_status = check_subscription();

    // Find the "Image Generator" menu item
    $menu_file_path = plugin_dir_path(__FILE__) . 'json/menu.json'; // Replace with the actual path to your menu JSON file
    $menu_json = file_get_contents($menu_file_path);
    $menu_items = json_decode($menu_json, true);

    $image_generator_menu_item = array(
        "page_title" => "Image Generator",
        "menu_title" => "Image Generator",
        "capability" => "manage_options",
        "function" => "image_generator_ui",
        "icon_url" => "",
        "menu_slug" => "image_generator_ui",
        "parent" => "0",
        "position" => null
    );

    $menu_item_added = false; // Flag to track if the menu item has been added

    foreach ($menu_items as $menu_item) {
        if ($menu_item['menu_slug'] === 'image_generator_ui') {
            $menu_item_added = true;
            break;
        }
    }

    if ($subscription_status == 1 && !$menu_item_added) {
        // Add the "Image Generator" menu item to the menu items array
        $menu_items[] = $image_generator_menu_item;

        // Convert the menu items back to JSON
        $updated_menu_json = json_encode($menu_items);

        // Save the updated menu JSON back to the file
        file_put_contents($menu_file_path, $updated_menu_json);
    } elseif ($subscription_status != 1 && $menu_item_added) {
        // Remove the "Image Generator" menu item from the array
        foreach ($menu_items as $key => $menu_item) {
            if ($menu_item['menu_slug'] === 'image_generator_ui') {
                unset($menu_items[$key]);
                break;
            }
        }

        // Re-index the menu items
        $menu_items = array_values($menu_items);

        // Convert the menu items back to JSON
        $updated_menu_json = json_encode($menu_items);

        // Save the updated menu JSON back to the file
        file_put_contents($menu_file_path, $updated_menu_json);
    }
}





?>