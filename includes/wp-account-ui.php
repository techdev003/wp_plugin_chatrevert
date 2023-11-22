<style>
    .account-activate-generate-button {
        font-size: 30px;
        padding: 12px;
        display: block;
        margin: 62px 22px 7px 190px;
        background-color: #2189c3;

        color: #fff;
        position: absolute;
    }
</style>
<?php
include_once(MY_CUSTOM_PLUGIN_DIR . 'includes/wp-global.php');
global $current_user;
global $wpdb;
wp_get_current_user();
$user_id = $current_user->ID;
$tablenameSetting = $wpdb->prefix . 'setting';
$settingData = $wpdb->get_results("SELECT * FROM $tablenameSetting where user_id=$user_id", ARRAY_A);
$singleSettingArray = $settingData[0];
$modelArray = array('text-davinci-003', 'gpt-3.5-turbo', 'text-curie-001', 'text-babbage-001', 'text-ada-001');
?>

<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


<div class="plugins-accounts-wrapper">
    <h1> Accounts</h1>

    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo; ?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">
                        <div class="icon-info"><?php echo $aiEngine; ?></div>User Info
                    </a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-2">
                        <div class="icon-info"><?php echo $aiEngine; ?></div>AI Engine
                    </a></li>

                <!-- <li><a href="#" class="menu-link-info" data-target="tabs-2"><div class="icon-info"><?php echo $iContent; ?></div>Content</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-3"><div class="icon-info"><?php echo $iSeo; ?></div>Seo</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-4"><div class="icon-info"><?php echo $iImage; ?></div>Image</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-5"><div class="icon-info"><?php echo $iSearchgpt; ?></div>SearchGPT</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-6"><div class="icon-info"><?php echo $iAiassistant; ?></div>AI Assistant</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-7"><div class="icon-info"><?php echo $iDocumentation; ?></div>Documentation</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-8"><div class="icon-info"><?php echo $iHelp; ?></div>Help</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-9"><div class="icon-info"><?php echo $iContactus; ?></div>Contact Us</a></li> -->
            </ul>
        </div>
        <div class="right-sec-wrap">
            <div class="main-content-wrap">
                <div class="main-content-info tabs" data-tab="tabs-2">
                    <h3>AI Engine</h3>

                    <div class="content-area-info">
                        <div class="left-data-info">
                            <div class="input-data">
                                <div class="label-info"><span>Model:</span></div>
                                <div class="input-info">
                                    <select id="model">
                                        <option value="">Select One</option>
                                        <?php
                                        for ($i = 0; $i < count($modelArray); $i++) {
                                        ?>
                                            <?php
                                            if ($modelArray[$i] === $singleSettingArray['model']) {
                                            ?>
                                                <option value="<?php echo $modelArray[$i] ?>" selected><?php echo $modelArray[$i] ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?php echo  $modelArray[$i] ?>"><?php echo $modelArray[$i] ?></option>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="sub-cta-info"><a href="#">synchronization</a></div>
                                    <a href="#"><?php echo $iQuestionmark; ?></a>
                                </div>

                            </div>
                            <span id="model-input-error" class="error"></span>
                            <div class="input-data">
                                <div class="label-info"><span>Temperature:</span></div>
                                <div class="input-info">
                                    <input type="text" value="<?php if (isset($singleSettingArray['temperature'])) echo $singleSettingArray['temperature'] ?>" id="temperature" placeholder="Please Enter Temperature between 0 to 1" />

                                    <!-- <input type="text" value="0.7"> -->
                                    <a href="#"><?php echo $iQuestionmark; ?></a>
                                </div>
                            </div>
                            <span id="temperature-error" class="error"></span>
                            <div class="input-data">
                                <div class="label-info"><span>Max Tokens:</span></div>
                                <div class="input-info">
                                    <input type="text" value="<?php if (isset($singleSettingArray['max_token'])) echo $singleSettingArray['max_token'] ?>" id="max-token" placeholder="Please enter max-token" value="1500" />

                                    <a href="#"><?php echo $iQuestionmark; ?></a>
                                </div>
                            </div>
                            <span id="max-token-error" class="error"></span>
                            <div class="input-data">
                                <div class="label-info"><span>Top P:</span></div>
                                <div class="input-info">
                                    <input type="text" value="<?php if (isset($singleSettingArray['top_p'])) echo $singleSettingArray['top_p'] ?>" id="top-p" placeholder="Please enter top p value either 0 or 1" value="0" />

                                    <a href="#"><?php echo $iQuestionmark; ?></a>
                                </div>
                            </div>
                            <span id="top-p-error" class="error"></span>
                            <div class="input-data">
                                <div class="label-info"><span>Best Of:</span></div>
                                <div class="input-info">
                                    <input type="text" value="<?php if (isset($singleSettingArray['best_of'])) echo $singleSettingArray['best_of'] ?>" id="best-of" placeholder="Please enter best of value either 0 or 1" value="0" />

                                    <a href="#">
                                        <?php echo $iQuestionmark; ?>
                                    </a>
                                </div>
                            </div>
                            <span id="best-of-error" class="error"></span>
                            <div class="input-data">
                                <div class="label-info"><span>Frequency Penalty:</span></div>
                                <div class="input-info">
                                    <input type="text" value="<?php if (isset($singleSettingArray['frequency_penalty'])) echo $singleSettingArray['frequency_penalty'] ?>" id="frequency-penalty" placeholder="Please enter best of value either 0 or 1" value="0" />


                                    <a href="#"><?php echo $iQuestionmark; ?></a>
                                </div>

                            </div>
                            <span id="frequency-penalty-error"></span>
                            <div class="input-data">
                                <div class="label-info"><span>Presence Penalty:</span></div>
                                <div class="input-info">
                                    <input type="text" value="<?php if (isset($singleSettingArray['presence_penalty'])) echo $singleSettingArray['presence_penalty'] ?>" id="presence-penalty" placeholder="Please enter best of value either 0 or 1" value="0" />


                                    <a href="#"><?php echo $iQuestionmark; ?></a>
                                </div>
                            </div>
                            <span id="presence-penalty-error" class="error"></span>

                            <div class="input-data">
                                <div class="label-info"><span>API Key:</span></div>
                                <div class="input-info">
                                    <input type="text" id="api-key" value="<?php if (isset($singleSettingArray['api_key'])) echo $singleSettingArray['api_key'] ?>" placeholder="Enter Api Key" />

                                    <div class="sub-cta-info"><a href="#">Get Your Api Key</a></div><a href="#"><?php echo $iQuestionmark; ?></a>
                                </div>
                            </div>
                            <span id="api-key-error" class="error"></span>


                            <div class="please-note-info">
                                <p><strong>Please note </strong> that our plugin works with the OpenAI API. To use it, you need to create an account on OpenAI and obtain your API key. OpenAI provides $5 in free credit for new users. If you encounter the message "You exceeded your current quota, please check your plan and billing details." it indicates that you have exhausted your OpenAI quota and need to purchase additional credit from OpenAI.</p>
                                <p>Purchasing our plugin does not provide any credit from OpenAI. When you buy our plugin, you gain access to the pro features of the plugin, but it does not include any API credit. You will still need to purchase credit from OpenAI separately.</p>
                            </div>


                            <div class="save-cta-info">
                                <div class="button-box-generate-image">
                                    <?php
                                    global $current_user;
                                    global $wpdb;
                                    wp_get_current_user();
                                    $user_id = $current_user->ID;


                                    $count = $wpdb->get_var("SELECT COUNT(*) as count FROM $tablename where user_id=$user_id");
                                    if ($count == 0) {
                                        $settingAttr = 'my_settng_insert';
                                    } else {
                                        $settingAttr = 'my_settng_update';
                                    }
                                    ?>
                                    <button id="setting" attrSetting=<?php echo $settingAttr; ?> class="generate-button">Save</button>
                                </div>
                            </div>
                        </div>

                        <div class="right-data-info">

                            <h2>How to Setup OpenAI API Key</h2>

                            <div class="right-content-info">
                                <div class="video-wrap">
                                    <iframe width="100%" height="363" src="https://www.youtube.com/embed/nafDyRsVnXU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <?php
                    global $current_user;
                    global $wpdb;
                    wp_get_current_user();
                    $user_id = $current_user->ID;
                    $tablename = $wpdb->prefix . 'account';
                    $count = $wpdb->get_var("SELECT COUNT(*) as count FROM $tablename where user_id=$user_id");



                    if ($count == 0) {
                    ?>
                        <div class="panel-heading">
                            <h3>Account Activate</h3>
                        </div>
                        <div class="button-box-generate-image">
                            <button onclick="accountActivate()" class="generate-button account-activate-generate-button">Account Activate</button>
                        </div>
                    <?php
                    } else {

                        $tableNameUser = $wpdb->prefix . 'users';
                        $sql = $wpdb->get_results("SELECT * FROM $tableNameUser JOIN $tablename ON $tablename.`user_id`=$tableNameUser.`ID` where user_id=$user_id");
                    ?>
                        <h3>User Info</h3>

                        <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="input-data">
                                    <div class="label-info"><span>User Id:</span></div>
                                    <div class="input-info">
                                        <input type="text" value="<?php echo $current_user->ID; ?>" disabled />
                                    </div>

                                </div>
                                <span id="model-input-error" class="error"></span>
                                <div class="input-data">
                                    <div class="label-info"><span> Name:</span></div>
                                    <div class="input-info">
                                        <input type="text" value="<?php echo $current_user->user_login; ?>" disabled />

                                    </div>
                                </div>
                                <div class="input-data">
                                    <div class="label-info"><span> Secret Key:</span></div>
                                    <div class="input-info">
                                        <input type="text" value="<?php echo $sql[0]->secert_key; ?>" disabled />

                                    </div>
                                </div>
                                <div class="input-data">
                                    <div class="label-info"><span>Publisher Key:</span></div>
                                    <div class="input-info">
                                        <input type="text" value="<?php echo $sql[0]->publisher_key; ?>" disabled />

                                    </div>
                                </div>
                                <div class="input-data">
                                    <div class="label-info"><span>Subscription Status:</span></div>
                                    <div class="input-info">
                                        <input id="subscription_status" type="text" value="" disabled />

                                    </div>
                                </div>
                                <div class="save-cta-info">
                                    
                                </div>

                                <span id="top-p-error" class="error"></span>
                                <div class="please-note-info">
                                    <p><strong>Please note </strong> that our plugin works with the OpenAI API. To use it, you need to create an account on OpenAI and obtain your API key. OpenAI provides $5 in free credit for new users. If you encounter the message "You exceeded your current quota, please check your plan and billing details." it indicates that you have exhausted your OpenAI quota and need to purchase additional credit from OpenAI.</p>
                                    <p>Purchasing our plugin does not provide any credit from OpenAI. When you buy our plugin, you gain access to the pro features of the plugin, but it does not include any API credit. You will still need to purchase credit from OpenAI separately.</p>
                                </div>
                            </div>

                            <div class="right-data-info">

                                <h2>How to Setup OpenAI API Key</h2>

                                <div class="right-content-info">
                                    <div class="video-wrap">
                                        <iframe width="100%" height="363" src="https://www.youtube.com/embed/nafDyRsVnXU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php
                    }
                    ?>


                </div>
                <!-- <div class="main-content-info tabs" data-tab="tabs-2">
                    <h3>Content</h3>
                    
                        <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="input-data-wrap">
                                    <h4>Language, Style & Tone</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>Language:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="English">English</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="German">German</option>
                                                <option value="French">French</option>
                                            </select>                                                
                                            <a href="#"><?php echo $iQuestionmark; ?></a>
                                        </div>
                                    </div>                            
                                    <div class="input-data">
                                        <div class="label-info"><span>Writing Style:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Informative">Informative</option>
                                                <option value="Informative1">Informative1</option>
                                                <option value="Informative2">Informative2</option>
                                                <option value="Informative3">Informative3</option>
                                            </select> 
                                            <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Writing Tone:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Formal">Formal</option>
                                                <option value="inFormal">InFormal</option>
                                                <option value="normal">Normal</option>                                            
                                            </select> 
                                            <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                </div>
                                <div class="input-data-wrap">
                                    <h4>Headings</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>Number of Headings:</span></div>
                                        <div class="input-info"><input type="text" value="3"><a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Heading Tag:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="H1">H1</option>
                                                <option value="H2">H2</option>
                                                <option value="H3">H3</option>
                                                <option value="H4">H4</option>
                                            </select>
                                            <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Modify Headings:</span></div>
                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0"><a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                </div>
                                <div class="input-data-wrap">                               
                                    <h4>Additional Content</h4>   
                                    <div class="input-data">
                                        <div class="label-info"><span>Add Tagline:</span></div>
                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0"><a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Add Q&A:</span></div>
                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0" disabled> Available in Pro <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Make Keywords Bold:</span></div>
                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0" disabled> Available in Pro <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Call-to-Action Position:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Beginning">Beginning</option>
                                                <option value="Endning">Endning</option>                                                
                                            </select>
                                        <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                </div>                      
                                
                            </div>
                            <div class="right-data-info">

                                <div class="input-data-wrap">
                                    <h4>Table of Contents</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>Add ToC?:</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="" name="0" value="0"> 
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>ToC Title:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="Table of Contents">                                                
                                            <a href="#"><?php echo $iQuestionmark; ?></a>
                                        </div>
                                    </div>                            
                                    
                                    <div class="input-data">
                                        <div class="label-info"><span>ToC Tag:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="h2">h2</option>
                                                <option value="h3">h3</option>
                                                <option value="h4">h4</option>                                            
                                            </select> 
                                            <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                </div>
                                <div class="input-data-wrap">
                                    <h4>Introduction</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>Add Introduction:</span></div>
                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0"><a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Intro Title Tag:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="h2">h2</option>
                                                <option value="h3">h3</option>
                                                <option value="h4">h4</option>                                               
                                            </select>
                                            <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>                                   
                                </div>
                                <div class="input-data-wrap">                               
                                    <h4>Conclusion</h4>   
                                    <div class="input-data">
                                        <div class="label-info"><span>Add Conclusion:</span></div>
                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0"><a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Conclusion Title Tag:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="h2">h2</option>
                                                <option value="h3">h3</option>
                                                <option value="h4">h4</option>                                               
                                            </select>
                                            <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>                                 
                                    
                                </div> 
                                <div class="input-data-wrap">                               
                                    <h4>Custom Prompt for Express Mode</h4>   
                                    <div class="input-data">
                                        <div class="label-info"><span>Enable:</span></div>
                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0"></div>
                                    </div>                                                            
                     
                                </div> 

                            </div>                                                   
                        </div>
                        <div class="save-cta-info">
                            <a href="#">Save</a>
                        </div>
                                
                </div>
                <div class="main-content-info tabs" data-tab="tabs-3">
                    <h3>Seo</h3>
                    
                        <div class="content-area-info single-content-area-info">
                            <div class="left-data-info">
                                <div class="input-data-single-wrap">                                    
                                    <div class="input-data">
                                        <div class="label-info"><span>Meta Description:</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="" name="0" value="0">                                               
                                            <a href="#"><?php echo $iQuestionmark; ?></a>
                                        </div>
                                    </div> 
                                    <div class="input-data">
                                        <div class="label-info"><span>Include in HTML:</span></div>
                                        <div class="input-info">
                                            <input type="checkbox" id="" name="0" value="0">                                               
                                            <a href="#"><?php echo $iQuestionmark; ?></a>
                                        </div>
                                    </div>                           
                                    
                                    
                                </div>
                                <div class="save-cta-info">
                                    <a href="#">Save</a>
                                </div>                          
                             </div>
                            <div class="right-data-info empty-data-info">                                

                            </div>                                                   
                        </div>
                                               
                    
                </div>
                <div class="main-content-info tabs" data-tab="tabs-4">
                    <h3>Image</h3>
                                                    
                        <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="input-data-wrap">
                                    <h4>Sources</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>Image Source::</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="none">none</option>                                                
                                            </select>                                                
                                            <a href="#"><?php echo $iQuestionmark; ?></a>
                                        </div>
                                    </div>                            
                                    <div class="input-data">
                                        <div class="label-info"><span>Featured Image Source:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="none">none</option>                                                
                                            </select> 
                                            <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                    </div>                                    
                                </div>
                                <div class="input-data-wrap">
                                    <h4>DALL-E</h4>                                    
                                    <div class="input-data">
                                        <div class="label-info"><span>Image Size:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Medium (512x512)">Medium (512x512)</option>
                                                <option value="Medium (512x512)2">Medium (512x512)2</option>
                                                <option value="Medium (512x512)3">Medium (512x512)3</option>
                                                <option value="H4">H4</option>
                                            </select>
                                        <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                     </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Style:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="None">None</option>                                                
                                            </select>
                                        <a href="#"><?php echo $iQuestionmark; ?></a></div>
                                     </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Artist:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="None">None</option>
                                                  
                                            </select>
                                        </div>
                                     </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Photography:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Landscape">Landscape</option> 
                                                <option value="Portrait">Portrait</option>  
                                            </select>
                                        </div>
                                     </div>
                                    
                                     <div class="input-data">
                                        <div class="label-info"><span>Lighting:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Ambient">Ambient</option>
                                                <option value="Ambient">Ambient1</option>
                                            </select>
                                        </div>
                                     </div>


                                     <div class="input-data">
                                        <div class="label-info"><span>Subject:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="None">None</option>                                                
                                            </select>
                                        </div>
                                     </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Camera:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Aperture">Aperture</option>
                                                <option value="Aperture1">Aperture1</option>                                                
                                            </select>
                                        </div>
                                     </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Composition:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Rule of Thirds">Rule of Thirds</option> 
                                                 <option value="Rule of 2">Rule of 2</option>                                                
                                            </select>
                                        </div>
                                     </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Resolution:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="4K (3840x2160)">4K (3840x2160)</option> 
                                                <option value="4K (3840x2160)1">4K (3840x2160)1</option>                                                
                                            </select>
                                        </div>
                                     </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Color:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="RGB">RGB</option>
                                                <option value="RGBA">RGBA</option>                                                 
                                            </select>
                                        </div>
                                     </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Special Effects:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="Cinemagraph">Cinemagraph</option>
                                                <option value="Cinemagraph1">Cinemagraph1</option>                                                  
                                            </select>
                                        </div>
                                     </div>




                                   
                                </div>                                                    
                                
                            </div>
                            <div class="right-data-info">

                                <div class="input-data-wrap">
                                    <h4>Stable Diffusion</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>API Key:</span></div>
                                        <div class="input-info get-api-info">
                                            <input type="text" id="" name="0" value=""> 
                                            <a href="#" >Get API Key</a>
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Version:</span></div>
                                        <div class="input-info ">
                                            <input type="text" id="" name="0" value="Leave blank for default">                                                
                                            <a href="#"><?php echo $iQuestionmark; ?></a>
                                        </div>
                                    </div>                            
                                    
                                   
                                </div>
                                <div class="input-data-wrap">
                                    <h4>Pexels</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>API Key:</span></div>
                                        <div class="input-info get-api-info"> <input type="text" id="" name="0" value="Leave blank for default">                                                
                                            <a href="#" >Get API Key</a></div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Orientation:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="none">none</option>                                                                                              
                                            </select>
                                            </div>
                                    </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Size:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="none">none</option>                                                                                              
                                            </select>
                                            </div>
                                    </div>                                   
                                </div>
                                <div class="please-note-info">
                                    <h4>Shortcodes</h4>
                                    <p>Copy and paste the following shortcode into your post or page to display the image generator.</p>
                                    <p>If you want to display both DALL-E and Stable Diffusion, use: [wpcgai_img]</p>
                                    <p>If you want to display DALL-E only, use: [wpcgai_img dalle=yes]</p>
                                    <p>If you want to display Stable Diffusion only, use: [wpcgai_img sd=yes]</p>                                       
                                    <p>If you want to display the settings, use: [wpcgai_img settings=yes] or [wpcgai_img dalle=yes settings=yes] or [wpcgai_img sd=yes settings=yes]</p>
                                </div>
                                 

                            </div>                                                   
                        </div>
                        <div class="save-cta-info">
                            <a href="#">Save</a>
                        </div>              

                    
                </div>
                 <div class="main-content-info tabs" data-tab="tabs-5">
                    <h3>SearchGPT</h3>
                    
                        <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="please-note-info">
                                    <h4>Usage</h4>
                                    <p>Copy the following code and paste it in your page or post where you want to show the search box: [wpaicg_search]</p>
                                    
                                </div>
                                <div class="input-data-wrap">
                                    <h4>Search Box</h4>
                                    <div class="input-data">
                                        <div class="label-info"><span>Placeholder:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="" placeholder="Search anything...">
                                        </div>
                                    </div>                            
                                    <div class="input-data">
                                        <div class="label-info"><span>Font Size:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="13px">13px</option>                                                
                                                <option value="14px">14px</option>                                                
                                                <option value="15px">15px</option>                                                
                                                <option value="16px">16px</option>                                                
                                            </select> 
                                        </div>
                                    </div> 
                                     <div class="input-data">
                                        <div class="label-info"><span>Font Color:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="#000000">
                                        </div>
                                    </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Border Color:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="#cccccc" >
                                        </div>
                                    </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Background Color:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="">
                                        </div>
                                    </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Width:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="100%">
                                        </div>
                                    </div>
                                     <div class="input-data">
                                        <div class="label-info"><span>Height:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="45px">
                                        </div>
                                    </div>                                   
                                </div>
                                                                                  
                                
                            </div>
                            <div class="right-data-info">

                                <div class="input-data-wrap">
                                    <h4>Results</h4>                                                                
                                    <div class="input-data">
                                        <div class="label-info"><span>Number of Results:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="5">5</option>                                                
                                                <option value="6">6</option>                                                
                                                <option value="7">7</option>                                                
                                                <option value="8">8</option>                                                
                                            </select> 
                                        </div>
                                    </div>
                                    
                                    <div class="input-data">
                                        <div class="label-info"><span>Font Size:</span></div>
                                        <div class="input-info">
                                            <select>
                                                <option value="13px">13px</option>                                                
                                                <option value="14px">14px</option>                                                
                                                <option value="15px">15px</option>                                                
                                                <option value="16px">16px</option>                                                
                                            </select> 
                                        </div>
                                    </div>


                                     <div class="input-data">
                                        <div class="label-info"><span>Font Color:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="#000000">
                                        </div>
                                    </div>                                     
                                     <div class="input-data">
                                        <div class="label-info"><span>Background Color:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="">
                                        </div>
                                    </div>
                                    <div class="input-data">
                                        <div class="label-info"><span>Progress Bg Color:</span></div>
                                        <div class="input-info">
                                            <input type="text" id="" name="0" value="#cccccc">
                                        </div>
                                    </div>  
                                </div>

                            </div>                                                   
                        </div>
                        <div class="save-cta-info">
                            <a href="#">Save</a>
                        </div>

                    
                </div>
                 <div class="main-content-info tabs" data-tab="tabs-6">
                    <h3>AI Assistant</h3>
                    
                        <div class="content-area-info single-content-area-info">
                            <div class="left-data-info">
                                <div class="please-note-info">                                    
                                    <p>AI Assistant is a feature that allows you to add a button to the WordPress editor that will help you to create content. You can add your own menus with your own prompts.</p>
                                    <p>AI Assistant is compatible with both Gutenberg and Classic Editor.</p>       
                                    <p>Use the form below to add, modify, or remove menus as needed.</p>                                     
                                    
                                </div>
                                <div class="input-data-wrap">                                    
                                    <div class="input-data wid-50">
                                        <a class="close-cta-info" href="#"><?php echo $iCrossicon; ?></a>
                                        <div class="input-info"><span>Menu Item</span>
                                        <input type="text" id="" name="0" value="Write a paragraph about this">
                                        </div>
                                        <div class="input-info">
                                            <span>Prompt</span>
                                            <input type="text" id="" name="0" value="Write a paragraph about this: [text]" >
                                            <span>Ensure [text] is included in your prompt.</span>
                                        </div>
                                    </div>                                                          
                   
                                </div>
                                <div class="input-data-wrap">
                                     <div class="input-data wid-50">
                                        <a class="close-cta-info" href="#"><?php echo $iCrossicon; ?></a>
                                        <div class="input-info"><span>Menu Item</span>
                                        <input type="text" id="" name="0" value="Summarize">
                                        </div>
                                        <div class="input-info">
                                            <span>Prompt</span>
                                            <input type="text" id="" name="0" value="Summarize this: [text]" >
                                            <span>Ensure [text] is included in your prompt.</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="input-data-wrap">
                                        <div class="input-data wid-50">
                                        <a class="close-cta-info" href="#"><?php echo $iCrossicon; ?></a>
                                        <div class="input-info"><span>Menu Item</span>
                                        <input type="text" id="" name="0" value="Expand">
                                        </div>
                                        <div class="input-info">
                                            <span>Prompt</span>
                                            <input type="text" id="" name="0" value="Expand this: [text]" >
                                            <span>Ensure [text] is included in your prompt.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-data-wrap">
                                    <div class="input-data wid-50">
                                        <a class="close-cta-info" href="#"><?php echo $iCrossicon; ?></a>
                                        <div class="input-info"><span>Menu Item</span>
                                        <input type="text" id="" name="0" value="Rewrite">
                                        </div>
                                        <div class="input-info">
                                            <span>Prompt</span>
                                            <input type="text" id="" name="0" value="Rewrite this: [text]" >
                                            <span>Ensure [text] is included in your prompt.</span>
                                        </div>
                                    </div> 

                                </div>
                                <div class="add-more-cta-info">
                                    <a href="#">Add More</a>
                                </div>
                                <div class="save-cta-info">
                                    <a href="#">Save</a>
                                </div>
                                                                                  
                                
                            </div>
                            <div class="right-data-info empty-data-info">

                                

                            </div>                                                   
                        </div>
                        

                    
                </div>
                 <div class="main-content-info tabs" data-tab="tabs-7">
                    <h3>Documentation</h3>
                    
                        <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="please-note-info">
                                    <h4>What is GPT AI Power</h4>                                    
                                    <p>GPT AI Power is a WordPress plugin that allows you to generate content, images, audio, and more using the power of AI.</p>
                                    <p>It is a complete AI pack that includes ChatGPT, Content Writer, Auto Content Writer, AI Assistant, AI Forms, Image Generator, Audio Converter, WooCommerce Product Writer, SEO optimizer, AI Training, Embeddings, Title Suggester and more.</p>                                                                                                             
                                </div>
                                <div class="please-note-info">
                                    <h4>How It Works</h4>                                    
                                    <p>Our plugin works with the OpenAI API. To use it, you need to create an account on OpenAI and obtain your API key. OpenAI provides $5 in free credit for new users. If you encounter the message "You exceeded your current quota, please check your plan and billing details." it indicates that you have exhausted your OpenAI quota and need to purchase additional credit from OpenAI.</p>
                                    <p>Purchasing our plugin does not provide any credit from OpenAI. When you buy our plugin, you gain access to the pro features of the plugin, but it does not include any API credit. You will still need to purchase credit from OpenAI separately.</p>       
                                    <p>If you experience any slowness or content not being generated, it may be due to issues with OpenAI API services. Please wait for their services to return to normal before trying again.</p>                                     
                                    
                                </div>
                                <div class="please-note-info">
                                    <h4>How to Setup API Key</h4>                                    
                                    <p>Watch this tutorial: <a href="#">How to Setup OpenAI API Key</a></p>
                                    <p>1. Go to <a href="#">OpenAI</a>and generate your API key.</p>       
                                    <p>2. Go to <a href="#">AI Engine</a> tab in this page.</p>                                      
                                    <p>3. Enter your API key and click the Save button.</p> 
                                    <p>4. Done</p>                                     
                                    
                                </div>
                                <div class="please-note-info">
                                    <h4>How to Add ChatGPT to Your Website</h4>                                    
                                    <p>You can create unlimited chatGPT bots that your know content.</p>                                       
                                    <p>Learn how you can teach your content to the chat bot:<a href="#">https://youtu.be/NPMLGwFQYrY</a></p>                                     
                                    
                                </div>
                               
                               
                                                                                  
                                
                            </div>
                            <div class="right-data-info">
                                <div class="please-note-info">
                                    <h4>How to Use Content Writer</h4>                                    
                                    <p>Watch this tutorial: How to Use Content Writer</a></p>
                                    <p>1. Go to Content Writer Page</p>       
                                    <p>2. Enter your title and click the Generate button.</p> 
                                    <p>3. Click the Save Draft button.</p> 
                                    <p>4. If you are happy with the generated content, click the Publish button.</p> 
                                    <p>Done!</p>                                    
                                    
                                </div>
                                <div class="please-note-info">
                                    <h4>How to use Embeddings for Chat bot.</h4>                                    
                                    <p>1. First watch this video tutorial here.</a></p>
                                    <p>2. Get your API key from Pinecone.</p>       
                                    <p>3. Create an Index on Pinecone.</p> 
                                    <p>4. Make sure to set your dimension to 1536.</p> 
                                    <p>5. Make sure to set your metric to cosine.</p> 
                                    <p>6. Enter your data manually or use Index Builder to convert all your content automatically.</p> 
                                    <p>7. Go to Settings - ChatGPT tab and select Embeddings method.</p>                                                                    
                                    
                                </div>
                                <div class="please-note-info">
                                    <h4>Contact</h4>                                    
                                    <p>For more information about the plugin, please visit <a href="#">our website.</a></p>
                                    <p>If you have any questions, suggestion, feedback please contact me: <a href="#">senols@gmail.com</a></p>       
                                    <p>I am also on <a href="#">Twitter.</a></p>   
                                    <p>You can also join our Discord community <a href="#">here.</a></p>                                    
                                    
                                </div>

                                

                            </div>                                                   
                        </div>                    
                </div>
                <div class="main-content-info tabs" data-tab="tabs-8">
                    <h3>Help</h3>
                    
                </div>
                <div class="main-content-info tabs" data-tab="tabs-9">
                    <h3>Contact Us</h3>
                    
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


<script type="text/javascript">
    $('.menu-link-info').on('click', function(e) {
        e.preventDefault();
        $('.menu-link-info').removeClass('active');
        $(this).addClass('active');
        $('.tabs').removeClass('active');
        var tabID = $(this).attr('data-target');
        $('.tabs[data-tab="' + tabID + '"]').addClass('active');
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("#setting").click(function() {
            var actionUrl = $(this).attr('attrSetting');

            var model = $("#model").val();
            var temperature = $("#temperature").val();
            var max_token = $("#max-token").val();
            var api_key = $("#api-key").val();
            var top_p = $("#top-p").val();
            var best_of = $("#best-of").val();
            var frequency_penalty = $("#frequency-penalty").val();
            var presence_penalty = $("#presence-penalty").val();
            if (max_token > 4096) {
                alert("Maximum token cannot 4096");
            }
            if (model == '') {
                $("#model-input-error").text('Please select model.');
                return false;
            }

            if (temperature == '') {
                $("#generate-input-error").text('Temperature can\'t be empty.');
                return false;
            }
            if (temperature > 1 || temperature < 0) {
                $("#temperature-error").text('Temperature can\'t be greater then 1 or less the 0.');
                return false;
            }

            if (max_token == '') {
                $("#max-token-error").text('Please enter max token.');
                return false;
            }

            if (top_p == '') {
                $("#top-p-error").text('Please enter top p values.');
                return false;
            }

            if (api_key == '') {
                $("#api-key-error").text('Please enter api key.');
                return false;
            }

            if (best_of == '') {
                $("#best-of-error").text('Please enter best of value.');
                return false;
            }

            if (frequency_penalty == '') {
                $("#frequency-penalty-error").text('Please enter frequency penalty.');
                return false;
            }


            if (presence_penalty == '') {
                $("#presence-penalty-error").text('Please enter presence penalty.');
                return false;
            }





            var data = {
                'action': actionUrl,
                'model': model,
                'temperature': temperature,
                'max_token': max_token,
                'api_key': api_key,
                'top_p': top_p,
                'best_of': best_of,
                'frequency_penalty': frequency_penalty,
                'presence_penalty': presence_penalty
            };

            // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
            jQuery.post(ajaxurl, data, function(response) {
                var responseJsonData = jQuery.parseJSON(response);
                console.log(responseJsonData.result);
                if (responseJsonData.result == 'Success') {
                    location.reload();
                } else if (responseJsonData.result == 'Failure') {
                    alert("Something Went Wrong!!");
                }
            });


        });
    })

    function accountActivate() {

        var email = "<?php echo  $current_user->user_email; ?>";
        $.ajax({
            url: "<?php echo $apiUrl; ?>register",
            type: 'POST',
            dataType: 'json',
            data: {
                'email': email,
                'user_type': 'wp_plugin'
            }
        }).done(function(response) {
            if (response.result == 'Success') {
                var personal_key = response.data.personal_key;
                var secert_key = response.data.secert_key;
                var data = {
                    'action': 'my_account',
                    'personal_key': personal_key,
                    'secert_key': secert_key
                };

                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                jQuery.post(ajaxurl, data, function(response) {
                    var responseJsonData = jQuery.parseJSON(response);
                    console.log(responseJsonData.result);
                    if (responseJsonData.result == 'Success') {
                        location.reload();
                    }
                });
            } else if (responseJsonData.result == 'Failure') {
                alert("Something Went Wrong!!")
            }

        }).fail(function(jqXHR, textStatus, errorThrown) {
            alert('FAILED! ERROR: ' + errorThrown);
        });
    }
</script>


<!-- Check Subscription Script -->
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "https://api.aiharness.io/api/check-subscription",
            headers: {
                "secertkey": "<?= $secertkey; ?>",
            },
            success: function(response) {
                var status = response.message.message;

                if(status =='Subscription Exist.'){
                    $("#subscription_status").val('Active');
                    $('.save-cta-info').html('<a onclick="sendData()" style="cursor: pointer" class="cancel_btn"><span class="icon-info" style="margin-right: 5px; cursor: pointer"></span>Cancel Subscription</a>');
                }
                else{
                    $("#subscription_status").val('You have not any plan yet..');
                    var pageUrl = '<?php echo admin_url('admin.php?page=upgrade'); ?>'; 
                    $('.save-cta-info').html('<a href="'+ pageUrl +'" style="cursor: pointer" class="cancel_btn"><span class="icon-info" style="margin-right: 5px; cursor: pointer"></span>Upgrade Subscription</a>');
                }
            },
            error: function(xhr, status, error) {
                console.log("Subscription check failed:", error);
            }
        });
    });
</script>


<!-- Cancel Subscription Script -->
<script>
    function sendData() {
        if (confirm("Are you sure you want to cancel your subscription?")) {
            // Send data to API and receive response
            $.ajax({
                url: 'https://api.aiharness.io/api/cancel-subscription',
                type: 'DELETE',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("secertkey", "<?php echo $secertkey; ?>");
                },
                dataType: 'json',
                data: {
                    'secertkey': '<?php echo $secertkey; ?>',
                    // Include any required data for the API request
                },
            }).done(function(response) {
                if (response.message === 'Subscription Cancel Successfully') {
                    $("#subscription_status").val('You have not any plan yet..');
                    var pageUrl = '<?php echo admin_url('admin.php?page=upgrade'); ?>'; 
                    $('.save-cta-info').html('<a href="'+ pageUrl +'" style="cursor: pointer" class="cancel_btn"><span class="icon-info" style="margin-right: 5px; cursor: pointer"></span>Upgrade Subscription</a>');
                } 

            })
        }
    }
</script>