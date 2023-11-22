<?php
global $current_user;
global $wpdb;
wp_get_current_user();
$user_id = $current_user->ID;
$settingData=$wpdb->get_results("SELECT * FROM `wp_setting` where user_id=$user_id",ARRAY_A);
$singleSettingArray = $settingData[0];
$modelArray = array('text-davinci-003','gpt-3.5-turbo','text-curie-001','text-babbage-001','text-ada-001');
?>
<div class="panel-area">
                    <div class="panel-heading">
                        <h3>Settings</h3>
                    </div>
                    <div class="panel-area-content"> 
                        <div class="panel-area-label-account-label-details">
                            <div class="panel-area-label-account-label">
                                    <label for="model"> 
                                        Model:
                                    </label>
                            </div>
                            <div class="panel-area-label-account-info">
                                <select id="model"  class="generate-input" >
                                    <option value="">Select One</option>
                                    <?php
                                    for($i=0;$i<count($modelArray);$i++ ){
                                        ?>
                                        <?php 
                                        if($modelArray[$i] === $singleSettingArray['model']){
                                            ?>
                                            <option value="<?php echo $modelArray[$i]?>" selected><?php echo $modelArray[$i]?></option>
                                            <?php
                                        }
                                        else{
                                            ?>
                                             <option value="<?php echo  $modelArray[$i]?>"><?php echo $modelArray[$i]?></option>
                                                                                    
                                    <?php
                                        }

                                    }
                                    ?>
                                </select>
                                <span id="model-input-error"></span>
                            </div>
                        </div>
                    </div>
                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="temperature"> 
                                    Temperature:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                                    <input type="text" class="generate-input" value="<?php if(isset($singleSettingArray['temperature'])) echo $singleSettingArray['temperature']?>" id="temperature" placeholder="Please Enter Temperature between 0 to 1"/>
                                    <span id="temperature-error"></span>
                        </div>
                    </div>
                 </div> 
                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="max-token"> 
                                        Max Tokens:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                                    <input type="text" class="generate-input" value="<?php if(isset($singleSettingArray['max_token'])) echo $singleSettingArray['max_token']?>" id="max-token" placeholder= "Please enter max-token" value="1500"/>
                                    <span id="max-token-error"></span> 
                        </div>
                    </div>
                 </div>
                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="api-key"> 
                                        Api Key:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                                    <input type="text" class="generate-input" id="api-key" value="<?php if(isset($singleSettingArray['api_key'])) echo $singleSettingArray['api_key']?>" placeholder="Enter Api Key"/>
                                    <span id="api-key-error"></span>
                        </div>
                    </div>
                 </div>
                 <div class="panel-area-content"> 
                    <div class="button-box-generate-image">
                    <?php 
                            global $current_user;
                            global $wpdb;
                            wp_get_current_user();
                            $user_id = $current_user->ID;


                            $count = $wpdb->get_var("SELECT COUNT(*) FROM wp_setting WHERE user_id = $user_id");
                            if($count == 0){
                                    $settingAttr = 'my_settng_insert';
                            }
                            else{
                                $settingAttr = 'my_settng_update';
                            }
                                ?>
                             <button id="setting" attrSetting=<?php echo $settingAttr;?> class="generate-button">Setting</button>
                    </div>
                </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#setting").click(function(){
        var actionUrl = $(this).attr('attrSetting');
        // alert(actionUrl);
        // return false;
        
        var  model = $("#model").val();
        var  temperature = $("#temperature").val();
        var  max_token = $("#max-token").val();
        var  api_key = $("#api-key").val(); 
        if(max_token>4096){
            alert("Maximum token cannot 4096");
        }
        if(model == ''){
            $("#model-input-error").text('Please select model.');
            return false;
        }

        if(temperature == ''){
            $("#generate-input-error").text('Temperature can\'t be empty.');
            return false;
        }
        if(temperature > 1 ||temperature < 0  ){
            $("#temperature-error").text('Temperature can\'t be greater then 1 or less the 0.');
            return false;
        }

        if(max_token == '' ){
            $("#max-token-error").text('Please select model.');
            return false;
        }

        if(api_key == ''){
            $("#api-key-error").text('Please enter api key.');
            return false;
        }


        var data = {
                        'action': actionUrl,
                        'model': model,
                        'temperature':temperature,
                        'max_token':max_token,
                        'api_key':api_key
                    };

                    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                    location.reload();
                }
                else if(responseJsonData.result=='Failure')
            {
                        alert("Something Went Wrong!!");
            }   
            });
  

    });
  })

</script>