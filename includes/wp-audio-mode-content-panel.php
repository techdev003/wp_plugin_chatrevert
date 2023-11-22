<div class="panel-area">
<form method ="post"  name="uploadvideo"  enctype="multipart/form-data">
                 <div class="panel-area-content"> 
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="purpose"> 
                                 Purpose
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                          <select id="purpose" name="purpose" class="generator-input-field-audio">
                                  <option selected="" value="transcriptions">Transcription</option>
                                  <option value="translations">Translation</option>
                          </select>
                      </div>
                  </div>

                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="File"> 
                                 File
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                          <input type="radio" class="audio-change-checked" attrVal="file" name="audio-change" value="" id="file" checked>Computer</label>
                          <input type="radio" class="audio-change-checked" attrVal="url" name="audio-change" value="" id="url">Url</label>
                          <div class="panel-area-label-input-checked" id="file-data-id">
                              <input type="file" class="generator-input-field-audio" name="uploadAudio" value="" name="" id="file-input"/>
                              <input type="url" name="url" class="generator-input-field-audio" id="url-input" placeholder="Example: https://domain.com/audio.mp3" style="display:none"/>
                          </div> 
                      </div>

                  </div>
                  <div class="clearfix">
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="purpose"> 
                                 Model
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                          <select name="model" class="generator-input-field-audio" id="model">
                                  <option selected="" value="whisper-1">whisper-1</option>
                                  
                          </select>
                      </div>
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="purpose"> 
                                 Prompt(Optional)
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                          <input type="text" class="generator-input-field-audio" name="prompt" id="prompt">
                      </div>
                  </div>
                  <div class="clearfix">
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="purpose"> 
                                 Output Format
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                              <select name="format" id="format" class="generator-input-field-audio">
                                      <option selected="" value="post">post</option>
                                      <option value="page">page</option>
                                      <option value="json">json</option>
                                      <option value="text">text</option>
                                      <option value="srt">srt</option>
                                      <option value="verbose_json">verbose_json</option>
                                      <option value="vtt">vtt</option>
                              </select>
                      </div>
                  </div>
                  <div class="clearfix">
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="title"> 
                                 Title
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                          <input type="text" class="generator-input-field-audio" name="title" id="title">
                      </div>
                  </div>
                  <div class="clearfix">
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="purpose"> 
                                 Category
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                              <select name="category" id="category" class="generator-input-field-audio">
                                  <?php
                                  $categories = get_categories();
                                  foreach($categories as $key=>$categoriesData){
                                      ?>
                                      <option value="<?php echo $categoriesData->name;?>"><?php echo $categoriesData->name?></option>
                                    <?php    
                                  }
                                  ?>
                              </select>
                      </div>
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="purpose"> 
                                 Author
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                      <select name="author" id="author" class="generator-input-field-audio">
                          <?php
                                 $users = get_users();
                                  foreach ($users as $userData) 
                                      {
                                          ?>
                                          <option value="<?php echo  $userData->display_name;?>"><?php echo $userData->display_name;?></option>
                                      <?php
                                      }
                        ?>  
                        </select>    
                      </div>
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="status"> 
                                 Status
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                      <select name="status" id="status" class="generator-input-field-audio">
                         <option value="draft">Draft</option>
                          <option value="publish">Publish</option>
                        </select>    
                      </div>
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="status"> 
                                Temperature (Optional)
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                          <input type="number" placeholder="Select temperature 0 or 1" class="generator-input-field-audio" max=1 min=0; value="temperature" name="Temperature"/>
                      </div>
                  </div>
                  <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                            <label for="status"> 
                                Language (Optional)
                             </label>
                      </div>
                      <div class="panel-area-label-input">
                      <?php
                             include_once (MY_CUSTOM_PLUGIN_DIR.'includes/wp-language.php');
                      ?>
                      </div>
                  </div>
                    <div class="panel-area-label-input-audio">
                      <div class="panel-area-label-audio">
                      </div>
                      <div class="panel-area-label-button">
                      <!-- <button>Submit</button> -->
                      <!-- <input type="submit" value="Upload Image" id="submit" name="submit"> -->
                      <input type="submit" value="Upload Video" name="ug_submit_button" id="ug_submit_button" class="btn">
                          <!-- <button onclick="start()" class="generate-button-audio-start">Start</button>
                          <button onclick="setAsDefault()" class="generate-button-audio-default">Set as Deault</button> -->
                      </div>
                    </div>
               
                 </div>  
</form>

            </div>