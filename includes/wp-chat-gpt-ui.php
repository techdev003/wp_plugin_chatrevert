<div class="loaderoverlay">
  <div class="loader-cv-spinner">
    <span class="loader-spinner"></span>
  </div>
</div>

<?php 
        include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
?>
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 

<style>
/*Main container*/
.colpick {
	position: absolute;
	width: 346px;
	height: 170px;
	overflow: hidden;
	z-index: 999;
	display: none;
	font-family: Arial, Helvetica, sans-serif;
	background:#ebebeb;
	border: 1px solid #bbb;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	
	/*Prevents selecting text when dragging the selectors*/
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
}
/*Color selection box with gradients*/
.colpick_color {
	position: absolute;
	left: 7px;
	top: 7px;
	width: 156px;
	height: 156px;
	overflow: hidden;
	outline: 1px solid #aaa;
	cursor: crosshair;
}
.colpick_color_overlay1 {
	position: absolute;
	left:0;
	top:0;
	width: 156px;
	height: 156px;
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=1,startColorstr='#ffffff', endColorstr='#00ffffff')"; /* IE8 */
	background: -moz-linear-gradient(left, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(255,255,255,1)), color-stop(100%,rgba(255,255,255,0))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(left, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(left, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(left, rgba(255,255,255,1) 0%,rgba(255,255,255,0) 100%); /* IE10+ */
	background: linear-gradient(to right, rgba(255,255,255,1) 0%, rgba(255,255,255,0) 100%);
	filter:  progid:DXImageTransform.Microsoft.gradient(GradientType=1,startColorstr='#ffffff', endColorstr='#00ffffff'); /* IE6 & IE7 */
}
.colpick_color_overlay {
	position: absolute;
	left:0;
	top:0;
	width: 156px;
	height: 156px;
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#00000000', endColorstr='#000000')"; /* IE8 */
	background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,1))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,1) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,1) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,1) 100%); /* IE10+ */
	background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,1) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#000000',GradientType=0 ); /* IE6-9 */
}
/*Circular color selector*/
.colpick_selector_outer {
	background:none;
	position: absolute;
	width: 11px;
	height: 11px;
	margin: -6px 0 0 -6px;
	border: 1px solid black;
	border-radius: 50%;
}
.colpick_selector_inner{
	position: absolute;
	width: 9px;
	height: 9px;
	border: 1px solid white;
	border-radius: 50%;
}
/*Vertical hue bar*/
.colpick_hue {
	position: absolute;
	top: 6px;
	left: 175px;
	width: 19px;
	height: 156px;
	border: 1px solid #aaa;
	cursor: n-resize;
}
/*Hue bar sliding indicator*/
.colpick_hue_arrs {
	position: absolute;
	left: -8px;
	width: 35px;
	height: 7px;
	margin: -7px 0 0 0;
}
.colpick_hue_larr {
	position:absolute;
	width: 0; 
	height: 0; 
	border-top: 6px solid transparent;
	border-bottom: 6px solid transparent;
	border-left: 7px solid #858585;
}
.colpick_hue_rarr {
	position:absolute;
	right:0;
	width: 0; 
	height: 0; 
	border-top: 6px solid transparent;
	border-bottom: 6px solid transparent; 
	border-right: 7px solid #858585; 
}
/*New color box*/
.colpick_new_color {
	position: absolute;
	left: 207px;
	top: 6px;
	width: 60px;
	height: 27px;
	background: #f00;
	border: 1px solid #8f8f8f;
}
/*Current color box*/
.colpick_current_color {
	position: absolute;
	left: 277px;
	top: 6px;
	width: 60px;
	height: 27px;
	background: #f00;
	border: 1px solid #8f8f8f;
}
/*Input field containers*/
.colpick_field, .colpick_hex_field  {
	position: absolute;
	height: 20px;
	width: 60px;
	overflow:hidden;
	background:#f3f3f3;
	color:#b8b8b8;
	font-size:12px;
	border:1px solid #bdbdbd;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}
.colpick_rgb_r {
	top: 40px;
	left: 207px;
}
.colpick_rgb_g {
	top: 67px;
	left: 207px;
}
.colpick_rgb_b {
	top: 94px;
	left: 207px;
}
.colpick_hsb_h {
	top: 40px;
	left: 277px;
}
.colpick_hsb_s {
	top: 67px;
	left: 277px;
}
.colpick_hsb_b {
	top: 94px;
	left: 277px;
}
.colpick_hex_field {
	width: 68px;
	left: 207px;
	top: 121px;
}
/*Text field container on focus*/
.colpick_focus {
	border-color: #999;
}


.colpick_hex_field input {
	right: 4px;
}
/*Field up/down arrows*/
.colpick_field_arrs {
	position: absolute;
	top: 0;
	right: 0;
	width: 9px;
	height: 21px;
	cursor: n-resize;
}
.colpick_field_uarr {
	position: absolute;
	top: 5px;
	width: 0; 
	height: 0; 
	border-left: 4px solid transparent;
	border-right: 4px solid transparent;
	border-bottom: 4px solid #959595;
}

/*Submit/Select button*/
.colpick_submit {
	position: absolute;
	left: 207px;
	top: 149px;
	width: 130px;
	height: 22px;
	line-height:22px;
	background: #efefef;
	text-align: center;
	color: #555;
	font-size: 12px;
	font-weight:bold;
	border: 1px solid #bdbdbd;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}
.colpick_submit:hover {
	background:#f3f3f3;
	border-color:#999;
	cursor: pointer;
}

/*full layout with no submit button*/
.colpick_full_ns  .colpick_submit, .colpick_full_ns .colpick_current_color{
	display:none;
}
.colpick_full_ns .colpick_new_color {
	width: 130px;
	height: 25px;
}
.colpick_full_ns .colpick_rgb_r, .colpick_full_ns .colpick_hsb_h {
	top: 42px;
}
.colpick_full_ns .colpick_rgb_g, .colpick_full_ns .colpick_hsb_s {
	top: 73px;
}
.colpick_full_ns .colpick_rgb_b, .colpick_full_ns .colpick_hsb_b {
	top: 104px;
}
.colpick_full_ns .colpick_hex_field {
	top: 135px;
}

/*rgbhex layout*/
.colpick_rgbhex .colpick_hsb_h, .colpick_rgbhex .colpick_hsb_s, .colpick_rgbhex .colpick_hsb_b {
	display:none;
}
.colpick_rgbhex {
	width:282px;
}
.colpick_rgbhex .colpick_field, .colpick_rgbhex .colpick_submit {
	width:68px;
}
.colpick_rgbhex .colpick_new_color {
	width:34px;
	border-right:none;
}
.colpick_rgbhex .colpick_current_color {
	width:34px;
	left:240px;
	border-left:none;
}

/*rgbhex layout, no submit button*/
.colpick_rgbhex_ns  .colpick_submit, .colpick_rgbhex_ns .colpick_current_color{
	display:none;
}
.colpick_rgbhex_ns .colpick_new_color{
	width:68px;
	border: 1px solid #8f8f8f;
}
.colpick_rgbhex_ns .colpick_rgb_r {
	top: 42px;
}
.colpick_rgbhex_ns .colpick_rgb_g {
	top: 73px;
}
.colpick_rgbhex_ns .colpick_rgb_b {
	top: 104px;
}
.colpick_rgbhex_ns .colpick_hex_field {
	top: 135px;
}


.colpick_hex {
	width:206px;
	height:201px;
}
.colpick_hex .colpick_hex_field {
	width:72px;
	height:25px;
	top:168px;
	left:80px;
}
.colpick_hex .colpick_hex_field div, .colpick_hex .colpick_hex_field input {
	height: 25px;
	line-height: 25px;
}
.colpick_hex .colpick_new_color {
	left:9px;
	top:168px;
	width:30px;
	border-right:none;
}
.colpick_hex .colpick_current_color {
	left:39px;
	top:168px;
	width:30px;
	border-left:none;
}
.colpick_hex .colpick_submit {
	left:164px;
	top: 168px;
	width:30px;
	height:25px;
	line-height: 25px;
}

/*hex layout, no submit button*/
.colpick_hex_ns  .colpick_submit, .colpick_hex_ns .colpick_current_color {
	display:none;
}
.colpick_hex_ns .colpick_hex_field {
	width:80px;
}
.colpick_hex_ns .colpick_new_color{
	width:60px;
	border: 1px solid #8f8f8f;
}

/*Dark color scheme*/
.colpick_dark {
	background: #161616;
	border-color: #2a2a2a;
}
.colpick_dark .colpick_color {
	outline-color: #333;
}
.colpick_dark .colpick_hue {
	border-color: #555;
}
.colpick_dark .colpick_field, .colpick_dark .colpick_hex_field {
	background: #101010;
	border-color: #2d2d2d;
}
.colpick_dark .colpick_field_letter {
	background: #131313;
	border-color: #2d2d2d;
	color: #696969;
}
.colpick_dark .colpick_field_uarr {
	border-bottom-color:#696969;
}
.colpick_dark .colpick_field_darr {
	border-top-color:#696969;
}
.colpick_dark .colpick_focus {
	border-color:#444;
}
.colpick_dark .colpick_submit {
	background: #131313;
	border-color:#2d2d2d;
	color:#7a7a7a;
}
.colpick_dark .colpick_submit:hover {
	background-color:#101010;
	border-color:#444;
}
    </style>




<div class="plugins-accounts-wrapper chatgpt-ui-wrapper">
    <div class="top-header">
        <h1>ChatGPT</h1>
        <span>Need Help? Watch our <a href="#">video tutorial.</a></span>
    </div>
    

    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo;?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">ChatBot</a></li>
                 <!-- <li><a href="#" class="menu-link-info" data-target="tabs-2">Widget</a></li> -->
                <!-- <li><a href="#" class="menu-link-info" data-target="tabs-3">Chat Bots</a></li>  -->
                <!-- <li><a href="#" class="menu-link-info" data-target="tabs-4">Logs</a></li> -->
                <!-- <li><a href="#" class="menu-link-info" data-target="tabs-5">Settings</a></li>  -->
               
              
            </ul>
        </div>


        
        <div class="right-sec-wrap">            
            <div class="main-content-wrap">
                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <h3>ChatBot</h3>                   
                        <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="please-note-info mt-0">                                    
                                    <p>To add the chat bot to your website, please include the shortcode [wpaicg_chatgpt] in the desired location on your site.</p>                                  
                                    <p>If you prefer to use widget instead of shortcode, go to Widget tab and configure it. Learn how you can train the chat bot with your content <a href="#">here</a>.</p>
                                    
                                </div>
                                <div class="header-chat-gpt">
                                            <span id="chat-gpt-name">AI:</span>
                                            <span id="chat-gpt-text">Hello human, I am a GPT powered AI chat bot. Ask me anything!</span>
                                </div>
                                <div class="chatgpt-entry-data-info Center-Block">

                                    <div class="chatgpt-entry-response">
                                    </div>                                    
                                    <div class="input-info"  id="chat-text" class="Center-Block">
                                       <input type="text" value="" id="chat-message" placeholder="Type a message"> 
                                       <a href="#" class="cta-info cta-mic">
                                       <!-- <i class="fa-solid fa-microphone"></i> -->
                                    </a> 
                                    <a href="javascript:void(0)" onClick="chatBot()" class="cta-info">
                                        <svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.0120833 21.75L25.375 10.875L0.0120833 0L0 8.45833L18.125 10.875L0 13.2917L0.0120833 21.75Z" fill="#494949"/>
                                         </svg>
                                    </a> 
                                        </div>
                          
                                </div>      
                            </div>

                            
                            <div class="right-data-info">
                                
                                <div class="accordian-menu-wrap">
                                    <!-- <button class="accordionmenu">Language, Tone and Professioning<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">                                        
                                            <div class="input-data-wrap">                                                    
                                                <div class="input-data">
                                                        <div class="label-info"><span>Language:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="English">English</option>
                                                                <option value="French">French</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="Dutch">Dutch</option>
                                                            </select>                                             
                                                        </div>
                                                    </div>                            
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Tone:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Friendly">Friendly</option>
                                                                <option value="Cheerful">Cheerful</option>
                                                                <option value="Professional">Professional</option>                                                               
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Act as:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="None">None</option>
                                                                <option value="Artist">Artist</option>                                                                
                                                            </select> 
                                                        </div>
                                                    </div>
                                            </div>              

                                    </div> -->

                                    <button class="accordionmenu">Style<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                        <div class="input-data-wrap">                                                    
                                                <div class="input-data">
                                                        <div class="label-info"><span>Font Size:</span></div>
                                                        <div class="input-info">
                                                            <select id="fontSize">
                                                                <option value="12px">12px</option>
                                                                <option value="13px">13px</option>
                                                                <option value="14px">14px</option>
                                                                <option value="15px">15px</option>
                                                                <option value="16px">16px</option>                                                                 
                                                                <option value="17px">17px</option>                                                                 
                                                                <option value="18px">18px</option>                                                                 
                                                            </select>                                                
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Height:</span></div>
                                                        <div class="input-info">
                                                        <input type="range" id="height-chat-bot" value="" min="100" max="1200" step="100" />
                                                        </div>
                                                    </div>                            
                                                    
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Background Color:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" id="picker-elements-colour"  value="933132"></input>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="input-data">
                                                        <div class="label-info"><span>Font Color:</span></div>
                                                        <div class="input-info">
                                                        <input type="text" id="picker-text-colour"  value="ffffff"></input>
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Text Field Background:</span></div>
                                                        <div class="input-info">
                                                             <input type="text" id="picker-background-color-text" name="bg-color" value="#ff0000">
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Text Field Border:</span></div>
                                                        <div class="input-info">
                                                        <input type="text" id="picker-fields-color-text-border" name="bg-color" value="#ff0000">
                                                             
                                                        </div>
                                                    </div> -->
                                                    <!-- <div class="input-data">
                                                        <div class="label-info"><span>Button Color:</span></div>
                                                        <div class="input-info">
                                                             <input type="color" id="picker-background-col" name="bg-color" value="#ff0000">
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>User Background Color:</span></div>
                                                        <div class="input-info">
                                                             <input type="color" id="background-color" name="bg-color" value="#ff0000">
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>AI Background Color:</span></div>
                                                        <div class="input-info">
                                                             <input type="color" id="background-color" name="bg-color" value="#ff0000">
                                                        </div>
                                                    </div> -->

                                            </div>              
                                    </div>

                                    <!-- <button class="accordionmenu">Parameters<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                         <div class="input-data-wrap">                                                    
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Model:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Text-davinci-003">Text-davinci-003</option>
                                                                <option value="gpt-3">gpt-3</option>
                                                                <option value="gpt-4">gpt-4</option>
                                                                <option value="gpt-5">gpt-5</option>
                                                            </select>                                             
                                                        </div>
                                                    </div>                         
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Temperature:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="0.7">                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Max Tokens:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="1500">                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Top P:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="0.01">                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Best Of:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="1">                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Frequency Penalty:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="0.01">                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Presence Penalty:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="0.01">                                                            
                                                        </div>
                                                    </div>




                                                    
                                            </div>
                                    
                                    </div>
                                    <button class="accordionmenu">Voice Input<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                        <div class="input-data-wrap">
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Enable:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Mic Color:</span></div>
                                                        <div class="input-info">
                                                            <input type="color" id="background-color" name="bg-color" value="#ff0000">
                                                        </div>
                                                    </div>                                                        
                                                <div class="input-data">
                                                        <div class="label-info"><span>Stop Color:</span></div>
                                                        <div class="input-info">
                                                            <input type="color" id="background-color" name="bg-color" value="#ff0000">                                    
                                                            
                                                        </div>
                                                </div>                            
                                            </div> 
                                    
                                    </div>
                                    <button class="accordionmenu">Custom Text<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">

                                          <div class="input-data-wrap">                                                    
                                                <div class="input-data">
                                                        <div class="label-info"><span>AI Name:</span></div>
                                                        <div class="input-info">
                                                           <input type="text" value="" placeholder="AI" >                                      
                                                        </div>
                                                    </div> 
                                                    <div class="input-data">
                                                        <div class="label-info"><span>You:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="You" placeholder="">
                                                             
                                                        </div>
                                                    </div>                           
                                                    <div class="input-data">
                                                        <div class="label-info"><span>AI Thinking:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="AI Thinking:" placeholder="">                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Placeholder:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="" placeholder="Type a message">                                                  
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Welcome Message:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="Hello human, I am a GPT powered AI chat bot. Ask me anything!" placeholder="">                                                  
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>No Answer Message:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="" placeholder="">                                                  
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Footer Note:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="" placeholder="Powered by ...">                                                  
                                                            
                                                        </div>
                                                    </div>
                                                    
                                            </div>                  
                                    
                                    </div> -->
                                    <!-- <button class="accordionmenu">Context<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                        <div class="input-data-wrap"> 
                                                <div class="input-data">
                                                        <div class="label-info"><span>Remember Conversation:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Yes" >Yes</option>
                                                                <option value="no" >no</option>                                                                
                                                            </select>  
                                                        </div>
                                                </div> 
                                                <div class="input-data">
                                                        <div class="label-info"><span>Remember Conv. Up To:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="1" >1</option>
                                                                <option value="2" >2</option> 
                                                            </select>  
                                                        </div>
                                                </div>
                                                 <div class="input-data">
                                                        <div class="label-info"><span>User Aware:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Yes" >Yes</option>
                                                                <option value="no" >no</option>                                                                
                                                            </select>  
                                                        </div>
                                                </div> 
                                                 <div class="input-data">
                                                        <div class="label-info"><span>Content Aware:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Yes" >Yes</option>
                                                                <option value="no" >no</option>                                                                
                                                            </select>  
                                                        </div>
                                                </div> 
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Use Excerpt:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                </div>
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Use Embeddings:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0" disabled> 
                                                        </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Method:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="" placeholder="Embeddings only" disabled>                                                  
                                                            
                                                        </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Nearest Answers Up To:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="" placeholder="">                                                  
                                                            
                                                        </div>
                                                </div>
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Additional Context?:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Context:</span></div>
                                                        <div class="input-info">
                                                            <textarea rows="3" cols="3" disabled></textarea>
                                                        </div>
                                                </div>    

                                            </div> 
                                    
                                    </div> -->
                                    <!-- <button class="accordionmenu">Logs<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                         <div class="input-data-wrap"> 
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Save Chat Logs:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0" > 
                                                        </div>
                                                </div>  
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Save Prompt:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0" disabled> 
                                                        </div>
                                                </div>
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Display Notice:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0" disabled> 
                                                        </div>
                                                </div>  
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Notice Text:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" id="" name="0" value="0" disabled> 
                                                        </div>
                                                </div>                                                
                                                                          
                                                   
                                                    
                                            </div>
                                    
                                    </div> -->
                               

                                </div>

                            </div>                            
                        </div> 
                        <div class="save-cta-info">
                            <a href="#">Save</a>
                        </div>
                                        
                </div>
                <!-- <div class="main-content-info tabs" data-tab="tabs-2">
                    <h3>Widget</h3>
                    <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="please-note-info mt-0">                                    
                                    <p>If you prefer to use widget instead of shortcode, go to Widget tab and configure it. Learn how you can train the chat bot with your content <a href="#">here.</a>
                                </p>                                  
                                    
                                    
                                </div>
                                     
                            </div>

                            
                            <div class="right-data-info">
                                
                                <div class="accordian-menu-wrap">
                                    <button class="accordionmenu">Enable Disable<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">                                        
                                            <div class="input-data-wrap">                                                    
                                                <div class="input-data">
                                                        <div class="label-info"><span>Language:</span></div>
                                                        <div class="input-info">
                                                            <select id="language">
                                                                <?php
                                                            foreach($languageDataArray as $key=>$languageData){
                                                                echo "<option value=".$languageData['language_code'].">".$languageData['language']."</option>";
                                                                 }
                                                        ?>
                                                                
                                                            </select>                                                
                                                            
                                                        </div>
                                                    </div>                            
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Style:</span></div>
                                                        <div class="input-info">
                                                            <select id="style">
                                                                <?php
                                                              foreach($styleDataArray as $key=>$styleData)
                                                              {
                                                                echo "<option value=".$styleData['style_code'].">".$styleData['style_value']."</option>";
                                                              }
                                                              ?>
                                                            </select> 
                                                            </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Tone:</span></div>
                                                        <div class="input-info">
                                                        <select id="tone">
                                                                <?php
                                                              foreach($toneDataArray as $toneDataKey=>$toneData)
                                                              {
                                                                echo "<option value=".$toneDataKey.">".$toneData."</option>";
                                                              }
                                                              ?>
                                                            </select> 
                                                            </div>
                                                    </div>
                                            </div>              

                                    </div>
                                    <button class="accordionmenu">Language, Tone and Professioning<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">                                        
                                            <div class="input-data-wrap">                                                    
                                                <div class="input-data">
                                                        <div class="label-info"><span>Language:</span></div>
                                                        <div class="input-info">
                                                            <select id="language">
                                                                <?php
                                                            foreach($languageDataArray as $key=>$languageData){
                                                                echo "<option value=".$languageData['language_code'].">".$languageData['language']."</option>";
                                                                 }
                                                        ?>
                                                                
                                                            </select>                                                
                                                            
                                                        </div>
                                                    </div>                            
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Style:</span></div>
                                                        <div class="input-info">
                                                            <select id="style">
                                                                <?php
                                                              foreach($styleDataArray as $key=>$styleData)
                                                              {
                                                                echo "<option value=".$styleData['style_code'].">".$styleData['style_value']."</option>";
                                                              }
                                                              ?>
                                                            </select> 
                                                            </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Tone:</span></div>
                                                        <div class="input-info">
                                                        <select id="tone">
                                                                <?php
                                                              foreach($toneDataArray as $toneDataKey=>$toneData)
                                                              {
                                                                echo "<option value=".$toneDataKey.">".$toneData."</option>";
                                                              }
                                                              ?>
                                                            </select> 
                                                            </div>
                                                    </div>
                                            </div>              

                                    </div>

                                    <button class="accordionmenu">Style<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                        <div class="input-data-wrap">                                                    
                                                <div class="input-data">
                                                        <div class="label-info"><span>Headings:</span></div>
                                                        <div class="input-info">
                                                            <select id="heading">
                                                                <?php
                                                                    for($heading=1;$heading<=15;$heading++){
                                                                        echo "<option value=".$heading.">".$heading."</option>";
                                                                    }
                                                                ?>
                                                                
                                                            </select>                                                
                                                            
                                                        </div>
                                                    </div>                            
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Heading Tag:</span></div>
                                                        <div class="input-info">
                                                            <select id="heading-tag">
                                                            <?php
                                                                    for($heading=1;$heading<=6;$heading++){
                                                                        echo "<option value=h".$heading.">h".$heading."</option>";
                                                                    }
                                                                ?>
                                                            </select> 
                                                            </div>
                                                    </div>
                                                    <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Outline Editor:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="otline_editor" name="0" value="0"> 
                                                        </div>
                                                    </div>
                                            </div>              
                                    </div>

                                    <button class="accordionmenu">Parameters<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                         <div class="input-data-wrap">                                                    
                                                <div class="input-data bottom-input-text">
                                                        <div class="label-info"><span>Add Keywords?</span></div>
                                                        <div class="input-info">
                                                           <input type="text" value="Available in Pro" disabled>                                              
                                                            <span>(Use comma to seperate keywords)</span>
                                                        </div>
                                                    </div>                            
                                                    <div class="input-data bottom-input-text">
                                                        <div class="label-info"><span>Keywords to Avoid?</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="Available in Pro" disabled>
                                                            <span>(Use comma to seperate keywords)</span> 
                                                        </div>
                                                    </div>
                                                    <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Make Keywords Bold:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0" disabled> Available in Pro
                                                            </div>
                                                    </div>
                                            </div>
                                    
                                    </div>
                                    <button class="accordionmenu">Moderation<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                        <div class="input-data-wrap">                                                    
                                                <div class="input-data">
                                                        <div class="label-info"><span>Image:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="none">none</option>
                                                                <option value="Dall-E">Dall-E</option>                                                                
                                                            </select>                                             
                                                            
                                                        </div>
                                                    </div>                            
                                                    <div class="input-data">
                                                        <div class="label-info"><span>Featured Image:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="none">none</option>
                                                                <option value="Dall-E">Dall-E</option> 
                                                                <option value="Pixels">Pixels</option> 
                                                            </select> 
                                                            </div>
                                                    </div>
                                                    
                                                <h4>DALL-E</h4>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Image Size:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Small">Small</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Image Style</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="none">None</option>
                                                                <option value="Abstract">Abstract</option>
                                                                <option value="Modern">Modern</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Artist:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="none">None</option>
                                                                <option value="Abstract">Abstract</option>
                                                                <option value="Modern">Modern</option>                                           
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Photography:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="landscape">Landscape</option>
                                                                <option value="Portrait">Portrait</option>
                                                                 <option value="Abstract">Abstract</option>                                           
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Lighting:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Ambient">Ambient</option>
                                                                <option value="Medium">Candle light</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Subject:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="none">None</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Camera:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Small">Aperture</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Composition:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Small">Rule of Third</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Resolution:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Small">4K(3840x2160)</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Color:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Small">RGB</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Special Effects:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Small">Cinemagraph</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <h4>Pexels</h4>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Orientation:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Small">None</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                <div class="input-data">
                                                        <div class="label-info"><span>Size:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Small">None</option>
                                                                <option value="Medium">Medium</option>
                                                                <option value="Large">Large</option>                                            
                                                            </select> 
                                                            </div>
                                                </div>
                                                
                                                


                                        </div> 
                                   
                                    </div>



                                    <button class="accordionmenu">Voice Input<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                        <div class="input-data-wrap">
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Add Tagline?</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                </div>
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Add Introduction?</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                    </div>                                                        
                                                <div class="input-data">
                                                        <div class="label-info"><span>ntro Title Tag:</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="English">h2</option>
                                                                <option value="Hindi">Hindi</option>
                                                                <option value="German">German</option>
                                                                <option value="French">French</option>
                                                            </select>                                                
                                                            
                                                        </div>
                                                </div>
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Add Conclusion?</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                </div>
                                                


                                                    <div class="input-data">
                                                        <div class="label-info"><span>Conclusion Title Tag</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Informative">h2</option>
                                                                <option value="Informative1">Informative1</option>
                                                                <option value="Informative2">Informative2</option>
                                                                <option value="Informative3">Informative3</option>
                                                            </select> 
                                                            </div>
                                                    </div>
                                                    <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Add Q&A:</span></div>
                                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0" disabled> Available in Pro </div>
                                                    </div>
                                                    <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Add Table of Contents?</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>ToC Title</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Informative">Table of content</option>
                                                                <option value="Informative1">Informative1</option>
                                                                <option value="Informative2">Informative2</option>
                                                                <option value="Informative3">Informative3</option>
                                                            </select> 
                                                            </div>
                                                    </div>
                                                    <div class="input-data">
                                                        <div class="label-info"><span>ToC Title Tag</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Informative">h2</option>
                                                                <option value="Informative1">Informative1</option>
                                                                <option value="Informative2">Informative2</option>
                                                                <option value="Informative3">Informative3</option>
                                                            </select> 
                                                            </div>
                                                    </div>
                                            </div> 
                                    
                                    </div>
                                    <button class="accordionmenu">Custom Text<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">

                                          <div class="input-data-wrap">                                                    
                                                <div class="input-data bottom-input-text">
                                                        <div class="label-info"><span>Anchor Text?</span></div>
                                                        <div class="input-info">
                                                           <input type="text" value="" placeholder="e.g battery life" >                                      
                                                        </div>
                                                    </div> 
                                                    <div class="input-data bottom-input-text">
                                                        <div class="label-info"><span>Target URL?</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="" placeholder="https://">
                                                            <span>(Use comma to seperate keywords)</span> 
                                                        </div>
                                                    </div>                           
                                                    <div class="input-data bottom-input-text">
                                                        <div class="label-info"><span>Add Call-to-Action?</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="" placeholder="https://">
                                                            <span>Enter target URL.</span> 
                                                        </div>
                                                    </div>
                                                    <div class="input-data bottom-input-text">
                                                        <div class="label-info"><span>CTA Position?</span></div>
                                                        <div class="input-info">
                                                            <select>
                                                                <option value="Beginning">Beginning</option>
                                                                <option value="Dall-E">Dall-E</option>                                                                
                                                            </select> 
                                                            
                                                        </div>
                                                    </div>
                                                    
                                            </div>                  
                                    
                                    </div>
                                    <button class="accordionmenu">Context<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                        <div class="input-data-wrap"> 
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Meta Description?</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                </div>                                                   
                                                 <div class="input-data bottom-input-text">
                                                        <div class="label-info"><span>Tags:</span></div>
                                                        <div class="input-info">
                                                            <input type="text" value="" placeholder="">
                                                            <span>(Use comma to seperate tags)</span> 
                                                        </div>
                                                    </div>                          
                                                   
                                                    
                                            </div> 
                                    
                                    </div>
                                    <button class="accordionmenu">Logs<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                         <div class="input-data-wrap"> 
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Enable:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                </div>                                                   
                                                                          
                                                   
                                                    
                                            </div>
                                    
                                    </div>

                                    <button class="accordionmenu">Token Handling<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
                                    <div class="am-panel">
                                         <div class="input-data-wrap"> 
                                                <div class="input-data check-box-row">
                                                        <div class="label-info"><span>Enable:</span></div>
                                                        <div class="input-info">
                                                            <input type="checkbox" id="" name="0" value="0"> 
                                                        </div>
                                                </div>                                                   
                                                                          
                                                   
                                                    
                                            </div>
                                    
                                    </div>                                

                                </div>

                            </div>                            
                        </div> 
                        <div class="save-cta-info">
                            <a href="#">Save</a>
                        </div>
                   
                  
                        
                        
                                
                </div> -->
                <!-- <div class="main-content-info tabs" data-tab="tabs-3">
                    <h3>Chat Bots</h3>
                    <div class="content-area-info single-content-area-info">
                            <div class="left-data-info search-data-wrap">                               
                                                                   
                                    <div class="input-data full-wid">                                        
                                        <div class="input-info">
                                            <span>Search Bot</span>
                                            <input type="text" id="" name="0" value="" >
                                            
                                        </div>
                                    </div>                                                       
                                  
                                <div class="save-cta-info search-cta-info">
                                    <a href="#" class="br-blue-info">Search</a>
                                    <a href="#">Create New Bot</a>
                                </div>                                                                              
                                
                            </div>
                            <div class="right-data-info empty-data-info">

                                

                            </div>                                                   
                    </div>

                        <div class="full-wid-content-area-info log-datatable-wrap">
                            <div class="full-wid-data-info">
                                <div class="log-datatable-info">
                                    <table>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>ID/ Shortcode</th>
                                            <th>Created</th>
                                            <th>Updated</th>
                                            <th>Model</th>
                                            <th>Context</th>
                                            <th>Action</th>                                            
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            
                                        </tr>
                                        
                                        </table>   
                                    </div>                   
                            </div>

                        </div>
                           

                        
                </div>  -->
                <!-- <div class="main-content-info tabs" data-tab="tabs-4">
                    <h3>Logs</h3>
                     <div class="content-area-info single-content-area-info">
                            <div class="left-data-info search-data-wrap">                               
                                                                   
                                    <div class="input-data full-wid">                                        
                                        <div class="input-info">
                                            <span>Type for Search</span>
                                            <input type="text" id="" name="0" value="" >
                                            
                                        </div>
                                    </div>                                                       
                                  
                                <div class="save-cta-info search-cta-info">                                    
                                    <a href="#">Search</a>
                                </div>                                                                              
                                
                            </div>
                            <div class="right-data-info empty-data-info">

                                

                            </div>                                                   
                    </div> -->

                        <!-- <div class="full-wid-content-area-info log-datatable-wrap">
                            <div class="full-wid-data-info">
                                <div class="log-datatable-info">
                                    <table>
                                        <tr>
                                            <th>SessionID</th>
                                            <th>Date</th>
                                            <th>User Message</th>
                                            <th>AI Response</th>
                                            <th>Page</th>
                                            <th>Source</th>
                                            <th>Token</th>
                                            <th>Estimated</th>  
                                            <th>IP</th>
                                            <th>Action</th>                                           
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>9</td>
                                            <td>10</td>
                                            
                                        </tr>
                                        
                                        </table>   
                                    </div>                   
                            </div>

                        </div> -->
                                                  
                    
                                      

<!--                      
                </div> -->
                 <!-- <div class="main-content-info tabs" data-tab="tabs-5">
                    <h3>Settings</h3>                     
                        <div class="content-area-info single-content-area-info">
                            <div class="left-data-info search-data-wrap">                               
                                                                   
                                     <h4>Token Handling</h4>
                                    <div class="input-data check-box-row">
                                        <div class="label-info"><span>Enable Token Sale?</span></div>
                                        <div class="input-info"><input type="checkbox" id="" name="0" value="0"></div>
                                    </div>                                 

                                <div class="save-cta-info search-cta-info">
                                    <a href="#">Save</a>
                                </div>                                                                              
                                
                            </div>
                            <div class="right-data-info empty-data-info">

                                

                            </div>                                                   
                      </div>

                     
                </div>  -->
                 
                
                 
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>


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




<!-- accordion-menus -->
<script>


var acc = document.getElementsByClassName("accordionmenu");
var panel = document.getElementsByClassName('am-panel');

for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
      var setClasses = !this.classList.contains('activeam');
        setClass(acc, 'activeam', 'remove');
        setClass(panel, 'showam', 'remove');
        
        if (setClasses) {
            this.classList.toggle("activeam");
            this.nextElementSibling.classList.toggle("showam");
        }
    }
}

