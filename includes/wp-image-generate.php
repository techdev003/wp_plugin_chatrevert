<div class="panel-area-content"> 
                        <?php    
                          $generateRandomNumber =  rand(1,$countPromptsValue);
                         ?>   
                      <input type="text"  value= "<?php echo $promptDataArray['prompts'][--$generateRandomNumber];?>" id="image_title" placeholder="Title: e.g. India" class="wpaicg-input" name="_wporg_preview_title" value=""> 
                      <div class="button-box-generate-image">
                          <button id="supriseMe" class="generate-button">Suprise Me</button> 
                          <button onclick="generateImage()" class="generate-button">Generate Image</button>
                      </div>
                      <section class="display-box" id="display-box">     
                      </section>
</div>