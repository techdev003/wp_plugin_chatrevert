<?php 
        include(MY_CUSTOM_PLUGIN_DIR.'includes/wp-global.php');
?>
<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


<div class="plugins-accounts-wrapper plugins-contentui-wrapper">
    <div class="top-header">
        <h1>Content Writer</h1>
        <span>Need Help? Watch our <a href="#">video tutorial.</a></span>
    </div>
    

    <div class="plugins-accounts-info">
        <div class="left-sec-wrap">
            <div class="logo-info">
                <div class="icon-info"><?php echo $iWhitelogo;?></div>
            </div>
            <ul>
                <li><a href="#" class="menu-link-info active" data-target="tabs-1">Express Mode</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-2">Speech-to-Post</a></li>
                <li><a href="#" class="menu-link-info" data-target="tabs-3">Playground</a></li>
                <li><a href="#" class="menu-link-info" id="logs-tab" data-target="tabs-4">Logs</a></li>
              
            </ul>
        </div>


        
        <div class="right-sec-wrap">            
            <div class="main-content-wrap">
                <div class="main-content-info tabs active" data-tab="tabs-1">
                    <h3>Express Mode</h3>                   
                        <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="full-wid input-data">                                    
                                    <div class="input-info">
                                        <span>Title:</span>
                                        <input type="text" id="preview_title" placholder="Enter title">
                                                <div class="sub-cta-info">
                                                        <button onclick="generateContent()" id="generateText" class="btn sub-cta-info">Generate Text</button>
                                                </div>

                                    </div>
                                </div>
                                

                                <div class="editor-data-wrap">
                                    <div class="cwem-tab">
                                        <button class="cwem-tablinks" onclick="openContent(event, 'Contentone')" id="defaultOpen">Content</button>
                                        <button class="cwem-tablinks" onclick="openContent(event, 'Seoone')">Seo</button>
                                    
                                    </div>

                                    <div id="Contentone" class="cwem-tabcontent">
                                        <div class="content-info">
                                           <textarea id="" name="" rows="10" cols="50"></textarea> 
                                             
                                        </div>
                                    </div>

                                    <div id="Seoone" class="cwem-tabcontent">
                                         <div class="content-info">
                                             
                                                <textarea id="" name="" rows="10" cols="50"></textarea> 
                                        </div>                   
                                    </div>
              
                                </div>

                            
                                


                                
                            </div>

                            
                            <!-- <div class="right-data-info">
                                
                                <div class="accordian-menu-wrap">
                                    <button class="accordionmenu">Language, Style and Tone<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
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

                                    <button class="accordionmenu">Headings<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
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

                                    <button class="accordionmenu">Keywords<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
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
                                    <button class="accordionmenu">Image<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
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



                                    <button class="accordionmenu">Additional Content<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
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
                                    <button class="accordionmenu">Links<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
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
                                    <button class="accordionmenu">SEO<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
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
                                    <button class="accordionmenu">Custom Prompt<span class="arrow-up-down"><?php echo $iArrowupdown;?></span></button>
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

                            </div>                             -->
                        </div>                       
                                        
                </div>
                <div class="main-content-info tabs" data-tab="tabs-2">
                    <h3>Speech-to-Post</h3>
                                                  
                        <div class="full-wid-content-area-info">

                            <div class="full-wid-data-info">
                                <p>Simply press the record button and speak your prompt, just like you would in a conversation.</p>
                                <div class="please-note-info mt-0">
                                    <h4>Example</h4>
                                    <p>"Write a blog post about the latest mobile phones and their features. Include an introduction that highlights the importance of mobile phones in today's world. In the body of the post, discuss the latest mobile phone trends, such as foldable screens, 5G connectivity, and high refresh rate displays. Also, mention the most popular mobile phone brands and their latest releases. Don't forget to discuss the benefits and drawbacks of each phone and how they compare to one another. In the conclusion, summarize the key points of the post."</p>
                                    
                                </div>
                                <p><button type="button" class="generate-button" onclick="runSpeechRecognition()"><?php echo $svgMic;?>Speech to Text</button> &nbsp; <span id="action"></span></p>
                                <div id="output" class="hide"></div>
                                <!-- <div class="cta-info speak-cta-info">                                               
                                        <a  href="javascript::void(0)" onclick="runSpeechRecognition()"><span class="icon-info"><?php echo $iSpeakicon;?></span>Speak</a>
                                
                                <div id="output" class="hide"></div> -->

                            </div>
                                                                               
                        </div>
                        <div class="full-wid-data-info" style="margin-top:1em; ">
                        <div class="editor-data-wrap">
                                    <div class="content-info">
                                        <?php
                                            $custom_text_value='';
                                                        wp_editor(
                                                            $custom_text_value,
                                                            'textarea-input-speak-text',  //Editor_ID
                                                            array(
                                                                'textarea_name' => '_wporg_preview_texarea',
                                                                'editor_height' => 300,
                                                                'media_buttons' => true, 
                                                                'wpautop' => false, 
                                                                'quicktags' => true,
                                                                'tinymce'=> true, // Textarea box// Textarea box
                                                                'textarea_class'=>'preview_textarea'
                                                            )
                                                        );
                                            ?>
                                    </div>
              
                                </div>
                                                    </div>
                                      

                     
                </div>
                 <div class="main-content-info tabs" data-tab="tabs-3">
                    <h3>Playground</h3>                     
                        <div class="content-area-info">
                            <div class="left-data-info">
                                <div class="full-wid input-data">                                    
                                    <div class="input-info">
                                        <span>Category:</span>
                                        <select>
                                            <option value="Default">Select a category</option>
                                            <option value="Dall-E">Dall-E</option>                                                                
                                        </select>                                               
                                                
                                    </div>
                                </div>
                                <h4>Custom Prompt:</h4>                                    
                                <div class="input-data full-wid">                                        
                                    <div class="input-info">
                                        <textarea id="generate-text-playground" name="" rows="5" cols="50">Write a blog post on how to effectively monetize a blog, discussing various methods such as affiliate marketing, sponsored content, and display advertising, as well as tips for maximizing revenue.</textarea> 
                                     <div class="sub-cta-info">
                                        <button class="btn" id="generate-playground"> Generate </button>
                                    </div>                                            
                                                     
                                    </div>
                                </div>
      
                            </div>
                            <div class="right-data-info">
                                <div class="editor-data-wrap">
                                    <div class="content-info">
                                        <textarea id="playground-output" rows="10"></textarea>
                                    </div>
              
                                </div>
                                

                            </div>                                                   
                        </div>
                        <!-- <div class="save-cta-info">
                            <a href="#">Save</a>
                        </div> -->

                     
                </div>
                 <div class="main-content-info tabs" data-tab="tabs-4">
                    <h3>Logs</h3>
                    
                        <div class="content-area-info single-content-area-info">
                            <div class="left-data-info search-data-wrap">                               
                                                                   
                                    <div class="input-data full-wid">                                        
                                        <div class="input-info">
                                            <span>Search</span>
                                            <input type="text" id="" name="0" value="" >
                                            
                                        </div>
                                    </div>                                                       
                                  
                                <div class="save-cta-info search-cta-info">
                                    <a href="#">Search</a>
                                </div>                                                                              
                                
                            </div>
                            <div class="right-data-info empty-data-info">
                            </div>                                                   
                        </div>
                        <div class="full-wid-content-area-info log-datatable-wrap">
                            <div class="full-wid-data-info">
                                <div class="log-datatable-info">
                                <table cellpadding="0px" cellspacing="0px" class="log-audio-table" id="log-language-table"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th>Token</th>
                                        <th>Model</th>
                                        <th>Author</th>
                                    </tr>			
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Topic</th>
                                        <th>Date</th>
                                        <th>Token</th>
                                        <th>Model</th>
                                        <th>Author</th>
                                    </tr>
                                    </tfoot>
                            </table>
             </div>
                                    </div>                   
                            </div>

                        </div>
                        

                    
                </div>
                 
            </div>
        </div>
    </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script type="text/javascript">
