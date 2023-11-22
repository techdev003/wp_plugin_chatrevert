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
    $sql=$wpdb->get_results("SELECT * FROM `wp_users` JOIN `wp_account` ON wp_account.`user_id`=wp_users.`ID` where user_id=$user_id");
    
?>
                    <div class="panel-heading">
                        <h3>Account Details</h3>
                    </div>
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
                                <?php echo $sql[0]->secert_key;?>
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
                                     <?php echo $sql[0]->publisher_key;?>
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
                        <?php echo $sql[0]->plugin_name;?>
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
                        <?php echo $sql[0]->plan;?>
                        </div>
                    </div>
                 </div>  

<?php
}?>

</div>
<script>
    function accountActivate(){

        var email ="<?php  echo  $current_user->user_email;?>";
            $.ajax({
                  url: "https://api.aiharness.io/api/register",
                  type: 'POST',
                  dataType:'json',
                  data: {'email': email}
                  }).done(function(response){
                        if(response.result=='Success'){
                               var personal_key = response.data.personal_key;
                               var secert_key = response.data.secert_key;
                                    var data = {
                                        'action': 'my_account',
                                        'personal_key': personal_key,
                                        'secert_key':secert_key
                                    };

                                                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                                                jQuery.post(ajaxurl, data, function(response) {
                                                    var responseJsonData =jQuery.parseJSON(response);
                                                    console.log(responseJsonData.result);
                                                        if(responseJsonData.result == 'Success'){
                                                            location.reload();
                                                        }
                                    });
                              }
                              else if(responseJsonData.result=='Failure'){
                                          alert("Something Went Wrong!!")
                              }      
                  
                  }).fail(function(jqXHR, textStatus, errorThrown){
                        alert('FAILED! ERROR: ' + errorThrown);
                  });
    }
 </script>   