function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
    }
}




</script>

<script>
    /*
colpick Color Picker
Copyright 2013 Jose Vargas. Licensed under GPL license. Based on Stefan Petre's Color Picker www.eyecon.ro, dual licensed under the MIT and GPL licenses

For usage and examples: colpick.com/plugin
 */

(function ($) {
	var colpick = function () {
		var
			tpl = '<div class="colpick"><div class="colpick_color"><div class="colpick_color_overlay1"><div class="colpick_color_overlay2"><div class="colpick_selector_outer"><div class="colpick_selector_inner"></div></div></div></div></div><div class="colpick_hue"><div class="colpick_hue_arrs"><div class="colpick_hue_larr"></div><div class="colpick_hue_rarr"></div></div></div><div class="colpick_new_color"></div><div class="colpick_current_color"></div><div class="colpick_hex_field"><div class="colpick_field_letter">#</div><input type="text" maxlength="6" size="6" /></div><div class="colpick_rgb_r colpick_field"><div class="colpick_field_letter">R</div><input type="text" maxlength="3" size="3" /><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_rgb_g colpick_field"><div class="colpick_field_letter">G</div><input type="text" maxlength="3" size="3" /><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_rgb_b colpick_field"><div class="colpick_field_letter">B</div><input type="text" maxlength="3" size="3" /><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_hsb_h colpick_field"><div class="colpick_field_letter">H</div><input type="text" maxlength="3" size="3" /><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_hsb_s colpick_field"><div class="colpick_field_letter">S</div><input type="text" maxlength="3" size="3" /><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_hsb_b colpick_field"><div class="colpick_field_letter">B</div><input type="text" maxlength="3" size="3" /><div class="colpick_field_arrs"><div class="colpick_field_uarr"></div><div class="colpick_field_darr"></div></div></div><div class="colpick_submit"></div></div>',
			defaults = {
				showEvent: 'click',
				onShow: function () {},
				onBeforeShow: function(){},
				onHide: function () {},
				onChange: function () {},
				onSubmit: function () {},
				colorScheme: 'light',
				color: '3289c7',
				livePreview: true,
				flat: false,
				layout: 'full',
				submit: 1,
				submitText: 'OK',
				height: 156
			},
			//Fill the inputs of the plugin
			fillRGBFields = function  (hsb, cal) {
				var rgb = hsbToRgb(hsb);
				$(cal).data('colpick').fields
					.eq(1).val(rgb.r).end()
					.eq(2).val(rgb.g).end()
					.eq(3).val(rgb.b).end();
			},
			fillHSBFields = function  (hsb, cal) {
				$(cal).data('colpick').fields
					.eq(4).val(Math.round(hsb.h)).end()
					.eq(5).val(Math.round(hsb.s)).end()
					.eq(6).val(Math.round(hsb.b)).end();
			},
			fillHexFields = function (hsb, cal) {
				$(cal).data('colpick').fields.eq(0).val(hsbToHex(hsb));
			},
			//Set the round selector position
			setSelector = function (hsb, cal) {
				$(cal).data('colpick').selector.css('backgroundColor', '#' + hsbToHex({h: hsb.h, s: 100, b: 100}));
				$(cal).data('colpick').selectorIndic.css({
					left: parseInt($(cal).data('colpick').height * hsb.s/100, 10),
					top: parseInt($(cal).data('colpick').height * (100-hsb.b)/100, 10)
				});
			},
			//Set the hue selector position
			setHue = function (hsb, cal) {
				$(cal).data('colpick').hue.css('top', parseInt($(cal).data('colpick').height - $(cal).data('colpick').height * hsb.h/360, 10));
			},
			//Set current and new colors
			setCurrentColor = function (hsb, cal) {
				$(cal).data('colpick').currentColor.css('backgroundColor', '#' + hsbToHex(hsb));
			},
			setNewColor = function (hsb, cal) {
				$(cal).data('colpick').newColor.css('backgroundColor', '#' + hsbToHex(hsb));
			},
			//Called when the new color is changed
			change = function (ev) {
				var cal = $(this).parent().parent(), col;
				if (this.parentNode.className.indexOf('_hex') > 0) {
					cal.data('colpick').color = col = hexToHsb(fixHex(this.value));
					fillRGBFields(col, cal.get(0));
					fillHSBFields(col, cal.get(0));
				} else if (this.parentNode.className.indexOf('_hsb') > 0) {
					cal.data('colpick').color = col = fixHSB({
						h: parseInt(cal.data('colpick').fields.eq(4).val(), 10),
						s: parseInt(cal.data('colpick').fields.eq(5).val(), 10),
						b: parseInt(cal.data('colpick').fields.eq(6).val(), 10)
					});
					fillRGBFields(col, cal.get(0));
					fillHexFields(col, cal.get(0));
				} else {
					cal.data('colpick').color = col = rgbToHsb(fixRGB({
						r: parseInt(cal.data('colpick').fields.eq(1).val(), 10),
						g: parseInt(cal.data('colpick').fields.eq(2).val(), 10),
						b: parseInt(cal.data('colpick').fields.eq(3).val(), 10)
					}));
					fillHexFields(col, cal.get(0));
					fillHSBFields(col, cal.get(0));
				}
				setSelector(col, cal.get(0));
				setHue(col, cal.get(0));
				setNewColor(col, cal.get(0));
				cal.data('colpick').onChange.apply(cal.parent(), [col, hsbToHex(col), hsbToRgb(col), cal.data('colpick').el, 0]);
			},
			//Change style on blur and on focus of inputs
			blur = function (ev) {
				$(this).parent().removeClass('colpick_focus');
			},
			focus = function () {
				$(this).parent().parent().data('colpick').fields.parent().removeClass('colpick_focus');
				$(this).parent().addClass('colpick_focus');
			},
			//Increment/decrement arrows functions
			downIncrement = function (ev) {
				ev.preventDefault ? ev.preventDefault() : ev.returnValue = false;
				var field = $(this).parent().find('input').focus();
				var current = {
					el: $(this).parent().addClass('colpick_slider'),
					max: this.parentNode.className.indexOf('_hsb_h') > 0 ? 360 : (this.parentNode.className.indexOf('_hsb') > 0 ? 100 : 255),
					y: ev.pageY,
					field: field,
					val: parseInt(field.val(), 10),
					preview: $(this).parent().parent().data('colpick').livePreview
				};
				$(document).mouseup(current, upIncrement);
				$(document).mousemove(current, moveIncrement);
			},
			moveIncrement = function (ev) {
				ev.data.field.val(Math.max(0, Math.min(ev.data.max, parseInt(ev.data.val - ev.pageY + ev.data.y, 10))));
				if (ev.data.preview) {
					change.apply(ev.data.field.get(0), [true]);
				}
				return false;
			},
			upIncrement = function (ev) {
				change.apply(ev.data.field.get(0), [true]);
				ev.data.el.removeClass('colpick_slider').find('input').focus();
				$(document).off('mouseup', upIncrement);
				$(document).off('mousemove', moveIncrement);
				return false;
			},
			//Hue slider functions
			downHue = function (ev) {
				ev.preventDefault ? ev.preventDefault() : ev.returnValue = false;
				var current = {
					cal: $(this).parent(),
					y: $(this).offset().top
				};
				$(document).on('mouseup touchend',current,upHue);
				$(document).on('mousemove touchmove',current,moveHue);
				
				var pageY = ((ev.type == 'touchstart') ? ev.originalEvent.changedTouches[0].pageY : ev.pageY );
				change.apply(
					current.cal.data('colpick')
					.fields.eq(4).val(parseInt(360*(current.cal.data('colpick').height - (pageY - current.y))/current.cal.data('colpick').height, 10))
						.get(0),
					[current.cal.data('colpick').livePreview]
				);
				return false;
			},
			moveHue = function (ev) {
				var pageY = ((ev.type == 'touchmove') ? ev.originalEvent.changedTouches[0].pageY : ev.pageY );
				change.apply(
					ev.data.cal.data('colpick')
					.fields.eq(4).val(parseInt(360*(ev.data.cal.data('colpick').height - Math.max(0,Math.min(ev.data.cal.data('colpick').height,(pageY - ev.data.y))))/ev.data.cal.data('colpick').height, 10))
						.get(0),
					[ev.data.preview]
				);
				return false;
			},
			upHue = function (ev) {
				fillRGBFields(ev.data.cal.data('colpick').color, ev.data.cal.get(0));
				fillHexFields(ev.data.cal.data('colpick').color, ev.data.cal.get(0));
				$(document).off('mouseup touchend',upHue);
				$(document).off('mousemove touchmove',moveHue);
				return false;
			},
			//Color selector functions
			downSelector = function (ev) {
				ev.preventDefault ? ev.preventDefault() : ev.returnValue = false;
				var current = {
					cal: $(this).parent(),
					pos: $(this).offset()
				};
				current.preview = current.cal.data('colpick').livePreview;
				
				$(document).on('mouseup touchend',current,upSelector);
				$(document).on('mousemove touchmove',current,moveSelector);

				var payeX,pageY;
				if(ev.type == 'touchstart') {
					pageX = ev.originalEvent.changedTouches[0].pageX,
					pageY = ev.originalEvent.changedTouches[0].pageY;
				} else {
					pageX = ev.pageX;
					pageY = ev.pageY;
				}

				change.apply(
					current.cal.data('colpick').fields
					.eq(6).val(parseInt(100*(current.cal.data('colpick').height - (pageY - current.pos.top))/current.cal.data('colpick').height, 10)).end()
					.eq(5).val(parseInt(100*(pageX - current.pos.left)/current.cal.data('colpick').height, 10))
					.get(0),
					[current.preview]
				);
				return false;
			},
			moveSelector = function (ev) {
				var payeX,pageY;
				if(ev.type == 'touchmove') {
					pageX = ev.originalEvent.changedTouches[0].pageX,
					pageY = ev.originalEvent.changedTouches[0].pageY;
				} else {
					pageX = ev.pageX;
					pageY = ev.pageY;
				}

				change.apply(
					ev.data.cal.data('colpick').fields
					.eq(6).val(parseInt(100*(ev.data.cal.data('colpick').height - Math.max(0,Math.min(ev.data.cal.data('colpick').height,(pageY - ev.data.pos.top))))/ev.data.cal.data('colpick').height, 10)).end()
					.eq(5).val(parseInt(100*(Math.max(0,Math.min(ev.data.cal.data('colpick').height,(pageX - ev.data.pos.left))))/ev.data.cal.data('colpick').height, 10))
					.get(0),
					[ev.data.preview]
				);
				return false;
			},
			upSelector = function (ev) {
				fillRGBFields(ev.data.cal.data('colpick').color, ev.data.cal.get(0));
				fillHexFields(ev.data.cal.data('colpick').color, ev.data.cal.get(0));
				$(document).off('mouseup touchend',upSelector);
				$(document).off('mousemove touchmove',moveSelector);
				return false;
			},
			//Submit button
			clickSubmit = function (ev) {
				var cal = $(this).parent();
				var col = cal.data('colpick').color;
				cal.data('colpick').origColor = col;
				setCurrentColor(col, cal.get(0));
				cal.data('colpick').onSubmit(col, hsbToHex(col), hsbToRgb(col), cal.data('colpick').el);
			},
			//Show/hide the color picker
			show = function (ev) {
				// Prevent the trigger of any direct parent
				ev.stopPropagation();
				var cal = $('#' + $(this).data('colpickId'));
				cal.data('colpick').onBeforeShow.apply(this, [cal.get(0)]);
				var pos = $(this).offset();
				var top = pos.top + this.offsetHeight;
				var left = pos.left;
				var viewPort = getViewport();
				var calW = cal.width();
				if (left + calW > viewPort.l + viewPort.w) {
					left -= calW;
				}
				cal.css({left: left + 'px', top: top + 'px'});
				if (cal.data('colpick').onShow.apply(this, [cal.get(0)]) != false) {
					cal.show();
				}
				//Hide when user clicks outside
				$('html').mousedown({cal:cal}, hide);
				cal.mousedown(function(ev){ev.stopPropagation();})
			},
			hide = function (ev) {
				if (ev.data.cal.data('colpick').onHide.apply(this, [ev.data.cal.get(0)]) != false) {
					ev.data.cal.hide();
				}
				$('html').off('mousedown', hide);
			},
			getViewport = function () {
				var m = document.compatMode == 'CSS1Compat';
				return {
					l : window.pageXOffset || (m ? document.documentElement.scrollLeft : document.body.scrollLeft),
					w : window.innerWidth || (m ? document.documentElement.clientWidth : document.body.clientWidth)
				};
			},
			//Fix the values if the user enters a negative or high value
			fixHSB = function (hsb) {
				return {
					h: Math.min(360, Math.max(0, hsb.h)),
					s: Math.min(100, Math.max(0, hsb.s)),
					b: Math.min(100, Math.max(0, hsb.b))
				};
			}, 
			fixRGB = function (rgb) {
				return {
					r: Math.min(255, Math.max(0, rgb.r)),
					g: Math.min(255, Math.max(0, rgb.g)),
					b: Math.min(255, Math.max(0, rgb.b))
				};
			},
			fixHex = function (hex) {
				var len = 6 - hex.length;
				if (len > 0) {
					var o = [];
					for (var i=0; i<len; i++) {
						o.push('0');
					}
					o.push(hex);
					hex = o.join('');
				}
				return hex;
			},
			restoreOriginal = function () {
				var cal = $(this).parent();
				var col = cal.data('colpick').origColor;
				cal.data('colpick').color = col;
				fillRGBFields(col, cal.get(0));
				fillHexFields(col, cal.get(0));
				fillHSBFields(col, cal.get(0));
				setSelector(col, cal.get(0));
				setHue(col, cal.get(0));
				setNewColor(col, cal.get(0));
			};
		return {
			init: function (opt) {
				opt = $.extend({}, defaults, opt||{});
				//Set color
				if (typeof opt.color == 'string') {
					opt.color = hexToHsb(opt.color);
				} else if (opt.color.r != undefined && opt.color.g != undefined && opt.color.b != undefined) {
					opt.color = rgbToHsb(opt.color);
				} else if (opt.color.h != undefined && opt.color.s != undefined && opt.color.b != undefined) {
					opt.color = fixHSB(opt.color);
				} else {
					return this;
				}
				
				//For each selected DOM element
				return this.each(function () {
					//If the element does not have an ID
					if (!$(this).data('colpickId')) {
						var options = $.extend({}, opt);
						options.origColor = opt.color;
						//Generate and assign a random ID
						var id = 'collorpicker_' + parseInt(Math.random() * 1000);
						$(this).data('colpickId', id);
						//Set the tpl's ID and get the HTML
						var cal = $(tpl).attr('id', id);
						//Add class according to layout
						cal.addClass('colpick_'+options.layout+(options.submit?'':' colpick_'+options.layout+'_ns'));
						//Add class if the color scheme is not default
						if(options.colorScheme != 'light') {
							cal.addClass('colpick_'+options.colorScheme);
						}
						//Setup submit button
						cal.find('div.colpick_submit').html(options.submitText).click(clickSubmit);
						//Setup input fields
						options.fields = cal.find('input').change(change).blur(blur).focus(focus);
						cal.find('div.colpick_field_arrs').mousedown(downIncrement).end().find('div.colpick_current_color').click(restoreOriginal);
						//Setup hue selector
						options.selector = cal.find('div.colpick_color').on('mousedown touchstart',downSelector);
						options.selectorIndic = options.selector.find('div.colpick_selector_outer');
						//Store parts of the plugin
						options.el = this;
						options.hue = cal.find('div.colpick_hue_arrs');
						huebar = options.hue.parent();
						//Paint the hue bar
						var UA = navigator.userAgent.toLowerCase();
						var isIE = navigator.appName === 'Microsoft Internet Explorer';
						var IEver = isIE ? parseFloat( UA.match( /msie ([0-9]{1,}[\.0-9]{0,})/ )[1] ) : 0;
						var ngIE = ( isIE && IEver < 10 );
						var stops = ['#ff0000','#ff0080','#ff00ff','#8000ff','#0000ff','#0080ff','#00ffff','#00ff80','#00ff00','#80ff00','#ffff00','#ff8000','#ff0000'];
						if(ngIE) {
							var i, div;
							for(i=0; i<=11; i++) {
								div = $('<div></div>').attr('style','height:8.333333%; filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='+stops[i]+', endColorstr='+stops[i+1]+'); -ms-filter: "progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='+stops[i]+', endColorstr='+stops[i+1]+')";');
								huebar.append(div);
							}
						} else {
							stopList = stops.join(',');
							huebar.attr('style','background:-webkit-linear-gradient(top,'+stopList+'); background: -o-linear-gradient(top,'+stopList+'); background: -ms-linear-gradient(top,'+stopList+'); background:-moz-linear-gradient(top,'+stopList+'); -webkit-linear-gradient(top,'+stopList+'); background:linear-gradient(to bottom,'+stopList+'); ');
						}
						cal.find('div.colpick_hue').on('mousedown touchstart',downHue);
						options.newColor = cal.find('div.colpick_new_color');
						options.currentColor = cal.find('div.colpick_current_color');
						//Store options and fill with default color
						cal.data('colpick', options);
						fillRGBFields(options.color, cal.get(0));
						fillHSBFields(options.color, cal.get(0));
						fillHexFields(options.color, cal.get(0));
						setHue(options.color, cal.get(0));
						setSelector(options.color, cal.get(0));
						setCurrentColor(options.color, cal.get(0));
						setNewColor(options.color, cal.get(0));
						//Append to body if flat=false, else show in place
						if (options.flat) {
							cal.appendTo(this).show();
							cal.css({
								position: 'relative',
								display: 'block'
							});
						} else {
							cal.appendTo(document.body);
							$(this).on(options.showEvent, show);
							cal.css({
								position:'absolute'
							});
						}
					}
				});
			},
			//Shows the picker
			showPicker: function() {
				return this.each( function () {
					if ($(this).data('colpickId')) {
						show.apply(this);
					}
				});
			},
			//Hides the picker
			hidePicker: function() {
				return this.each( function () {
					if ($(this).data('colpickId')) {
						$('#' + $(this).data('colpickId')).hide();
					}
				});
			},
			//Sets a color as new and current (default)
			setColor: function(col, setCurrent) {
				setCurrent = (typeof setCurrent === "undefined") ? 1 : setCurrent;
				if (typeof col == 'string') {
					col = hexToHsb(col);
				} else if (col.r != undefined && col.g != undefined && col.b != undefined) {
					col = rgbToHsb(col);
				} else if (col.h != undefined && col.s != undefined && col.b != undefined) {
					col = fixHSB(col);
				} else {
					return this;
				}
				return this.each(function(){
					if ($(this).data('colpickId')) {
						var cal = $('#' + $(this).data('colpickId'));
						cal.data('colpick').color = col;
						cal.data('colpick').origColor = col;
						fillRGBFields(col, cal.get(0));
						fillHSBFields(col, cal.get(0));
						fillHexFields(col, cal.get(0));
						setHue(col, cal.get(0));
						setSelector(col, cal.get(0));
						
						setNewColor(col, cal.get(0));
						cal.data('colpick').onChange.apply(cal.parent(), [col, hsbToHex(col), hsbToRgb(col), cal.data('colpick').el, 1]);
						if(setCurrent) {
							setCurrentColor(col, cal.get(0));
						}
					}
				});
			}
		};
	}();
	//Color space convertions
	var hexToRgb = function (hex) {
		var hex = parseInt(((hex.indexOf('#') > -1) ? hex.substring(1) : hex), 16);
		return {r: hex >> 16, g: (hex & 0x00FF00) >> 8, b: (hex & 0x0000FF)};
	};
	var hexToHsb = function (hex) {
		return rgbToHsb(hexToRgb(hex));
	};
	var rgbToHsb = function (rgb) {
		var hsb = {h: 0, s: 0, b: 0};
		var min = Math.min(rgb.r, rgb.g, rgb.b);
		var max = Math.max(rgb.r, rgb.g, rgb.b);
		var delta = max - min;
		hsb.b = max;
		hsb.s = max != 0 ? 255 * delta / max : 0;
		if (hsb.s != 0) {
			if (rgb.r == max) hsb.h = (rgb.g - rgb.b) / delta;
			else if (rgb.g == max) hsb.h = 2 + (rgb.b - rgb.r) / delta;
			else hsb.h = 4 + (rgb.r - rgb.g) / delta;
		} else hsb.h = -1;
		hsb.h *= 60;
		if (hsb.h < 0) hsb.h += 360;
		hsb.s *= 100/255;
		hsb.b *= 100/255;
		return hsb;
	};
	var hsbToRgb = function (hsb) {
		var rgb = {};
		var h = hsb.h;
		var s = hsb.s*255/100;
		var v = hsb.b*255/100;
		if(s == 0) {
			rgb.r = rgb.g = rgb.b = v;
		} else {
			var t1 = v;
			var t2 = (255-s)*v/255;
			var t3 = (t1-t2)*(h%60)/60;
			if(h==360) h = 0;
			if(h<60) {rgb.r=t1;	rgb.b=t2; rgb.g=t2+t3}
			else if(h<120) {rgb.g=t1; rgb.b=t2;	rgb.r=t1-t3}
			else if(h<180) {rgb.g=t1; rgb.r=t2;	rgb.b=t2+t3}
			else if(h<240) {rgb.b=t1; rgb.r=t2;	rgb.g=t1-t3}
			else if(h<300) {rgb.b=t1; rgb.g=t2;	rgb.r=t2+t3}
			else if(h<360) {rgb.r=t1; rgb.g=t2;	rgb.b=t1-t3}
			else {rgb.r=0; rgb.g=0;	rgb.b=0}
		}
		return {r:Math.round(rgb.r), g:Math.round(rgb.g), b:Math.round(rgb.b)};
	};
	var rgbToHex = function (rgb) {
		var hex = [
			rgb.r.toString(16),
			rgb.g.toString(16),
			rgb.b.toString(16)
		];
		$.each(hex, function (nr, val) {
			if (val.length == 1) {
				hex[nr] = '0' + val;
			}
		});
		return hex.join('');
	};
	var hsbToHex = function (hsb) {
		return rgbToHex(hsbToRgb(hsb));
	};
	$.fn.extend({
		colpick: colpick.init,
		colpickHide: colpick.hidePicker,
		colpickShow: colpick.showPicker,
		colpickSetColor: colpick.setColor
	});
	$.extend({
		colpick:{ 
			rgbToHex: rgbToHex,
			rgbToHsb: rgbToHsb,
			hsbToHex: hsbToHex,
			hsbToRgb: hsbToRgb,
			hexToHsb: hexToHsb,
			hexToRgb: hexToRgb
		}
	});
})(jQuery);



