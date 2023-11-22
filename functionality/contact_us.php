<?php
function contact_us(){
    ?>
    <div class="warpper-contact-us">
        <div class="panels">
                    <div class="panel-heading-contact">
                        <h3>Contact Us</h3>
                    </div>
                    <?php
                                global $current_user;
                                wp_get_current_user();
                    ?>
                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    User Name:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                            <input type="text" class="generate-input-text-contact" id="user_name" value="<?php echo $current_user->user_login;?>">
                            <span id ="user-name-error"></span>
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
                            <input type="text" class="generate-input-text-contact" id="user_email" value="<?php echo $current_user->user_email;?>">
                            <span id ="email-error"></span>
                        </div>
                    </div>
                 </div>

                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    Subject:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                            <input type="text" class="generate-input-text-contact" value="" id="subject">
                            <span id="subject-error"></span>
                        </div>
                    </div>
                 </div>
                
                 <div class="panel-area-content"> 
                    <div class="panel-area-label-account-label-details">
                        <div class="panel-area-label-account-label">
                                <label for="name"> 
                                    Message:
                                </label>
                        </div>
                        <div class="panel-area-label-account-info">
                            <textarea class="generate-input-text-contact" id="message-area"></textarea>
                            <span id="message-area-error"></span>
                        </div>
                    </div>
                 </div>
                 <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                      </div>
                      <div class="panel-area-label-button">
                          <button id="contact" class="generate-button">Submit</button>
                      </div>
                 </div>
                 




  
            </div>
            </div>

<?php

         
}



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#contact").click(function(){
    
        var     user_name       =   $("#user_name").val();
        var     user_email      =   $("#user_email").val();
        var     subject         =   $("#subject").val();
        var     message_area    =   $("#message-area").val();  
    
        if(user_name == ''){
            $("#user-name-error").text('User name not emapty.');
            return false;
        }

        if(user_email == ''){
            $("#email-error").text('Your email not empty.');
        }

        if(subject == ''){
            $("#subject-error").text('Subject not empty.');
        }
        
        if(message_area == ''){
            $("#message-area-error").text('Message area not empty.');
        }



        var data = {
                        'action': 'my_contact_email',
                        'user_name': user_name,
                        'user_email':user_email,
                        'subject':subject,
                        'message_area':message_area
                    };

                    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                    $("#user_name").val('');
                    $("#user_email").val('');
                    $("#subject").val('');
                    $("#message_area").val('');
                    alert("Your mail send successfully");
                }
                else if(responseJsonData.result=='Failure')
            {
                        alert("Something Went Wrong!!");
            }   
            });
  

    });
  })
  </script>