/* JS comes here */
  function runSpeechRecognition() 
  {
		        // get output div reference
		        var output = document.getElementById("output");
		        // get action element reference
		        var action = document.getElementById("action");
                // new speech recognition object
                var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
                var recognition = new SpeechRecognition();
            
                // This runs when the speech recognition service starts
                recognition.onstart = function() {
                    action.innerHTML = "<small>listening, please speak...</small>";
                };
                
                recognition.onspeechend = function() {
                    action.innerHTML = "<small>stopped listening, hope you are done...</small>";
                    recognition.stop();
                }
              
                // This runs when the speech recognition service returns result
                recognition.onresult = function(event) {
                    alert(transcript);
                    
                    var transcript = event.results[0][0].transcript;
                    var confidence = event.results[0][0].confidence;
                    output.innerHTML = "<b>Text:</b> " + transcript + "<br/> <b>Confidence:</b> " + confidence*100+"%";
                    output.classList.remove("hide");
                  //  $("#text-input-generator-play").val(transcript);
                    
                    generateContent(transcript);   
                };

                 recognition.start();
	}

</script>
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


function openContent(evt, cName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("cwem-tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("cwem-tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" cwem-active", "");
  }
  document.getElementById(cName).style.display = "block";
  evt.currentTarget.className += " cwem-active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

    $(document).ready(function(){
        $("#generate-playground").click(function(){
            var  playgroundText = $("#generate-text-playground").val();
            if(playgroundText ==''){
                alert("Playground text can not empty.");
                return false;
            }
            $.ajax({
  url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/content-text-playground",
  type: 'POST',
  beforeSend: function (xhr) {  
        xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
        xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
			},
  dataType:'json',
  data: {'prompt': playgroundText,'model':'text-davinci-003','temperature':0.7,'maxtoken':256}
    }).done(function(response){
      if(response.result=='Success'){
        console.log(response);
        console.log(response.data.choices[0].text);
        doWithInterval('input',response.data.choices[0].text);

         var data = {
                         'action': 'my_content_data',
                         'model': response.data.model,
                         'title':playgroundText,
                         'date':response.data.created,
                         'token':response.data.usage.total_tokens,
                         'type':'playground'
                   };
             jQuery.post(ajaxurl, data, function(response) {
             var responseJsonData =jQuery.parseJSON(response);
             console.log(responseJsonData.result);
                 if(responseJsonData.result == 'Success'){
                     console.log("log saved Succesfully");
                 }
                 else if(responseJsonData.result=='Failure')
             {
                         //alert("Something Went Wrong!!"); 
                         console.log("Something Went Wrong!!");
             }   
          });
      }
      else if(response.result=='Failure'){
        console.log("Something Went Wrong!!");
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });

});
});

function doWithInterval(id, sentence)
{ 
    var f;
    f= function(i){
        document.getElementById('playground-output').innerHTML+=sentence[i];
        if(i+1==sentence.length)
        {
           return;
        } 
           window.setTimeout(function(){f(i+1);},20);
    }
    f(0);
}


  function generateContent(speakText=''){
  if(speakText==''){
   var preview_title = $("#preview_title").val();
   if(preview_title ==''){
    alert("Title is empty");
    return false;
   }
  }
  else if(preview_title !=''){
    preview_title = speakText;
  }
   $.ajax({
  url: "https://angry-darwin.62-151-180-40.plesk.page/openApi/api/content-text",
  type: 'POST',
  beforeSend: function (xhr) {  
        xhr.setRequestHeader("secertkey","<?php echo $secertkey;?>" );
        xhr.setRequestHeader("openai", "<?php echo $openAi;?>");
			},
  dataType:'json',
  data: {'prompt': preview_title,'model':'text-davinci-003','temperature':0,'maxtoken':2000,'type':'web'}
    }).done(function(response){
      if(response.result=='Success'){
        console.log(response);
        console.log(response.data.choices[0].text);
        if(speakText==''){
          tinymce.get("myTextArea").setContent(response.data.choices[0].text);
          tinyMCE.triggerSave();
        }
        else{
               tinymce.get("textarea-input-speak-text").setContent(response.data.choices[0].text);
               tinyMCE.triggerSave();
        }
        var data = {
                        'action': 'my_content_data',
                        'model': response.data.model,
                        'title':preview_title,
                        'date':response.data.created,
                        'token':response.data.usage.total_tokens,
                        'type':'content'
                  };
            jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                    alert("Log saved successfully.");
                }
                else if(responseJsonData.result=='Failure')
            {
                        alert("Something Went Wrong!!");
            }   
            });
      }
      else if(response.result=='Failure'){
        alert("Something Went Wrong!!")
      }
 
    }).fail(function(jqXHR, textStatus, errorThrown){
      alert('FAILED! ERROR: ' + errorThrown);
    });

}

  $(document).ready(function(){
    $("#logs-tab").click(function(){
      $('table tbody > tr').remove();
      var data = {
                        'action': 'my_content_data_get',
                        'type': 'content'
                  };
            jQuery.post(ajaxurl, data, function(response) {
            var responseJsonData =jQuery.parseJSON(response);
            console.log(responseJsonData.result);
                if(responseJsonData.result == 'Success'){
                  var table = '';
                  table += '<tbody>';
                  var dataObj  = responseJsonData.data; 
                  // console.log(responseJsonData.data);
                  $.each( dataObj, function( key2, valueObj ) {
                    table += "<tr>";
                    $.each( valueObj, function( key, value ) {
                        table+= "<td>"+value+"</td>"
                    });
                    table += "</tr>";
                });
                table += '</table>'; 
                console.log(table);
                $('.log-audio-table').append(table);
                }
                else if(responseJsonData.result=='Failure')
            {
                        alert("Something Went Wrong!!");
            }   
        });
    })
  })
</script>