/* INITIALIZATION COLOURPICKER FOR ELEMENTS
    *********************************************/
    var newColorColorPickElements = $('.Center-Block, #sidebar h3, #nav-btn, .authorWindow, .about-me-img');

    $('#picker-elements-colour').colpick({
        layout: 'hex',
        submit: 1,
        colorScheme: 'dark',
        onChange: function(hsb, hex, rgb, el, bySetColor) {
            $(el).css('border-color', '#' + hex);
            setNewColorUI(hex);
            if (!bySetColor) $(el).val(hex);
        }
    }).keyup(function() {
        setNewColorUI(this.value);
        $(this).colpickSetColor(this.value);
    });

    function setNewColorUI(newColor) {
        newColorColorPickElements.css('background', '#' + newColor);
        if(!(/Trident\/7\./).test(navigator.userAgent)) {
            if (localStorage.getItem('elementsColour') != newColor) localStorage.setItem("elementsColour", newColor);
        }
    }



    /* INITIALIZATION COLOURPICKER FOR TEXTs
    *********************************************/
    var  newColorColorPickText = $('.Center-Block h4, .Center-Block span');
    var newColorBackgroundTextFields = $('.Center-Block input');

    
 
    $('#picker-text-colour').colpick({
        layout: 'hex',
        submit: 1,
        colorScheme: 'dark',
        onChange: function(hsb, hex, rgb, el, bySetColor) {
            $(el).css('border-color', '#' + hex);
            setNewColorText(hex);
            if (!bySetColor) $(el).val(hex);
        }
    }).keyup(function() {
        setNewColorText(this.value);
        $(this).colpickSetColor(this.value);
    });


    $('#picker-background-color-text').colpick({
        layout: 'hex',
        submit: 1,
        colorScheme: 'dark',
        onChange: function(hsb, hex, rgb, el, bySetColor) {
            $(el).css('border-color', '#' + hex);
            setNewColorTextInputFieldBackground(hex);
            if (!bySetColor) $(el).val(hex);
        }
    }).keyup(function() {
        setNewColorTextInputFieldBackground(this.value);
        $(this).colpickSetColor(this.value);
    });

    $("#picker-fields-color-text-border").colpick({
        layout:'hex',
        submit:1,
        colorScheme: 'dark',
        onchange:function(hsb, hex, rgb, el, bySetColor){
            $(el).css('border-color', '#' + hex);
            setNewColorTextInputFieldBorder(hex);
            if (!bySetColor) $(el).val(hex);

        }

    }).keyup(function(){
        setNewColorTextInputFieldBorder(this.value);
        $(this).colpickSetColor(this.value);
    })



    function setNewColorTextInputFieldBackground(newColor){
        newColorBackgroundText.css('color', '#' + newColor);
        if(!(/Trident\/7\./).test(navigator.userAgent)) {
            if (localStorage.getItem('textColour') != newColor) localStorage.setItem("textColour", newColor);
        }
    }


    function setNewColorTextInputFieldBorder(newColor){

        newColorBackgroundTextFields.css('border-color', '#' + newColor);
        if(!(/Trident\/7\./).test(navigator.userAgent)) {
            if (localStorage.getItem('textBorderFields') != newColor) localStorage.setItem("textBorderFields", newColor);
        }

    }



    function setNewColorText(newColor) {
        newColorBackgroundTextFields.css('background-color', '#' + newColor);
        if(!(/Trident\/7\./).test(navigator.userAgent)) {
            if (localStorage.getItem('backgroundTextFields') != newColor) localStorage.setItem("BackgroundTextFields", newColor);
        }
    }


    /* CHOOSE COLOUR  SCHEME
    *********************************************/
    var chooseColor,
        newColor,
        newKnob,
        newVolumeSlider,
        initializationColor = $('.Center-Block');

    $('.colorScheme li').bind('click', function() {
        chooseColor = $(this).attr("class");
        chooseColourScheme(chooseColor);
    });




    /* GET OWN SCHEME FROM LOCALSTORAGE
    *********************************************/
    function getLocalStorage(){
        if (!(/Trident\/7\./).test(navigator.userAgent)) {
            if (typeof(Storage) != "undefined") {
                if (localStorage.getItem('elementsColour')) {
                    setNewColorUI(localStorage.getItem('elementsColour'));
                    $('#picker-elements-colour').colpickSetColor(localStorage.getItem('elementsColour'), true);
                }
                if (localStorage.getItem('textColour')) {
                    setNewColorText(localStorage.getItem('textColour'));
                    $('#picker-text-colour').colpickSetColor(localStorage.getItem('textColour'), true);
                }

                if (localStorage.getItem('textFontSize')) {
                    setNewTextFontSize(localStorage.getItem('textFontSize'));
                    $('#fontSize').val(localStorage.getItem('textFontSize'));
                }

                if(localStorage.getItem('backgroundTextFields')){
                    setNewColorTextInputFieldBackground(localStorage.getItem('backgroundTextFields'));
                    $("#picker-background-color-text").colpickSetColor(localStorage.getItem('backgroundTextFields'), true);
                }

                
                if(localStorage.getItem('textBorderFields')){
                    setNewColorTextInputFieldBorder(localStorage.getItem('textBorderFields'));
                    $("#picker-fields-color-text-border").colpickSetColor(localStorage.getItem('textBorderFields'))


                    

                }


            }
        }
    }

    function setNewTextFontSize(textSize){
        
        $(".Center-Block span").css("fontSize", textSize);

    }

    getLocalStorage();
