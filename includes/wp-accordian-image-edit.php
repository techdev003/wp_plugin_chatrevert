<div class="accordion">
    <div class="section">
    <a class="section-title" href="#accordion-1">Setting</a>
    <div id="accordion-1" class="section-content">
    <div class="section-flelds">
            <div class="section-fields-label">
              No of Images
            </div>
            <div class="section-fields-input-fields">
            <select id="no_of_images" class="generator-input-field" >    
                  <?php
                    
                    for($i=1; $i<=10;$i++)
                    {
                      echo "<option  value=".$i.">".$i."</option>";
                    }
                  ?>      
            </select>
          </div>
      </div>
      <div class="section-flelds">
            <div class="section-fields-label">
              Image Size
            </div>
            <div class="section-fields-input-fields">
            <select id="image_size" class="generator-input-field" >    
                  <?php
                    foreach($imageDataArray as $key=>$imageData)
                      {
                        echo "<option  value=".$imageData['image_size'].">".$imageData['image_size']."</option>";
                      }
                  ?>  
                
            </select>
          </div>
    </div>
    </div><!-- section-content end -->
    </div><!-- section end -->               
</div><!-- accordion end -->