<select id="transalate_language" class="generator-input-field" >    
                  <?php
                    
                    foreach($languageDataArray as $key=>$languageData)
                    {
                      echo "<option  value=".$languageData['language'].">".$languageData['language']."</option>";
                    }
                  ?>  
                
</select>