$("#fontSize").on('change',function(){
    var fontSize = this.value;
    $(".Center-Block span").css("fontSize",fontSize);

    localStorage.setItem("textFontSize",fontSize);
   
})


$(document).on('input', '#height-chat-bot', function() {
    var heightValue =  $(this).val();
    $('#slider_value').html(heightValue);
    $(".chatgpt-entry-response").css("min-height",heightValue+"px");

});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
function chatBot() {
  var chatText =$("#chat-message").val();
  if(chatText == ''){
    alert("Enter Chat Boot Message");
    return false;
  }

  var msgHtml = '<span class="left-chatgpt-entry-response" style="font-size: 14px;">'+chatText+'</span>';

  $('.chatgpt-entry-response').append(msgHtml);
  $('#chat-message').val('');

  $(".loaderoverlay").fadeIn(300);

  $.ajax({
  url: "<?php echo $apiUrl;?>chat",
  type: 'POST',
  beforeSend: function (xhr) {  
              xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
              xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
						},
  dataType:'json',
  data: {'content': chatText}
    }).done(function(response){
        setTimeout(function(){
        $(".loaderoverlay").fadeOut(300);
            },500);
      if(response.result=='Success'){
        var replyMessage = response.data.choices[0].message.content;
        replyMessage = replyMessage.replaceAll(">", "&gt");
        replyMessage = replyMessage.replaceAll("<", "&lt");
        replyMessage = replyMessage.replaceAll("\n","</br>");
        msgHtml = '<span class="right-chatgpt-entry-response">'+replyMessage+'</span>';
        $('.chatgpt-entry-response').append(msgHtml);
        
      }
      else if(response.result=='Failure'){
        alert("Something Went Wrong!!")
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });
 
}

function botResponse() {
  const r = random(0, BOT_MSGS.length - 1);
  const msgText = BOT_MSGS[r];
  const delay = msgText.split(" ").length * 100;

  setTimeout(() => {
    appendMessage(BOT_NAME, BOT_IMG, "left", msgText);
  }, delay);
}

// Utils
function get(selector, root = document) {
  return root.querySelector(selector);
}

function formatDate(date) {
  const h = "0" + date.getHours();
  const m = "0" + date.getMinutes();

  return `${h.slice(-2)}:${m.slice(-2)}`;
}


</script>