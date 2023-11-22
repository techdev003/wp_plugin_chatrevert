<div class="panel-area">
<?php 
global $current_user;
global $wpdb;
wp_get_current_user();
$user_id = $current_user->ID;


$count = $wpdb->get_var("SELECT COUNT(*) FROM wp_account WHERE user_id = $user_id");
if($count == 0){
    ?>
        <div class="panel-heading">
            <h3>Account Activate</h3>
        </div>
        <div class="button-box-generate-image">
            <button onclick="accountActivate()" class="generate-button">Account Activate</button> 
        </div>
<?php
}
else{


?>
                    <div class="panel-heading">
                        <h3>Account Details</h3>
                    </div>
                    <?php

                    ?>
                    <div class="panel-area-content"> 
                        <div class="panel-area-label-account-label-details">
                            <div class="panel-area-label-account-label">
                                    <label for="name"> 
                                        User Id:
                                    </label>
                            </div>
                            <div class="panel-area-label-account-info">
                                <?php echo $current_user->ID;?>
                            </div>
                        </div>
                    </div>
                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    Name:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                            <?php echo $current_user->user_login;?>
                        </div>
                    </div>
                 </div> 
                  


                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    Email:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                            <?php echo $current_user->user_email;?>
                        </div>
                    </div>
                 </div>
                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    Secret Key:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                                sk_oxJqR[>pG&A}I&S$C[T~OWlp9QaHQ
                        </div>
                    </div>
                 </div>
                                  <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    <?php 
                                    ?>
                                    Publisher Key:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                           
                        </div>
                    </div>
                 </div>
                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    <?php 
                                    ?>
                                    Plugin Name:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                            Open Ai
                        </div>
                    </div>
                 </div>

                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    Plan:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                            Free
                        </div>
                    </div>
                 </div>  

<?php
}?>

</div>
<script>
    function accountActivate(){
        var ajaxurl = '<?php echo admin_url("admin-ajax.php")?>';
        $.ajax({

                url: ajaxurl,

                type: 'POST',

                data: {

                post_details : 'test',

                action: 'save_post_details_form' 
                },

                error: function(error) {
                console.log(error);
                alert("Insert Failed");

                },

                success: function(response) {

                alert("Insert Success" + response);
                }

                });
        // var email ="<?php  echo  $current_user->user_email;?>";
        // jQuery.ajax({
        //     url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
        //     action: 'ajaxsavePrice', 
        //     method: 'POST',
        //     dataType: 'json',                                        
        //     data: {'test': 'ok'},
        //     success: function(res){
        //         console.log('error: ', res);
        //         // $('#prices_form').hide();
        //     },
        //     error: function(error) {
        //         console.warn('error: ', error);
        //     }
        // });
        // return false;
        //     $.ajax({
        //           url: "http://localhost/openApi/api/register",
        //           type: 'POST',
        //           dataType:'json',
        //           data: {'email': email}
        //           }).done(function(response){
        //                 if(response.result=='Success'){
        //                        var personal_key = response.data.personal_key;
        //                        var secert_key = response.data.secert_key;
        //                             var data = {                                         
        //                                 personal_key: personal_key,
        //                                 secert_key:secert_key
        //                             };

        //                             // jQuery.ajax({
        //                             //     url: '<?php echo admin_url( 'admin-ajax.php' ); ?>',
        //                             //     action: 'ajaxsavePrice', 
        //                             //     method: 'POST',
        //                             //     dataType: 'json',                                        
        //                             //     data: 'test',
        //                             //     success: function(res){
        //                             //         console.log('error: ', res);
        //                             //         // $('#prices_form').hide();
        //                             //     },
        //                             //     error: function(error) {
        //                             //         console.warn('error: ', error);
        //                             //     }
        //                             // });

        //                       }
        //                       else if(response.result=='Failure'){
        //                                   alert("Something Went Wrong!!")
        //                       }      
                  
        //           }).fail(function(jqXHR, textStatus, errorThrown){
        //                 alert('FAILED! ERROR: ' + errorThrown);
        //           });
    }
 </script>   

 <?php
add_action( 'wp_ajax_nopriv_ajaxsavePrice', 'ajaxsavePriceFunction' );
add_action( 'wp_ajax_ajaxsavePrice', 'ajaxsavePriceFunction' );
function ajaxsavePriceFunction(){
    echo '<pre>';
    print_r($_POST);
    die();
    // $conn = new mysqli($servername, $username, $password, $dbname);
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // $location1 = $_POST['location1'];
    // $location2 = $_POST['location2'];
    // $price = $_POST['price'];

    // $result = $conn->query("SELECT * FROM prices WHERE location1 = '$location1' AND location2='$location2' OR location1 = '$location2' AND location2='$location1'");
    // $row_count = $result->num_rows;
    // if ($row_count >= 1) {
    //     echo 'That locations are already inserted. Do you want to update price?';
    // } else {
    //     $query = "INSERT INTO prices (location1, location2, price) VALUES(?, ?, ?)";
    //     $statement = $conn->prepare($query);

    //     //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    //     $statement->bind_param('ssi', $location1, $location2, $price);

    //     if ($statement->execute()) {
    //         print 'Success! ID of last inserted record is : ' . $statement->insert_id . '<br />';
    //     } else {
    //         die('Error : (' . $conn->errno . ') ' . $conn->error);
    //     }
    //     $statement->close();
  //  }

}

// function ajax_savePrice_init(){

// wp_register_script('ajax-savePrice-script', get_template_directory_uri() . '/ajax-savePrice-script.js', array('jquery') ); 
// wp_enqueue_script('ajax-savePrice-script');

// wp_localize_script( 'ajax-savePrice-script', 'ajax_savePrice_object', array( 
// 'ajaxurl' => admin_url( 'admin-ajax.php' ),
// 'redirecturl' => home_url(),
// 'loadingmessage' => __('Sending data, please wait...')
// ));
// }


// add_action('init', 'ajax_savePrice_init');

// Enable the user with no privileges to run ajax_login() in AJAX


?>